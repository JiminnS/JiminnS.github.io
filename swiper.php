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

    <!-- custom css -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- swiper css -->
    <link href="css/swiper.css" rel="stylesheet">

</head>
 
<body>
<div id="my-swiper" class="swiper-container d-flex flex-column pt-5 pb-2 py-sm-8 py-md-0 position-relative z-index-9">
    <div class="swiper-wrapper">
        <div class="swiper-slide video-banner" data-swiper-autoplay="16000" data-slide-type="vdo2">
            <video 
            id="my-player2" 
            class="video2"
            disablePictureInPicture
            muted
            autoplay
            preload="auto">
                <source src="video/main_introduce3.mp4" type="video/mp4">
            </video>

                <div class="col-md-10 col-xl-11 col-xxl-9 mx-auto py-5 px-1-6 px-md-6 px-lg-8 px-xxl-14 text-block"  id="text-1" style=" position: absolute; z-index:100;">
                    <h1 class="lh-1 mt-8 mt-lg-10 font-weight-700" style="text-transform: none">
                        <p style="font-size: 3.5em" class="minus2-letter-spacing ">'2050 탄소중립(Net Zero)' 
                            <br> Smart 폐기물 에너지화 엔이씨가 선도합니다
                        </p>
                        <p style="font-size: 1.7em" class="no-letter-spacing sub">NEC는 폐기물 처리 전과정 스마트 통합 플랫폼 구축을 추구하고 있습니다</p>
                    </h1>
                </div>

                <div class="col-md-10 col-xl-11 col-xxl-9 mx-auto py-5 px-1-6 px-md-6 px-lg-8 px-xxl-14 text-block"  id="text-2" style=" position: absolute; z-index:100;">
                    <h1 class="lh-1 mt-8 mt-lg-10 font-weight-700" style="text-transform: none">
                        <p style="font-size: 3.5em" class="minus2-letter-spacing">'2050 탄소중립(Net Zero)' 
                            <br> Smart 폐기물 에너지화 엔이씨가 선도합니다
                        </p>
                        <p style="font-size: 1.7em" class="no-letter-spacing sub">NEC는 폐기물 처리 전과정 스마트 통합 플랫폼 구축을 추구하고 있습니다</p>
                    </h1>
                </div>

                <div class="col-md-10 col-xl-11 col-xxl-9 mx-auto py-5 px-1-6 px-md-6 px-lg-8 px-xxl-14 text-block"  id="text-3" style=" position: absolute; z-index:100;">
                    <h1 class="lh-1 mt-8 mt-lg-10 font-weight-700" style="text-transform: none">
                        <p style="font-size: 3.5em" class="minus2-letter-spacing">'2050 탄소중립(Net Zero)' 
                            <br> Smart 폐기물 에너지화 엔이씨가 선도합니다
                        </p>
                        <p style="font-size: 1.7em" class="no-letter-spacing sub">NEC 폐기물 스마트 수거 운영관리 시스템</p>
                    </h1>
                </div>

                <div class="col-md-10 col-xl-11 col-xxl-9 mx-auto py-5 px-1-6 px-md-6 px-lg-8 px-xxl-14 text-block"  id="text-4" style=" position: absolute; z-index:100;">
                    <h1 class="lh-1 mt-8 mt-lg-10 font-weight-700" style="text-transform: none">
                        <p style="font-size: 3.5em" class="minus2-letter-spacing">'2050 탄소중립(Net Zero)' 
                            <br> Smart 폐기물 에너지화 엔이씨가 선도합니다
                        </p>
                        <p style="font-size: 1.7em" class="no-letter-spacing sub">NEC 스마트 소각발전시스템</p>
                    </h1>
                </div>

                <div class="col-md-10 col-xl-11 col-xxl-9 mx-auto py-5 px-1-6 px-md-6 px-lg-8 px-xxl-14 text-block"  id="text-5" style=" position: absolute; z-index:100;">
                    <h1 class="lh-1 mt-8 mt-lg-10 font-weight-700" style="text-transform: none">
                        <p style="font-size: 3.5em" class="minus2-letter-spacing">'2050 탄소중립(Net Zero)' 
                            <br> Smart 폐기물 에너지화 엔이씨가 선도합니다
                        </p>
                        <p style="font-size: 1.7em" class="no-letter-spacing sub">NEC 2차연소공기 Semi Auto 운전시스템</p>
                    </h1>
                </div>

                <div class="col-md-10 col-xl-11 col-xxl-9 mx-auto py-5 px-1-6 px-md-6 px-lg-8 px-xxl-14 text-block"  id="text-6" style=" position: absolute; z-index:100;">
                    <h1 class="lh-1 mt-8 mt-lg-10 font-weight-700" style="text-transform: none">
                        <p style="font-size: 3.5em" >
                            ICT 기반의 NEC 소각발전시설 
                            운영정보화를 <br>통한 
                            실시간 스마트 통합운영관리 <br>시스템을 
                            보유하고 있습니다
                        </p>
                    </h1>
                </div>
            
          
        </div>

        
        <div class="swiper-slide video-banner"  data-swiper-autoplay="8000" data-slide-type="vdo1">
            <video 
            id="my-player1" 
            class="video1"
            disablePictureInPicture
            muted
            autoplay>
                <source src="video/main_drone.mp4" type="video/mp4"/>
            </video>

            <div class="col-md-10 col-xl-11 col-xxl-9 mx-auto py-5 px-1-6 px-md-6 px-lg-8 px-xxl-14 text-block" style=" position: absolute; z-index:100">
                <h1 class="lh-1 mt-8 mt-lg-10 font-weight-700" style="text-transform: none">
                    <p style="font-size: 3.5em; line-height: 160%" class="no-letter-spacing">"국내 최초 인도네시아 생활폐기물 <br>소각발전시설 EPC 수주"</p>
                    
                </h1>
            </div>

            <div class="col-md-10 col-xl-11 col-xxl-9 mx-auto py-5 px-1-6 px-md-6 px-lg-8 px-xxl-14 text-block" style=" position: absolute; z-index:100">
                <h1 class="lh-1 mt-8 mt-lg-10 font-weight-700" style="text-transform: none">
                    <p style="font-size: 3.5em; line-height: 150%" class="minus2-letter-spacing">
                        인도네시아 수도이전 신수도(IKN) <br> 
                        MSW 소각발전시설(30t/d x 2기) 설치공사 중
                    </p>
                    <p style="font-size: 1.7em; line-height: 160%" class="sub">
                        2024년 12월 31일 준공 및 위탁운영 (O&M) 예정
                    </p>
                </h1>
            </div>
        </div>
       
        
        
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
                additionalDelay = 1000;
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
                hideTime += 1700;
            } else if (slideType === 'vdo2' && index === 2) {
                hideTime += 0;
            } else if (slideType === 'vdo2' && index === 3) {
                hideTime += 0;
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