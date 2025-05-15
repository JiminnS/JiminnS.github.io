<?php
	include $_SERVER['DOCUMENT_ROOT']."/necpower/db.php";
	
	$bno = $_GET['idx'];
    echo "<script>console.log('게시물 번호: ".$bno."');</script>"; // 디버깅을 위한 메시지 출력
	$sql = query("delete from board where idx='$bno';");
?>
<script type="text/javascript">alert("삭제되었습니다.");</script>
<meta http-equiv="refresh" content="0 url=/necpower/community/community_admin.php" />