<?php
require_once "config.php";
function queryresult($conn, $qry, $value){
  $data=mysqli_query($conn, $qry)or die(mysqli_error());
  $count_group_res = mysqli_fetch_object($data);
  return $count_group_res->$value;

}
?>