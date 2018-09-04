<?php 
    include('../js/function_db.php');
    $sql = "DELETE FROM cinema_movie WHERE id = '".$_POST['id']."' ";
    $rs = in_up_delSql($sql);
    echo "ok";
?>