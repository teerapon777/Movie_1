<?php
session_start();
include ('../js/function_db.php');
        $sql = " INSERT INTO `cinema` (`cinema_id`, `cinema_name`, `branch_id`, `tel`) VALUES (NULL, '".$_POST['name']."', '".$_POST['branch']."','".$_POST['tel']."') ";
        $rs = in_up_delSql($sql);
        echo "ok";
?>