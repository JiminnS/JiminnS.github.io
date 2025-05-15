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
                        <h1 class="text-animation text-center text-sm-start" data-in-effect="fadeInUp">Reference room</h1>
                    </div>
                </div>
            </div>
            <div class="sub-sm-title">
                <ul class="wow fadeInUp" data-wow-delay="400ms">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#!">PR CENTER</a></li>
                    <li><a href="#!">Reference room</a></li>
                </ul>
            </div>
        </section>

        <!-- LIBRARY
        ================================================== -->
        <section class="portfolio-details">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="position-relative overflow-hidden border-radius-10 technique">
                            <!-- <img src="img/necpower/[크기변환]ict_rnd.png" alt="..." class="border-radius-10 image-hover"> -->
                            <div class="porject-box bottom-0 end-0 w-100">
                                <div class="row justify-content-end">
                                    <div class="col-lg-10">
                                        <!-- <div class="bg-primary px-1-6 px-sm-5 py-1-6 porject-data">
                                            <div class="row mt-n4">
                                                <div class="col-sm-6 col-lg-3 mt-4">
                                                    <div>
                                                        <h3 class="h5 text-white">Client:</h3>
                                                        <p class="mb-0 text-white font-weight-600">Mark Woodard</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-lg-3 mt-4">
                                                    <div>
                                                        <h3 class="h5 text-white">Project Value:</h3>
                                                        <p class="mb-0 text-white font-weight-600">$580</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-lg-3 mt-4">
                                                    <div>
                                                        <h3 class="h5 text-white">Date:</h3>
                                                        <p class="mb-0 text-white font-weight-600">Nov 20, 2022</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-lg-3 mt-4">
                                                    <div>
                                                        <h3 class="h5 text-white">Category:</h3>
                                                        <p class="mb-0 text-white font-weight-600">Forest</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="mt-1-9 mb-1-6" style="margin-top: 5%;">
                            <h3 class="mb-1-7 display-xl-15">Reference room</h3>
                            <h3 class="display-28 display-xl-25 mb-xl-3 font-weight-200" style="text-align: justify; line-height: 160%;">
                                
                            </h3>
                        </div>


                        <div class="row position-relative z-index-9 mt-n1-9 mb-1-9" style="padding-top: 5%;">
                            
                            <table class="table"  style="text-align:center">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col" style="width: 60%">Title</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Attach</th>
                                    </tr>
                                </thead>
                                <tbody>

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

                                        // 데이터베이스에서 기사 가져오기
                                        $sql = "SELECT * FROM document_eng ORDER BY idx DESC";  // 최신 기사를 먼저 가져오기 위해 id 기준으로 내림차순 정렬
                                        $result = mysqli_query($conn, $sql);

                                        // 기사 목록 반복문
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($document = mysqli_fetch_assoc($result)) {
                                                echo '<tr>';
                                                echo    '<th scope="row" style="vertical-align: middle">' . $document['num'] . '</th>';
                                                echo    '<td style="vertical-align: middle"><a href="' . $document['docuroute'] . '" download>' . $document['title'] . '</a></td>';
                                                echo    '<td style="vertical-align: middle">' . $document['date'] . '</td>';
                                                echo    '<td style="vertical-align: middle"><i class="ti-clip text-primary pe-2"></i></td>';
                                                echo    '</tr>';
                                            }
                                        } else {
                                            echo "No document found.";
                                        }

                                        // MySQL 연결 종료
                                        mysqli_close($conn);
                                    ?>
                                 

                                </tbody>
                            </table>
                                
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

    <!-- all js include end -->

</body>

</html>