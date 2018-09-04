<?php 
    include('../js/function_db.php');
    $sql = "DELETE FROM movie WHERE movie_id = '".$_POST['id']."' ";
    $rs = in_up_delSql($sql);
    echo "ok";
?>