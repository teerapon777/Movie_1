<?php
    include "../js/function_db.php";
    session_start();
    if (isset($_FILES['uploaded_file'])) {
         $tmpname   = $_FILES['uploaded_file']['tmp_name'];
     
         $target_file = basename($_FILES["uploaded_file"]["name"]);
     
         $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      
         $filetrue = date("Ymd").GeraHash(10).'.'.$imageFileType;
         if(move_uploaded_file($tmpname,"../images_user/".$filetrue)){
             $_SESSION["filetrue_user_img"] = $filetrue;
         } 
         else {
            
            $_SESSION["filetrue_user_img"] = $_POST['img'];
         }
         exit;
     }
     
     if($_POST['satatus']==0){
        if($_SESSION["ssUserstatus"]==2)
        {
            $sql = " UPDATE `tb_user` SET `password` = '".$_POST['password']."' , `initial_id` = '".$_POST['initial']."' , `firstname` = '".$_POST['firstname']."', `lastname` = '".$_POST['lastname']."', `gender_id` = '".$_POST['gender']."' , `image` = '".$_SESSION["filetrue_user_img"]."', `phone` = '".$_POST['phone']."',`status_id` = '".$_POST['status']."'  WHERE tb_user.user_id = '".$_POST['id']."'  ";
        }
        else{
            $sql = " UPDATE `tb_user` SET `password` = '".$_POST['password']."' , `initial_id` = '".$_POST['initial']."' , `firstname` = '".$_POST['firstname']."', `lastname` = '".$_POST['lastname']."', `gender_id` = '".$_POST['gender']."' , `image` = '".$_SESSION["filetrue_user_img"]."', `phone` = '".$_POST['phone']."'  WHERE tb_user.user_id = '".$_POST['id']."'  ";
        
        }
        $rs = in_up_delSql($sql);
        echo "ok";      
     }

    function GeraHash($qtd){
        //Under the string $Caracteres you write all the characters you want to be used to randomly generate the code.
        $Caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $QuantidadeCaracteres = strlen($Caracteres);
        $QuantidadeCaracteres--;
        $Hash=NULL;
            for($x=1;$x<=$qtd;$x++){
                $Posicao = rand(0,$QuantidadeCaracteres);
                $Hash .= substr($Caracteres,$Posicao,1);
            }
        return $Hash;
        }
?>