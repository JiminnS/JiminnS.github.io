<?php
include $_SERVER['DOCUMENT_ROOT']."/necpower/db.php";
$rno = $_POST['rno']; 
$sql = query("select * from reply where idx='".$rno."'");//reply테이블에서 idx가 rno변수에 저장된 값을 찾음
$reply = $sql->fetch_array();

$bno = $_POST['b_no'];
$sql2 = query("select * from board where idx='".$bno."'");//board테이블에서 idx가 bno변수에 저장된 값을 찾음
$board = $sql2->fetch_array();

$sql3 = query("select * from member where idx='1'");//board테이블에서 idx가 bno변수에 저장된 값을 찾음
$member = $sql3->fetch_array();

$pwk = $member['pw'];
$bpw = $reply['pw'];

if(password_verify($pwk, $bpw)) 
	{
		$sql = query("delete from reply where idx='".$rno."'"); ?>
	<script type="text/javascript">alert('댓글이 삭제되었습니다.'); location.replace("/necpower/community/read.php?idx=<?php echo $board["idx"]; ?>");</script>
	<?php 
	}else{ ?>
		<script type="text/javascript">alert('비밀번호가 틀립니다');history.back();</script>
	<?php } ?>