<?php
session_start();


// 세션 유효성 검사
if (!isset($_SESSION['access_granted']) || $_SESSION['access_granted'] !== true) {
    echo "<script>
        alert('Session expired or invalid access. Please go back to the button page.');
        window.location.href = '../admin_tools.php';
        </script>";
    exit;
}

// 세션 만료 시간 설정 (10분)
$session_lifetime = 10 * 60;  // 10분 (초 단위)

// 세션 설정
if (!isset($_SESSION['start_time'])) {
    $_SESSION['start_time'] = time();  // 세션 시작 시간 설정
}

$remaining_time = $session_lifetime - (time() - $_SESSION['start_time']);  // 남은 시간 계산

// 세션 만료 여부 확인
if ($remaining_time <= 0) {
    echo "<script>
        alert('Session expired. Please go back to the button page.');
        window.location.href = '../admin_tools.php';
        </script>";
    exit;
}
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

    <script>
       // PHP에서 계산된 남은 시간을 JavaScript로 전달
       let remainingTime = <?= $remaining_time ?>;  // 남은 시간 (초 단위)

        // 남은 시간을 실시간으로 표시하는 함수
        function updateTimer() {
            if (remainingTime <= 0) {
                alert('Session expired. Please go back to the button page.');
                window.location.href = '../admin_tools.php';
                return;
            }

            // 남은 시간 계산 (분:초 형식으로 표시)
            let minutes = Math.floor(remainingTime / 60);
            let seconds = remainingTime % 60;
            document.getElementById('time-remaining').textContent = `${minutes}분 ${seconds}초`;

            remainingTime--;  // 1초 감소
        }

        // 1초마다 updateTimer 함수 호출
        setInterval(updateTimer, 1000);
        updateTimer();  // 페이지 로드 시 즉시 호출
    </script>

    
    <style>
        body {
            height: 100%;
        }
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
            max-height: 200px; /* 최대 높이 설정 */
            overflow-y: auto; /* 스크롤 가능하게 */
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
        <section style="overflow: inherit" class="py-0">
            <p style="margin: 0 !important;">세션 만료까지 남은 시간: <span id="time-remaining"></span></p>
            <p id="warning" style="display: none; color: red;">세션이 곧 만료됩니다.</p>
            <div class="container-fluid p-0">
                <div class=" g-0 middle" >
                    <div class="col-lg-10">
                        <div class="py-1-9 py-sm-7 px-1-9 px-sm-6 px-xl-8 px-xxl-12">
                            <div class="section-title mb-1-9 mb-sm-5">
                                <span>삭제</span>
                                <h2 class="mb-0">자료실 삭제</h2>
                            </div>
                            <form id="articleForm" class="quform" action="delete_to_json.php" method="post" enctype="multipart/form-data">
                                <div class="quform-elements">
                                    <div class="row">
                                        <!-- Begin Text input element -->
                                        <div class="col-md-12">
                                            <div class="quform-element form-group">
                                                <label for="name">제목<span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control" id="title" type="text" name="title" placeholder="" readonly/>
                                                    <div id="autocomplete-list" class="autocomplete-items">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->  
                                         
                                        <!-- Submit 버튼 -->
                                        <div class="col-md-12">
                                            <div class="quform-submit-inner">
                                                <button id="save" class="butn md border-0" type="submit" onclick="return confirmDelete();"><span>삭제</span></button>
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
        function confirmDelete() {
            return confirm("정말 삭제하시겠습니까?");
        }

        document.getElementById("articleForm").addEventListener("submit", function(event) {
            const title = document.getElementById('title').value.trim();

            // 검증할 필드가 비어있는지 확인
            if(!title) {
                alert("제목을 선택해주세요");
                event.preventDefault(); // 폼 제출 중단
            }
        });

        // JSON 파일에서 데이터를 가져옴
        fetch('get_titles.php') // JSON 파일 경로를 설정하세요
        .then(response => response.json())
        .then(data => {
            const titles = [];

            // 각 객체에서 title 및 date 값을 추출하여 titles 배열에 저장
            data.forEach(item => {
                titles.push({
                    title: item.title,
                    date: item.date
                });
            });

            console.log(titles);

            // 입력창 클릭 시 자동완성 항목 표시
            document.getElementById("title").addEventListener("focus", function() {
                showAutocompleteItems();
            });

            function showAutocompleteItems() {
                const autocompleteList = document.getElementById("autocomplete-list");
                autocompleteList.innerHTML = ""; // 기존 항목 초기화

                // 자동완성 항목 생성
                titles.forEach(itemData => {
                    const item = document.createElement("div");
                    item.classList.add("autocomplete-item");
                    item.innerHTML = `<strong>${itemData.title}</strong><br><small>${itemData.date}</small>`;
                    item.addEventListener("click", function() {
                        document.getElementById("title").value = itemData.title;
                        autocompleteList.innerHTML = ""; // 항목 선택 후 리스트 초기화
                    });
                    autocompleteList.appendChild(item);
                });
            }

            // 입력창 이외의 곳을 클릭했을 때 자동완성 항목 숨기기
            document.addEventListener("click", function(e) {
                if (!e.target.matches('#title')) {
                    document.getElementById("autocomplete-list").innerHTML = "";
                }
            });
        })
        .catch(error => {
            console.error('Error fetching the JSON file:', error);
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