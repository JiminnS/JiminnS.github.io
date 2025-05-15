<?php
session_start();

// 세션 만료 시간을 설정 (예: 30분 = 1800초)
$session_timeout = 600; 

// 세션이 만료되었는지 확인
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $session_timeout)) {
    // 세션 만료 처리: 세션을 비우고, 로그인 페이지로 리디렉션
    session_unset();
    session_destroy();

    // 만료된 후 로그인 페이지로 이동할 때 원래 URL을 redirect 파라미터로 포함
    $redirect_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header("Location: news_tool_login.php?redirect=" . urlencode($redirect_url));
    exit;
}
// 로그인 확인
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // 로그인되지 않은 경우에도 원래 URL을 redirect 파라미터로 설정
    $redirect_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header("Location: news_tool_login.php?redirect=" . urlencode($redirect_url));
    exit;
}

// 마지막 활동 시간을 갱신하여 세션이 계속 유지되도록 함
$_SESSION['last_activity'] = time();



// 남은 시간 계산 (초 단위)
$time_left = $session_timeout - (time() - $_SESSION['last_activity']);
?>





<!DOCTYPE html>
<html lang="en">
 
<head>
    <!-- metas -->
    <meta charset="utf-8" />
    <meta name="author" content="Chitrakoot Web" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="keywords" content="Environment & Ecology HTML Template" />
    <meta name="description" content="Ecology - Environment & Ecology HTML Template" />

     <!-- title  -->
     <title>(주)엔이씨파워</title>

     <!-- favicon -->
     <link rel="icon" type="image/png" sizes="16x16" href="../img/necpower/favicon.ico">

    <!-- plugins -->
    <link rel="stylesheet" href="../css/plugins.css">

    <!-- search css -->
    <link rel="stylesheet" href="../search/search.css">

    <!-- quform css -->
    <link rel="stylesheet" href="../quform/css/base.css">

    <!-- core style css -->
    <link href="../css/styles2.css" rel="stylesheet">

    <!-- custom css -->
    <link href="../css/custom.css" rel="stylesheet">

    <!-- TinyMCE CDN -->
    <script src="https://cdn.tiny.cloud/1/hy8n0zqfjsrqlpwxjnl8jxy033bfnlhpy9sro5ehetz97r2c/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>   

        document.addEventListener('DOMContentLoaded', function() {
            tinymce.init({
                selector: '#comment',  // textarea의 id와 일치
                plugins: ["advlist", "autolink", "lists", "link", "image", "charmap", "print", "preview", "anchor",
                "searchreplace", "visualblocks", "code", "fullscreen", "insertdatetime", "media", "table",
                "paste", "code", "help", "wordcount", "save"],
                toolbar:  'undo redo | formatselect | fontsizeselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat',
                // convert_urls : false,
                // link_assume_external_targets: true,
                // default_link_target: '_blank',
                newline_behavior: 'linebreak',
                font_size_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt 45pt 60pt 72pt 96pt 120pt',
                // setup: function(editor) {
                //     editor.on('input', function() {
                //         previewFile(); // 입력 시 미리보기 업데이트
                //     });
                // }
            });
        });

        console.log(tinymce.get('comment')); // TinyMCE 에디터가 초기화되었는지 확인

    </script>

    <script>
        // 새로고침 여부를 확인하는 플래그 변수
        let isReloading = false;

        // 새로고침 시 플래그 변수를 설정
        window.addEventListener("beforeunload", function () {
            isReloading = true;
        });

        // 창이 닫힐 때 로그아웃을 호출하여 세션 만료
        document.addEventListener("visibilitychange", function () {
            // 새로고침이 아닌 경우에만 로그아웃 요청
            if (document.visibilityState === "hidden" && !isReloading) {
                navigator.sendBeacon("logout.php");
            }
        });

        // 서버에서 PHP로 전달받은 남은 시간
        let timeLeft = <?php echo $time_left; ?>;

        // 매초마다 남은 시간을 감소시키고 화면에 표시
        function startCountdown() {
            const timerElement = document.getElementById("timer");
            const warningElement = document.getElementById("warning");

            setInterval(() => {
                if (timeLeft > 0) {
                    timeLeft--;

                    // 분과 초로 변환하여 2자리 형식으로 표시
                    const minutes = String(Math.floor(timeLeft / 60)).padStart(2, '0');
                    const seconds = String(timeLeft % 60).padStart(2, '0');

                    // `00분 00초` 형식으로 표시
                    timerElement.textContent = `${minutes}분 ${seconds}초 남음`;

                    // 남은 시간이 20초 이하일 때 경고 메시지 표시
                    if (timeLeft <= 20) {
                        warningElement.style.display = "block";
                    }
                } else {
                    // 세션 만료 시 로그인 페이지로 리디렉션
                    window.location.href = "news_tool_login.php?redirect=" + encodeURIComponent(window.location.href);
                }
            }, 1000);
        }

        // 페이지 로드 시 카운트다운 시작
        window.onload = startCountdown;
    </script>

    
    <style>
        .autocomplete-container {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .autocomplete-items {
            position: absolute;
            border: 1px solid #d4d4d4;
            border-bottom: none;
            border-top: none;
            z-index: 99;
            top: 100%;
            left: 0;
            right: 0;
            background-color: white;
            width: 100%;
        }

        .autocomplete-item {
            padding: 10px;
            cursor: pointer;
            background-color: #fff;
            border-bottom: 1px solid #d4d4d4;
        }

        .autocomplete-item:hover {
            background-color: #e9e9e9;
        }
    </style>


</head>

<body>

    <!-- PAGE LOADING
    ================================================== -->
    <div id="preloader"></div>

    <!-- MAIN WRAPPER
    ================================================== -->
    <div class="main-wrapper">

        <!-- HEADER
        ================================================== -->
        

        <!-- PAGETITLE
        ================================================== -->
        <!-- <section class="page-title-section bg-img cover-background top-position left-overlay-dark me-xl-10" data-overlay-dark="9" data-background="img/necpower/main_slide03.png">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-animation text-center text-sm-start" data-in-effect="fadeInUp">News</h1>
                    </div>
                </div>
            </div>
            <div class="sub-sm-title">
                <ul class="wow fadeInUp" data-wow-delay="400ms">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#!">PR CENTER</a></li>
                    <li><a href="#!">News</a></li>
                    <li><a href="#!">Environmental Info</a></li>
                </ul>
            </div>
        </section> -->

        <!-- BLOG GRID
        ================================================== -->
    
        <section class="py-0">
            <p style="margin: 0 !important;">세션 만료까지 남은 시간: <span id="timer"></span></p>
            <p id="warning" style="display: none; color: red;">세션이 곧 만료됩니다.</p>
            <div class="container-fluid p-0">
                <div class=" g-0 middle" >
                    <div class="col-lg-10">
                        <div class="py-1-9 py-sm-7 px-1-9 px-sm-6 px-xl-8 px-xxl-12">
                            <div class="section-title mb-1-9 mb-sm-5">
                                <span>추가</span>
                                <h2 class="mb-0">뉴스 추가</h2>
                            </div>
                            <form id="articleForm" class="quform" action="save_to_json.php" method="post" enctype="multipart/form-data">
                                <div class="quform-elements">
                                    <div class="row">

                                        <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="name">날짜<span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="date" type="date" name="date" placeholder="" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->  

                                        <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="name">카테고리<span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="category" type="text" name="category" placeholder="" readonly/>
                                                    <div id="autocomplete-list" class="autocomplete-items">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->   
                                         
                                        <!-- Begin Text input element -->
                                        <div class="col-md-12">
                                            <div class="quform-element form-group">
                                                <label for="name">제목<span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="title" type="text" name="title" placeholder="" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->  

                                        <!-- Begin Text input element -->
                                        <div class="col-md-12">
                                            <div class="quform-element form-group">
                                                <label for="name">이미지<span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="image" type="file" name="fileToUload" placeholder="" />
                                                </div>
                                            </div>
                                        </div>                                      
                                        <!-- End Text input element --> 
                                         
                                        <!-- Begin Textarea element -->
                                        <!-- Comment Input -->
                                        <div class="col-md-12">
                                            <div class="quform-element form-group">
                                                <label for="comment">내용<span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <textarea class="form-control" id="comment" type="text" name="content" placeholder="Enter comment text" ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Textarea element -->


                                         <!-- Submit 버튼 -->
                                        <div class="col-md-12">
                                            <div class="quform-submit-inner">
                                                <button id="save" class="butn md border-0" type="submit" onclick="return confirmInsert();"><span>추가</span></button>
                                            </div>
                                            <div class="quform-loading-wrap text-start"><span class="quform-loading"></span></div>
                                        </div>
                                        <!-- End Submit button -->

                                       
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
    <!-- Form validation script -->
    <script>
        // Delete 버튼 클릭 시 확인 알람 표시
        function confirmInsert() {
            return confirm("정말 추가하시겠습니까?");
        }

        document.getElementById("articleForm").addEventListener("submit", function(event) {
            const date = document.getElementById('date').value.trim();
            const category = document.getElementById('category').value.trim();
            const title = document.getElementById('title').value.trim();
            const image = document.getElementById('image').value.trim();
            const content = document.getElementById('content').value.trim();

            // 검증할 필드가 비어있는지 확인
            if(!date && !category && !title && !image && !content) {
                alert("모두 입력해주세요");
                event.preventDefault(); // 폼 제출 중단
            }else if (!date) {
                alert("날짜를 선택해주세요");
                event.preventDefault(); // 폼 제출 중단
            } else if (!category) {
                alert("카테고리를 선택해주세요");
                event.preventDefault(); // 폼 제출 중단
            } else if (!title) {
                alert("제목을 입력해주세요");
                event.preventDefault(); // 폼 제출 중단
            } else if (!image) {
                alert("사진을 선택해주세요");
                event.preventDefault(); // 폼 제출 중단
            } else if (!content) {
                alert("내용을 입력해주세요");
                event.preventDefault(); // 폼 제출 중단
            }
        });

    // 자동완성 항목 리스트
    const categories = ["언론에서 본 NEC", "아세안 소식", "환경정보"];

    // 입력창 클릭 시 자동완성 항목 표시
    document.getElementById("category").addEventListener("focus", function() {
        showAutocompleteItems();
    });

    function showAutocompleteItems() {
        const autocompleteList = document.getElementById("autocomplete-list");
        autocompleteList.innerHTML = ""; // 기존 항목 초기화

        // 자동완성 항목 생성
        categories.forEach(category => {
            const item = document.createElement("div");
            item.classList.add("autocomplete-item");
            item.innerText = category;
            item.addEventListener("click", function() {
                document.getElementById("category").value = category;
                autocompleteList.innerHTML = ""; // 항목 선택 후 리스트 초기화
            });
            autocompleteList.appendChild(item);
        });
    }

    // 입력창 이외의 곳을 클릭했을 때 자동완성 항목 숨기기
    document.addEventListener("click", function(e) {
        if (!e.target.matches('#category')) {
            document.getElementById("autocomplete-list").innerHTML = "";
        }
    });
    </script>



   

    <!-- SCROLL TO TOP
    ================================================== -->
    <a href="#!" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>

    <!-- all js include start -->

    <!-- jQuery -->
    <script src="../js/jquery.min.js"></script>

    <!-- popper js -->
    <script src="../js/popper.min.js"></script>

    <!-- bootstrap -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- search -->
    <script src="../search/search.js"></script>

    <!-- navigation -->
    <script src="../js/nav-menu.js"></script>

    <!-- tab -->
    <script src="../js/easy.responsive.tabs.js"></script>

    <!-- owl carousel -->
    <script src="../js/owl.carousel.js"></script>

    <!-- jarallax -->
    <script src="../js/jarallax.min.js"></script>

    <!-- jarallax video -->
    <script src="../js/jarallax-video.js"></script>

    <!-- jquery.counterup.min -->
    <script src="../js/jquery.counterup.min.js"></script>

    <!-- wow js -->
    <script src="../js/wow.js"></script>

    <!--  clipboard js -->
    <script src="../js/clipboard.min.js"></script>

    <!--  prism js -->
    <script src="../js/prism.js"></script>

    <!-- stellar js -->
    <script src="../js/jquery.stellar.min.js"></script>

    <!-- countdown js -->
    <script src="../js/countdown.js"></script>

    <!-- jquery.magnific-popup js -->
    <script src="../js/jquery.magnific-popup.min.js"></script>

    <!-- lightgallery js -->
    <script src="../js/lightgallery-all.js"></script>

    <!-- mousewheel js -->
    <script src="../js/jquery.mousewheel.min.js"></script>

    <!-- waypoints js -->
    <script src="../js/waypoints.min.js"></script>

    <!-- lettering js -->
    <script src="../js/jquery.lettering.js"></script>

    <!-- textillate js -->
    <script src="../js/jquery.textillate.js"></script>

    <!-- custom scripts -->
    <script src="../js/main.js"></script>


    <!-- form scripts js -->
    <script src="../quform/js/scripts.js"></script>

    <!-- pagination.js -->
    <script src="../js/pagination.js"></script>

    <!-- all js include end -->

</body>

</html>