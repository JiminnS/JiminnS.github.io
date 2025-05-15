<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Swiper Preview with Input</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Swiper js -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Swiper css -->
    <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <!-- video js -->
    <link href="https://vjs.zencdn.net/8.5.2/video-js.css" rel="stylesheet"/>
    <script src="https://vjs.zencdn.net/8.5.2/video.min.js"></script>

    <!-- favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../img/necpower/favicon.ico">

    <!-- plugins -->
    <link rel="stylesheet" href="../../css/plugins.css">

    <!-- quform css -->
    <link rel="stylesheet" href="../../quform/css/base.css">

    <!-- core style css -->
    <link href="../../css/styles2.css" rel="stylesheet">

    <!-- custom css -->
    <link href="../../css/custom.css" rel="stylesheet">

     <!-- TinyMCE CDN -->
    <script src="https://cdn.tiny.cloud/1/hy8n0zqfjsrqlpwxjnl8jxy033bfnlhpy9sro5ehetz97r2c/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            tinymce.init({
                selector: '#comment',  // textarea의 id와 일치
                toolbar: 'undo redo | formatselect | fontsizeselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat',
                font_size_formats: "1em 1.5em 2em 2.5em 3em 3.5em 4em 4.5em 5em",
                plugins: 'lists',
                setup: function(editor) {
                    editor.on('change', function() {
                        previewFile(); // 입력 시 미리보기 업데이트
                    });
                }
            });
        });

        console.log(tinymce.get('comment')); // TinyMCE 에디터가 초기화되었는지 확인

    </script>


    <style>
        .swiper-container {
            position: relative;
            overflow: hidden;
            width: 100%;
            height: 100%;
            padding: 0 !important;
            /* padding-top: 83px; */

        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: blur(1px);
        }

        .swiper-slide video {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .swiper-slide .video1 {
            filter: blur(1px);
        }

        .swiper-slide .overlay-text1 {
            position: absolute;
            top: 50%;
            left: 30%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 60px;
            text-align: center;
            /* background: rgba(0, 0, 0, 0.5); */
            padding: 10px 20px;
            border-radius: 5px;
        }

        @keyframes appear {
            from{
                transform: translateY(200px);
                opacity: 0;
            }
            to{
                transform: translateY(0);
                opacity: 0.9;
            }
        }


        .appear {
            animation: appear 1s forwards;
        }

        .appear-delay {
            animation: appear 2s forwards;
        }

        .text-block {
            position: relative;
            width: 100%;
            opacity: 1;
            transition: opacity 0.5s ease-in-out;
            user-select: none;
            padding: 0 0 0 5%; 
            margin: 0 0 15% 5%;
        }

        .text-block.image {
            position: relative;
            top: 10%;
            width: 100%;
            height: 400px;
            opacity: 1 !important;
            transition: opacity 0.5s ease-in-out;
            user-select: none;
        }


        .text-block h1 {
            font-family: 'Noto Sans KR';
            text-align: left;
            letter-spacing: -1px; 
        }

        .text-block p {
            line-height: 140%; 
        }

        .swiper-button-prev::after,
        .swiper-button-next::after {
            font-family: "Font Awesome 5 Free"; /* 아이콘 폰트 사용 가능 */
            content: "\f0d9"; /* 화살표 아이콘 */
            font-weight: 900;
            color: white;
            padding: 0 5%;
        }

        .swiper-button-next::after {
            content: "\f0da"; /* 오른쪽 화살표 */
        }

        .swiper-buttons {
            position: relative;
            bottom: 10%;
            width: 100px;
            margin: 0 auto;
        }

        .swiper-pagination {
            margin: 0 0 0 6%  !important;
            width: 100% !important;
            bottom: 35% !important;
            text-align: left;
        
        }

        .swiper-pagination-bullet { 
            width: 12px; 
            height: 12px; 
            background: transparent; 
            border: 1px solid white; 
            opacity: 1; 
        }

        .swiper-pagination-bullet-active { 
            width: 40px; 
            transition: width .5s; 
            border-radius: 5px; 
            background: white; 
            border: 1px solid transparent; 
        }

        .sub {
            color: #e0fff4;
            /* color: #c6e0d7; */
        }
    </style>
</head>

<body>

<section class="jarallax p-0 full-screen top-position video-banner">
    <!-- Swiper 미리보기 -->
    <h3>미리보기</h3>
    <div class="swiper-container">
        <div class="swiper-wrapper" id="previewSwiperWrapper">
            <!-- 미리보기 슬라이드가 동적으로 추가됩니다 -->
        </div>
        <div class="swiper-buttons">
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<section class="py-0">
    <div class="container-fluid p-0">
        <div class="g-0 middle">
            <div class="col-lg-10">
                <div class="py-1-9 py-sm-7 px-1-9 px-sm-6 px-xl-8 px-xxl-12">
                    <form id="articleForm" class="quform" action="../../save_to_swiper.php" method="post" enctype="multipart/form-data">
                        <div class="quform-elements">
                            <div class="row">

                                <!-- Video Input -->
                                <div class="col-md-6">
                                    <div class="quform-element form-group">
                                        <label for="video">Video<span class="quform-required">*</span></label>
                                        <div class="quform-input">
                                            <input class="form-control" id="video" type="file" name="video" accept="video/*" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Image Input -->
                                <div class="col-md-6">
                                    <div class="quform-element form-group">
                                        <label for="img">Image<span class="quform-required">*</span></label>
                                        <div class="quform-input">
                                            <input class="form-control" id="img" type="file" name="img" accept="image/*" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Running Time Input -->
                                <div class="col-md-6">
                                    <div class="quform-element form-group">
                                        <label for="time">Running time(초)<span class="quform-required">*</span></label>
                                        <div class="quform-input">
                                            <input class="form-control" id="time" type="number" name="time" placeholder="Enter time in milliseconds" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Comment Input -->
                                <div class="col-md-12">
                                    <div class="quform-element form-group">
                                        <label for="comment">Comment<span class="quform-required">*</span></label>
                                        <div class="quform-input">
                                            <textarea class="form-control" id="comment" type="text" name="comment" placeholder="Enter comment text" ></textarea>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" id="slidesData" name="slidesData" value="">

                                <!-- Preview 버튼 -->
                                <div class="col-md-12">
                                    <!-- <button id="previewBtn" class="btn btn-primary" type="button">미리보기</button> -->
                                    <!-- Add 버튼 -->
                                    <div style="display: inline-block" class="quform-submit-inner">
                                        <button type="submit" id="save" class="btn btn-primary" ><span>추가</span></button>
                                        <div class="quform-loading-wrap text-start"><span class="quform-loading"></span></div>
                                    </div>
                                    <!-- Reset 버튼 -->
                                    <button id="resetBtn" class="btn btn-primary" type="button">전체 초기화</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



<script>
    var previewSlidesData = [];
    let currentPreviewIndex = null; // 현재 미리보기 중인 슬라이드 인덱스

    // Swiper 초기화
    var swiper = new Swiper('.swiper-container', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        loop: true,
        autoplay: false
    });

    // 미리보기 로직
    function previewFile() {
        var videoInput = document.getElementById('video');
        var imgInput = document.getElementById('img');

        // TinyMCE에서 comment 데이터를 가져오기
        var commentInput = tinymce.get('comment').getContent(); // TinyMCE API로 content 가져오기

        // 비디오와 이미지가 모두 선택되지 않았다면 경고 표시
        // if (videoInput.files.length === 0 && imgInput.files.length === 0) {
        //     alert('비디오나 이미지를 선택하세요.');
        //     return; // 미리보기 중지
        // }

        

        // 동영상 미리보기
        if (videoInput.files.length > 0) {
            var videoFile = videoInput.files[0];
            var reader = new FileReader();
            reader.onload = function (e) {
                var slide = {
                    type: 'video',
                    src: e.target.result,
                    comment: commentInput // TinyMCE에서 가져온 comment 사용
                };
                if (currentPreviewIndex !== null) {
                    updateSlide(currentPreviewIndex, slide); // 기존 슬라이드 업데이트
                } else {
                    previewSlidesData.push(slide); // 새로운 슬라이드 추가
                    addSlideToSwiper(slide);
                    currentPreviewIndex = previewSlidesData.length - 1; // 현재 미리보기 인덱스 설정
                }
            };
            reader.readAsDataURL(videoFile);
        }

        // 이미지 미리보기
        else if (imgInput.files.length > 0) {
            var imgFile = imgInput.files[0];
            var reader = new FileReader();
            reader.onload = function (e) {
                var slide = {
                    type: 'image',
                    src: e.target.result,
                    comment: commentInput // TinyMCE에서 가져온 comment 사용
                };
                if (currentPreviewIndex !== null) {
                    updateSlide(currentPreviewIndex, slide); // 기존 슬라이드 업데이트
                } else {
                    previewSlidesData.push(slide); // 새로운 슬라이드 추가
                    addSlideToSwiper(slide);
                    currentPreviewIndex = previewSlidesData.length - 1; // 현재 미리보기 인덱스 설정
                }
            };
            reader.readAsDataURL(imgFile);
        }
    }


   // 슬라이드 업데이트 로직
    function updateSlide(index, slideData) {
        var slideElements = document.getElementsByClassName('swiper-slide');
        var slide = slideElements[index];

        var slideContent = '';

        if (slideData.type === 'video') {
            slideContent += `
                <video id="my-player${index}" class="video${index}" disablePictureInPicture muted autoplay preload="auto">
                    <source src="${slideData.src}" type="video/mp4">
                </video>
            `;
        } else if (slideData.type === 'image') {
            slideContent += `<img src="${slideData.src}">`;
        }

        slideContent += `
            <div class="col-md-10 col-xl-11 col-xxl-9 mx-auto py-5 px-1-6 px-md-6 px-lg-8 px-xxl-14 text-block" id="text-1" style="position: absolute; z-index:100;">
                <h1 class="lh-1 mt-8 mt-lg-10 font-weight-700" style="text-transform: none">
                    <p class="display-xl-1 big">${slideData.comment}</p>
                </h1>
            </div>
        `;

        slide.innerHTML = slideContent;
        swiper.update(); // Swiper 업데이트
    }

    // 슬라이드 추가 로직
    function addSlideToSwiper(slideData) {
        var previewSwiperWrapper = document.getElementById('previewSwiperWrapper');
        var slide = document.createElement('div');
        slide.classList.add('swiper-slide', 'video-banner');

        var slideContent = '';

        if (slideData.type === 'video') {
            slideContent += `
                <video id="my-player${previewSlidesData.length}" class="video${previewSlidesData.length}" disablePictureInPicture muted autoplay preload="auto">
                    <source src="${slideData.src}" type="video/mp4">
                </video>
            `;
        } else if (slideData.type === 'image') {
            slideContent += `<img src="${slideData.src}">`;
        }

        slideContent += `
            <div class="col-md-10 col-xl-11 col-xxl-9 mx-auto py-5 px-1-6 px-md-6 px-lg-8 px-xxl-14 text-block" id="text-1" style="position: absolute; z-index:100;">
                <h1 class="lh-1 mt-8 mt-lg-10 font-weight-700" style="text-transform: none">
                    <p class="display-xl-1 big">${slideData.comment}</p>
                </h1>
            </div>
        `;

        slide.innerHTML = slideContent;
        previewSwiperWrapper.appendChild(slide);
        swiper.update(); // Swiper 업데이트
    }


    // 전체 초기화 로직
    function resetForm() {
        // 폼 초기화
        document.getElementById('articleForm').reset();

        // 미리보기 초기화
        var previewSwiperWrapper = document.getElementById('previewSwiperWrapper');
        previewSwiperWrapper.innerHTML = ''; // Swiper 슬라이드 비우기
        previewSlidesData = []; // 슬라이드 데이터 초기화
        slideCount = 1; // 슬라이드 카운트 초기화
        swiper.update(); // Swiper 업데이트 중지
        swiper.autoplay.stop(); // Autoplay 중지
        // 미리보기 영역 초기화

    }

    document.getElementById("articleForm").addEventListener("submit", function(event) {
            const video = document.getElementById('video').value.trim();
            const img = document.getElementById('img').value.trim();
            const time = document.getElementById('time').value.trim();
            const comment = document.getElementById('comment').value.trim();

            // 검증할 필드가 비어있는지 확인
            if(!video && !img && !time && !comment) {
                alert("모두 입력해주세요");
                event.preventDefault(); // 폼 제출 중단
            }else if (!video && !img) {
                alert("영상 또는 사진을 선택해주세요");
                event.preventDefault(); // 폼 제출 중단
            } else if (!time) {
                alert("시간을 입력해주세요");
                event.preventDefault(); // 폼 제출 중단
            } else if (!title) {
                alert("코멘트를 입력해주세요");
                event.preventDefault(); // 폼 제출 중단
            }

            // 슬라이드 데이터가 있을 경우 hidden input에 데이터 저장
    //     if (previewSlidesData.length > 0) {
    //         var slidesDataInput = document.getElementById('slidesData');
    //         slidesDataInput.value = JSON.stringify(previewSlidesData); // 슬라이드 데이터를 JSON 문자열로 변환하여 저장
    //     }
        });


        document.getElementById('save').addEventListener('click', function (e) {

            // 슬라이드 데이터가 있을 경우 hidden input에 데이터 저장
            if (previewSlidesData.length > 0) {
                var slidesDataInput = document.getElementById('slidesData');
                slidesDataInput.value = JSON.stringify(previewSlidesData); // 슬라이드 데이터를 JSON 문자열로 변환하여 저장
            }

            
        });


    // // 추가 버튼 클릭 시 실행
    // document.getElementById('save').addEventListener('click', function (e) {
    //     e.preventDefault();  // 기본 제출 방지
    
    // // 파일 확인 후 조건 충족 시에만 제출
    // var videoInput = document.getElementById('video');
    // var imgInput = document.getElementById('img');
    // if (videoInput.files.length === 0 && imgInput.files.length === 0) {
    //     alert('비디오나 이미지를 선택하세요.');
    //     return;
    // }

    //     // 슬라이드 데이터가 있을 경우 hidden input에 데이터 저장
    //     if (previewSlidesData.length > 0) {
    //         var slidesDataInput = document.getElementById('slidesData');
    //         slidesDataInput.value = JSON.stringify(previewSlidesData); // 슬라이드 데이터를 JSON 문자열로 변환하여 저장
    //     }

    //     // 파일이 선택된 경우에는 기본 폼 제출 동작을 허용
    //     document.getElementById('articleForm').submit();
    // });

    // 전체 초기화 버튼 클릭 시 실행
    document.getElementById('resetBtn').addEventListener('click', resetForm);

    /// 미리보기 버튼 클릭 시 실행
    document.getElementById('previewBtn').addEventListener('click', addSlideToSwiper);

    // 파일 및 텍스트 입력 시 자동 미리보기 실행 (미리보기 버튼 누르기 전까지 슬라이드 추가 안 함)
    document.getElementById('video').addEventListener('change', previewFile);
    document.getElementById('img').addEventListener('change', previewFile);
    tinymce.get('comment').on('input', previewFile);  // 텍스트 입력 시에도 미리보기

</script>




</body>
</html>
