<?php

include_once('lib/dbcon_JS_LOVE.php');

$idx = isset($_GET['idx']) ? $_GET['idx'] : null;


$sql	 = "select count from main_cryptology where count_cryptology ='".$count_cryptology."';";
$res	=  mysqli_query($real_sock,$sql) or die(mysqli_error($real_sock));
$info	 = mysqli_fetch_array($res);
$insert_sql	 = "	DELETE FROM  save_crypotology where idx=".$idx.";		


;";
$insert_res	=  mysqli_query($real_sock,$insert_sql) or die(mysqli_error($real_sock));

	
echo "<script>
alert('삭제되었습니다.');
parent.location.replace('/JS_LOVE/setting.php');
</script> ";

?>	