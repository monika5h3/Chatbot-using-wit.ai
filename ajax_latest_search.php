<?php
require_once "database/config.php";
$qry_speech_value = mysqli_query($conn, "select * from speech where status='1'") or die(mysqli_error());
$num_rows = mysqli_num_rows($qry_speech_value);
if($num_rows>0){
	$qry_fetch=mysqli_fetch_object($qry_speech_value);
	$speech_value=$qry_fetch->search_val;
	mysqli_query($conn, "update speech set status='0' where test_ai_id='$qry_fetch->test_ai_id'");
	echo $speech_value;
}else{
	echo '';
}
?>