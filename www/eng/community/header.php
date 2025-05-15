
<!--  designer : E.Cho  -->
<!DOCTYPE html>

<html lang="en">
<head> 
    <link rel="icon" type="image/png" sizes="16x16" href="imgs/favicon.ico">
    <title>(주)엔이씨파워</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/common.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>


<body>
<div class="header" id="myHeader">
    <div class="navbar">
        <div class="subnav_logo" id="logo" >
            <a href="/necpower/index.php"><img src="../imgs/onlylogo.png"style="height:40px"></a>
        </div>
    
        <!-- <a href="index.php" style="font-size:19px">Home</a> -->
        <div class="subnav">
            <ul class="subnav_all">
                <li class="subnav_element">
                    <a href="/necpower/inform.php" class="subnavbtn"> 회사 소개</a>
                    <ul class="subnav-content">
                        <li><a href="/necpower/inform.php">회사소개</a></li>
                        <li><a href="/necpower/history.php">연혁</a> </li>
                        <li><a href="/necpower/location.php">찾아오시는길</a></li>
                    </ul>
                </li>
                <li class="subnav_element">
                    <a href="/necpower/collection.php" class="subnavbtn" >사업분야</a>
                    <ul class="subnav-content">
                        <li><a href="/necpower/collection.php?page=collection_content"> 스마트 수거 시스템</a></li>
                        <li><a href="/necpower/srf.php?page=srf_content">환경플랜트 EPC / O&M</a></li>
                        <li><a href="/necpower/ict.php?page=ict_content">환경 IT 솔루션</a></li>
                        <li><a href="/necpower/consulting.php?page=consulting_content">스마트 환경컨설팅</a></li>
                        <li><a href="/necpower/recycle.php?page=recycle_content">폐자원에너지화사업</a></li>
                        <!-- <a href="sfa.php">수냉화격자 소각(SRF)발전시스템</a> -->
                    </ul>
                </li>
                <li class="subnav_element">
                    <a href="/necpower/rnd.php" class="subnavbtn" >기술 개발</a>
                    <ul class="subnav-content">
                        <li><a href="rnd.php">개발기술</a></li>
                        <li><a href="rnd.php">연구과제</a></li>
                        <li><a href="patent.php">특허/인증</a></li>
                    </ul>
                </li>
                <li class="subnav_element">
                    <a href="/necpower/news.php" class="subnavbtn">홍보센터</a>
                    <ul class="subnav-content">
                        <li><a href="/necpower/news.php">최신뉴스</a></li>
                        <li><a href="/necpower/library.php">자료실</a></li>
                        <li><a href="/necpower/community/community.php">게시판</a></li>
                    </ul>
                </li>
            </ul>
    
        
<!--        <a href="#contact">Contact</a>-->
    </div>
        <div class="language">
          <a href="/"> &nbsp; KR</a>
          <a href="/eng">&nbsp; EN</a>
        </div>
    </div>
</div>



<!--  nav scroll  -->
<script>
    window.onscroll = function() {
        myFunction()
    };

    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;

    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }

</script>
</body>
</html>
