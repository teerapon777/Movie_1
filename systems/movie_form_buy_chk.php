<?php
    session_start();
    include ('../js/function_db.php');
    if($_POST['id'] != null)
    {
        foreach($_SESSION['num'] as $row => $value){
            //echo $_SESSION['row'][$row].$value." ";
            if($row !=0 )
            {
                $sql = " INSERT INTO `tickets` (`tickets_id`, `around_id`, `t_row`, `num`, `price`, `email`, `phone`, `status`) VALUES (NULL, '".$_POST['id']."', '".$_SESSION['row'][$row]."', '".$value."', '".$_SESSION['price'][$row]."', '".$_POST['email']."', '".$_POST['phone']."', '1'); ";
                $rs = in_up_delSql($sql);
            }
            
        }
        echo "ok";
    }
    else{
        echo "no";
    }
?>