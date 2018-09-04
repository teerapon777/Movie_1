<?php 
    include('../js/function_db.php');
    $sql = "DELETE FROM tb_user WHERE user_id = '".$_POST['id']."' ";
    $rs = in_up_delSql($sql);
    echo "ok";
?>