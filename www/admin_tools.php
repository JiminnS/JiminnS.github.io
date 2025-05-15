<?php
session_start();

$_SESSION['access_granted'] = false;  // 세션에 접근 허용 값 설정

// $_SESSION['redirect_url'] = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

// 로그인 확인
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // 로그인되지 않은 경우에도 원래 URL을 redirect 파라미터로 설정
    $redirect_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header("Location: news_tool/news_tool_login.php?redirect=" . urlencode($redirect_url));
    exit;
}



session_destroy();

session_start();
$_SESSION['access_granted'] = true;  // 세션에 접근 허용 값 설정

$_SESSION['start_time'] = time();  // 세션 시작 시간 기록


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
   <link rel="icon" type="image/png" sizes="16x16" href="img/necpower/favicon.ico">

    <!-- plugins -->
    <link rel="stylesheet" href="css/plugins.css">

    <!-- search css -->
    <link rel="stylesheet" href="search/search.css">

    <!-- quform css -->
    <link rel="stylesheet" href="quform/css/base.css">

    <!-- core style css -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- custom css -->
    <link href="css/custom.css" rel="stylesheet">

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
        <section class="page-title-section bg-img  top-position left-overlay-dark me-xl-10" data-overlay-dark="9" data-background="img/necpower/ict_program01.png">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center" data-in-effect="fadeInUp">ADMIN TOOLS</h1>
                    </div>
                </div>
            </div>
            
        </section>

        <!-- ABOUT
        ================================================== -->
        <section>
            <div class="container">
                <div class="row mt-n1-9">
                    <div class="mt-1-9" style="text-align: center; margin-bottom: 5%">
                        <p class="h1 m-1-6">한국어 버전</p>
                        <div>                            
                            <button style="margin:1%" onclick="window.location.href='<?php echo 'news_tool/news_insert_kor.php'; ?>'" type="button" class="btn btn-outline-secondary mx-1-6">뉴스추가</button>

                            <button style="margin:1%" onclick="window.location.href='<?php echo 'news_tool/news_delete_kor.php'; ?>'" type="button" class="btn btn-outline-secondary mx-1-6">뉴스삭제</button>

                            <button style="margin:1%" onclick="window.location.href='<?php echo 'document_tool/document_insert_kor.php'; ?>'" type="button" class="btn btn-outline-secondary mx-1-6">자료추가</button>

                            <button style="margin:1%" onclick="window.location.href='<?php echo 'document_tool/document_delete_kor.php'; ?>'" type="button" class="btn btn-outline-secondary mx-1-6">자료삭제</button>
                        </div>
                    </div>

                    <div class="mt-1-9" style="text-align: center">
                        <p class="h1 m-1-6">영어 버전</p>
                        <div>                            
                            <button style="margin:1%" onclick="window.location.href='<?php echo 'eng/news_tool/news_insert_eng.php'; ?>'" type="button" class="btn btn-outline-secondary mx-1-6">News Insert</button>

                            <button style="margin:1%" onclick="window.location.href='<?php echo 'eng/news_tool/news_delete_eng.php'; ?>'" type="button" class="btn btn-outline-secondary mx-1-6">News Delete</button>

                            <button style="margin:1%" onclick="window.location.href='<?php echo 'eng/document_tool/document_insert_eng.php'; ?>'" type="button" class="btn btn-outline-secondary mx-1-6">References Insert</button>

                            <button style="margin:1%" onclick="window.location.href='<?php echo 'eng/document_tool/document_delete_eng.php'; ?>'" type="button" class="btn btn-outline-secondary mx-1-6">References Delete</button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>

        


      

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

    <!-- all js include end -->

</body>

</html>