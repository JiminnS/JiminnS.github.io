<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Swiper demo</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <!-- Swiper js -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Swiper css -->
    <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <!-- video js -->
    <link href="https://vjs.zencdn.net/8.5.2/video-js.css" rel="stylesheet"/>
    <script src="https://vjs.zencdn.net/8.5.2/video.min.js"></script>

    <!-- swiper css -->
    <link  rel="stylesheet" href="css/swiper.css"/>



</head>
<!-- <div class="swiper-slide" data-slide-type="img"><img src="imgs/main_visual2.jpg"></div>
        <div class="swiper-slide" data-slide-type="img"><img src="imgs/main_visual3.jpg"></div>
        <div class="swiper-slide" data-slide-type="img"><img src="imgs/main_visual4.jpg"></div>
        <div class="swiper-slide" data-slide-type="img5"><img src="imgs/main_visual5.jpg"></div> -->
<body>
<div class="swiper-container d-flex flex-column pt-5 pb-2 py-sm-8 py-md-0 position-relative z-index-9">
    <div class="swiper-wrapper">
    <?php
    // MySQL 데이터베이스 연결 설정
    $servername = "localhost";  // 서버 이름
    $username = "necpower";  // 사용자 이름
    $password = "artpapa9249!!";  // 비밀번호
    $dbname = "necpower";  // 데이터베이스 이름

    // MySQL 데이터베이스에 연결
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // 연결 확인
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // 데이터베이스에서 Swiper 데이터를 가져오기
    $sql = "SELECT * FROM swiper ORDER BY idx DESC";  
    $result = mysqli_query($conn, $sql);

    // 슬라이드 데이터가 있는지 확인
    if (mysqli_num_rows($result) > 0) {
        $index = 1; // 슬라이드 인덱스를 위한 변수 초기화

        // 슬라이드 데이터 순회
        while ($slide = mysqli_fetch_assoc($result)) {
            // 비디오 및 이미지 정보 가져오기
            $video = $slide['video'];
            $image = $slide['img'];
            $time = intval($slide['time']);
            $comment = $slide['comment1'];

            // 비디오가 있는 경우
            if (!empty($video)) {
                echo '<div class="swiper-slide video-banner" data-swiper-autoplay="' . ($time * 1000) . '" data-slide-type="vdo' . $index . '">';
                echo '    <video id="my-player' . $index . '" class="video' . $index . '" disablePictureInPicture muted autoplay preload="auto">';
                echo '        <source src="' . $video . '" type="video/mp4">';
                echo '    </video>';

                // 텍스트 블록 추가
                echo '    <div class="col-md-10 col-xl-11 col-xxl-9 mx-auto py-5 px-1-6 px-md-6 px-lg-8 px-xxl-14 text-block" id="text-' . $index . '" style="position: absolute; z-index:100;">';
                echo '        <h1 class="lh-1 mt-8 mt-lg-10 font-weight-700" style="text-transform: none">';
                echo '            ' . $comment . ' ';
                echo '        </h1>';
                echo '    </div>';
                echo '</div>';

                $index++; // 슬라이드 인덱스 증가

            // 이미지가 있는 경우
            } else if (!empty($image)) {
                echo '<div class="swiper-slide video-banner" data-swiper-autoplay="' . ($time * 1000) . '" data-slide-type="img">';
                echo '    <img src="' . $image . '">';

                // 텍스트 블록 추가
                echo '    <div class="col-md-10 col-xl-11 col-xxl-9 mx-auto py-5 px-1-6 px-md-6 px-lg-8 px-xxl-14 text-block image" style="position: absolute; z-index:100;">';
                echo '        <h1 class="lh-1 mt-8 mt-lg-10 font-weight-700" style="text-transform: none">';
                echo '            ' . $comment . ' ';
                echo '        </h1>';
                echo '    </div>';
                echo '</div>';

                $index++; // 슬라이드 인덱스 증가
            } 
        }
    } else {
        echo "No slides found.";
    }

    // MySQL 연결 종료
    mysqli_close($conn);
?>
       
        
        
    </div>
    <div class="swiper-buttons">
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    <div class="swiper-pagination"></div>
</div>

