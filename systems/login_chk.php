<?php
include ("../js/function_db.php");
session_start();
$sql = "SELECT * FROM tb_user WHERE email = '".$_POST['user']."' AND password = '".$_POST['pass']."' ";
$rs = selectSql($sql);
if ($rs != null){
  foreach($rs as $row)
  {
    if (!isset($_SESSION["ssUserfname"])){
        $_SESSION["ssUserfname"] = $row['firstname'];
        $_SESSION["ssUserlname"] = $row['lastname'];
        $_SESSION["ssUserstatus"] = $row['status_id'];
        $_SESSION["ssUsersimg"] = $row['image'];
        $_SESSION["ssUser_id"] = $row['user_id'];
        $_SESSION["ssEmail"] = $row['email'];
        $_SESSION["ssPhone"] = $row['phone'];
      }
         echo 'ok';
  }
} else {
  session_destroy();
  echo 'no';
}
?>
