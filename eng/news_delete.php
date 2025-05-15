

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
     <title>NEC Power</title>

     <!-- favicon -->
     <link rel="icon" type="image/png" sizes="16x16" href="../img/necpower/favicon.ico">

    <!-- plugins -->
    <link rel="stylesheet" href="css/plugins.css">

    <!-- search css -->
    <link rel="stylesheet" href="search/search.css">

    <!-- quform css -->
    <link rel="stylesheet" href="quform/css/base.css">

    <!-- core style css -->
    <link href="css/styles2.css" rel="stylesheet">

    <!-- custom css -->
    <link href="css/custom.css" rel="stylesheet">

    
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

        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            width: 70%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            max-height: 500px; /* 팝업 창의 최대 높이 설정 */
            overflow-y: auto;  /* 세로 스크롤을 가능하게 함 */
        }
        .popup.visible {
            display: block;
        }
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
        .overlay.visible {
            display: block;
        }
        .close {
            cursor: pointer;
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
            <div class="container-fluid p-0">
                <div class=" g-0 middle" >
                    <div class="col-lg-10">
                        <div class="py-1-9 py-sm-7 px-1-9 px-sm-6 px-xl-8 px-xxl-12">
                            <div class="section-title mb-1-9 mb-sm-5">
                                <span>Delete</span>
                                <h2 class="mb-0">Delete New Article</h2>
                            </div>
                            <form class="quform" action="delete_to_json.php" method="post" enctype="multipart/form-data" onclick="">
                                <div class="quform-elements">
                                    <div class="row">
                                        
                                        <!-- Begin Text input element -->
                                        <div class="col-md-12">
                                            <div class="quform-element form-group">
                                                <label for="name">Title <span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input style="font-size: 0.9rem" class="form-control" id="title" type="text" name="title" placeholder=""  onclick="showPopup()" readonly/>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- pop up -->
                                        <div id="popup" class="popup">
                                            <p id="popupTitle" class="h5">Title Popup</p>
                                            <?php
                                                // JSON 파일 경로
                                                $jsonFile = 'news_data/news.json';

                                                // JSON 파일 내용 읽기
                                                $jsonData = file_get_contents($jsonFile);

                                                // JSON 데이터 배열로 변환 
                                                $articles = json_decode($jsonData, true);

                                                // 배열을 뒤집어서 마지막 요소부터 순회하도록 설정
                                                $reversedArticles = array_reverse($articles[0]);

                                                // 기사 목록 반복문
                                                foreach ($reversedArticles as $key => $article) {
                                                    echo '<div class="card1 col-lg-12 mt-1-9" onclick="setTitle(\'' . addslashes($article['title']) . '\')">';
                                                    echo    '<p> ' . $article['title'] . '</p>';
                                                    echo    '<p> ' . $article['date'] . ' </p>';
                                                    echo '</div>';
                                                    echo '<hr>';
                                                }
                                            ?>
                                            <a onclick="closePopup()" class="close">Close</a>
                                        </div>

                                        <!-- 팝업 배경(배경 누르면 닫히게 하는 용도) -->
                                        <div id="overlay" class="overlay" onclick="closePopup()"></div>

                                        <!-- End Text input element -->  

                                        


                                         <!-- Submit 버튼 -->
                                        <div class="col-md-12">
                                            <div class="quform-submit-inner">
                                                <button class="butn md border-0" type="submit"><span>Delete</span></button>
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
        <script>
    // 팝업을 표시하는 함수
    function showPopup() {
        // 팝업 및 배경 표시
        document.getElementById('popup').classList.add('visible');
        document.getElementById('overlay').classList.add('visible');
    }

    // 팝업을 닫는 함수
    function closePopup() {
        document.getElementById('popup').classList.remove('visible');
        document.getElementById('overlay').classList.remove('visible');
    }

     // 제목을 input에 설정하는 함수
     function setTitle(title) {
        document.getElementById('title').value = title;
        closePopup(); // 팝업을 닫음
    }

    // 선택된 제목을 삭제하는 함수
    function deleteTitle() {
        var title = document.getElementById('title').value;

        if (title.trim() === "") {
            alert("Please select a title to delete.");
            return;
        }

        // AJAX 요청으로 서버에 삭제 요청 전송
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "delete_article.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                alert(xhr.responseText); // 서버 응답 표시
                document.getElementById('title').value = ""; // 삭제 후 입력란 초기화
            }
        };
        xhr.send("title=" + encodeURIComponent(title));
    }
</script>

   



        

    </div>

    <!-- SCROLL TO TOP
    ================================================== -->
    <a href="#!" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>

    <!-- all js include start -->

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- popper js -->
    <script src="js/popper.min.js"></script>

    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>

    <!-- search -->
    <script src="search/search.js"></script>

    <!-- navigation -->
    <script src="js/nav-menu.js"></script>

    <!-- tab -->
    <script src="js/easy.responsive.tabs.js"></script>

    <!-- owl carousel -->
    <script src="js/owl.carousel.js"></script>

    <!-- jarallax -->
    <script src="js/jarallax.min.js"></script>

    <!-- jarallax video -->
    <script src="js/jarallax-video.js"></script>

    <!-- jquery.counterup.min -->
    <script src="js/jquery.counterup.min.js"></script>

    <!-- wow js -->
    <script src="js/wow.js"></script>

    <!--  clipboard js -->
    <script src="js/clipboard.min.js"></script>

    <!--  prism js -->
    <script src="js/prism.js"></script>

    <!-- stellar js -->
    <script src="js/jquery.stellar.min.js"></script>

    <!-- countdown js -->
    <script src="js/countdown.js"></script>

    <!-- jquery.magnific-popup js -->
    <script src="js/jquery.magnific-popup.min.js"></script>

    <!-- lightgallery js -->
    <script src="js/lightgallery-all.js"></script>

    <!-- mousewheel js -->
    <script src="js/jquery.mousewheel.min.js"></script>

    <!-- waypoints js -->
    <script src="js/waypoints.min.js"></script>

    <!-- lettering js -->
    <script src="js/jquery.lettering.js"></script>

    <!-- textillate js -->
    <script src="js/jquery.textillate.js"></script>

    <!-- custom scripts -->
    <script src="js/main.js"></script>

    <!-- form plugins js -->
    <script src="quform/js/plugins.js"></script>

    <!-- form scripts js -->
    <script src="quform/js/scripts.js"></script>

    <!-- pagination.js -->
    <script src="js/pagination.js"></script>

    <!-- all js include end -->

</body>

</html>