<script>
    // 첫 번째 동영상
    var textTimers = []; // 텍스트 애니메이션 타이머를 저장할 배열

    // 텍스트를 순차적으로 보여주고 사라지게 하는 함수
    function controlTextAppearance(activeSlide) {
        textTimers.forEach(timer => clearTimeout(timer)); // 기존의 타이머 초기화
        textTimers = [];

        const textBlocks = activeSlide.querySelectorAll('.text-block'); // 활성화된 슬라이드에서 텍스트 블록만 선택
        
        // 슬라이드의 data-slide-type 속성으로 비디오 길이를 구분
        const slideType = activeSlide.getAttribute('data-slide-type');
        let totalDuration;
        let baseDelay = 0;

        if (slideType === 'vdo2') {
            totalDuration = 16000; // 첫 번째 영상은 16초
            baseDelay = 500; // 첫 번째 영상의 모든 텍스트에 0.5초 딜레이 추가
        } else if (slideType === 'vdo1') {
            totalDuration = 8000; // 세 번째 영상은 8초
        } else {
            totalDuration = 10000; // 기본값 (다른 슬라이드가 있을 경우)
        }

        const textCount = textBlocks.length;
        const displayTimePerText = totalDuration / textCount; // 각 텍스트가 표시될 시간 간격 계산

        textBlocks.forEach((block, index) => {
            block.style.opacity = 0; // 텍스트 초기화

            let additionalDelay = 0;
            // 각 텍스트 딜레이 적용
            if (slideType === 'vdo2' && index === 2) {
                additionalDelay = 0;
            } else if (slideType === 'vdo2' && index === 4) {
                additionalDelay = -800;
            } else if (slideType === 'vdo2' && index === 5) {
                additionalDelay = 700;
            }

            // 텍스트가 순차적으로 나타나는 타이머 설정
            const showTimer = setTimeout(() => {
                block.style.opacity = 1;
            }, index * displayTimePerText + baseDelay + additionalDelay); // 기본 딜레이 및 추가 딜레이 적용
            textTimers.push(showTimer);

             // 텍스트가 사라지는 타이머 설정 (index === 4일 경우 더 오래 보여지도록)
             if (textCount > 1) {
            let hideTime = (index + 1) * displayTimePerText - 700 + baseDelay + additionalDelay;

            if (slideType === 'vdo2' && index === 4) {
                hideTime += 2000; // index == 4인 경우 텍스트가 더 오래 표시되도록 2초 추가
            } else if (slideType === 'vdo2' && index === 1) {
                hideTime += 900;
            } else if (slideType === 'vdo2' && index === 2) {
                hideTime += 900;
            } else if (slideType === 'vdo2' && index === 3) {
                hideTime += 400;
            }

            // 첫 번째 텍스트와 두 번째 텍스트가 동시에 사라지도록 타이머 설정
            if (index === 0 && slideType === 'vdo2') {
                hideTime = (1 + 1) * displayTimePerText - 700 + baseDelay + additionalDelay; // 두 번째 텍스트와 동일한 사라지는 시간 설정
            }

            const hideTimer = setTimeout(() => {
                block.style.opacity = 0;
            }, hideTime); // 사라지는 시간 설정
            textTimers.push(hideTimer);
        }
        });
    }

    
     var swiper = new Swiper(".swiper-container", {
                spaceBetween: 0,
                slidesPerView: 1,
                centeredSlides: true,
                loop: true,
                effect : 'fade',
                speed : 600,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                autoplay: {
                    delay: 0, // Adjust the delay as needed
                    disableOnInteraction: false
                },
                on: {
                slideChange: function () {
                    var activeSlide = this.slides[this.activeIndex]; // this = 현재 활성화 중인 슬라이드
                    var video = activeSlide.querySelector('video');

                    // Play video only when the slide changes
                    if (video) {
                        video.currentTime = 0;
                        video.play();
                        video.onplay = () => controlTextAppearance(activeSlide); // 텍스트 애니메이션 시작
                        video.onended = function() {
                            swiper.slideNext();
                        };
                    }

                    // Pause all other videos
                    var allVideos = document.querySelectorAll('.swiper-slide video');
                    allVideos.forEach(function (vid) {
                        if (vid !== video) {
                            vid.pause();
                        }
                    });

                    
                }
            }
         });

    // Play the first video when the Swiper is initialized
            var firstSlide = swiper.slides[swiper.activeIndex];
            var firstVideo = firstSlide.querySelector('video');
            if (firstVideo) {
                firstVideo.play();
                firstVideo.onplay = () => controlTextAppearance(firstSlide); // 첫 슬라이드에서도 텍스트 애니메이션
                firstVideo.onended = function() {
                    swiper.slideNext();
                };
            }
</script>

</body>
</html>