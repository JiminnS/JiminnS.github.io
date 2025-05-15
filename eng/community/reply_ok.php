<?php
	include $_SERVER['DOCUMENT_ROOT']."/necpower/db.php";

    $bno = $_GET['idx'];
    
    if($bno && $_POST['dat_user'] && $_POST['content']){
        $sql = query("insert into reply(con_num,name,pw,content) values('".$bno."','".$_POST['dat_user']."','".$userpw."','".$_POST['content']."')");
        echo "<script>alert('댓글이 작성되었습니다.'); 
        location.href='/necpower/read.php?idx=$bno';</script>";
    }else{
        echo "<script>alert('댓글 작성에 실패했습니다.'); 
        history.back();</script>";
    }
?>