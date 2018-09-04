<?php 
    include('../js/function_db.php');
    $sql = "DELETE FROM tickets WHERE tickets_id = '".$_POST['id']."' ";
    $rs = in_up_delSql($sql);
    echo "ok";
?>