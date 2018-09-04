<?php
session_start();
include ('../js/function_db.php');

$sql = " INSERT INTO `branch` (`branch_id`, `branch_name`) VALUES (NULL, '".$_POST['name']."') ";
$rs = in_up_delSql($sql);
echo "ok";
?>