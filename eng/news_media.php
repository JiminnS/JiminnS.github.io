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
        <?php include 'header.html' ?>

        <!-- PAGETITLE
        ================================================== -->
        <section class="page-title-section bg-img cover-background top-position left-overlay-dark me-xl-10" data-overlay-dark="9" data-background="../img/necpower/main_slide03.png">
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
                    <li><a href="#!">NEC in the press</a></li>
                </ul>
            </div>
        </section>

        <!-- BLOG GRID
        ================================================== -->
        <section>
            <div class="container">
                <div class="row mt-n1-9">
                    <div class="col-lg-8 mt-1-9">
                        <div>
                            <div class="row mt-n1-9 card-content" style="display:none">
                            <?php
                            // 데이터베이스 연결 설정
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

                            // SQL 쿼리: 특정 카테고리('아세안 소식')의 기사만 가져오기
                            $sql = "SELECT * FROM news_eng WHERE category = 'NEC in the press' ORDER BY idx DESC";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                // 기사 목록 반복문
                                while ($article = mysqli_fetch_assoc($result)) {
                                    echo '<div class="card1 col-lg-12 mt-1-9">';
                                    echo '    <article class="card card-style3 border-0 border-radius-10 box-shadow overflow-hidden">';
                                    echo '        <div class="py-1-9 px-1-9 px-xl-2-9">';
                                    echo '            <ul class="list-unstyled mb-2 ps-0">';
                                    echo '                <li class="d-inline-block display-30 me-4"><i class="ti-calendar text-primary pe-2"></i>' . $article['date'] . '</li>';
                                    echo '            </ul>';
                                    echo '            <h3 class="lh-base mb-3 no-letter-spacing" style="width: 95%;"><a href="' . $article['link'] . '">' . $article['title'] . '</a></h3>';
                                    echo '            <a href="' . $article['link'] . '" class="text-primary">More</a>';
                                    echo '        </div>';
                                    echo '        <div class="card-body p-0 position-relative overflow-hidden news" style="text-align: center;">';
                                    echo '            <img src="' . $article['head_img'] . '" alt="..." class="blog-img">';
                                    echo '            <span class="blog-tag"><a href="' . $article['category_link'] . '">' . $article['category'] . '</a></span>';
                                    echo '        </div>';
                                    echo '    </article>';
                                    echo '</div>';
                                }
                            } else {
                                echo 'No articles found.';
                                echo '<style>.pagination { display: none; }</style>';
                            }

                            // 데이터베이스 연결 종료
                                mysqli_close($conn);
                            ?>
                                
                                <?php include 'pagination_bar.html' ?>
                
                            </div>
                        </div>
                    </div>
                    <?php include 'right_menu.html' ?>

                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
                    
                    
                
        

        <!-- FOOTER
        ================================================== -->
        <?php include 'footer.html' ?>

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