<?php
    include "../js/function_db.php";
    session_start();
    if (isset($_FILES['uploaded_file'])) {
         $tmpname   = $_FILES['uploaded_file']['tmp_name'];
     
         $target_file = basename($_FILES["uploaded_file"]["name"]);
     
         $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      
         $filetrue = date("Ymd").GeraHash(10).'.'.$imageFileType;
         if(move_uploaded_file($tmpname,"../images_user/".$filetrue)){
             $_SESSION["user_img"] = $filetrue;
         } else {
             echo 'no';
         }
         exit;
     }
     if($_POST['satatus']==0){
        $sql_chk = " SELECT * FROM tb_user WHERE email = '".$_POST['email']."' ";
        $rs_chk = selectSql($sql_chk);
        if($rs_chk == null)
        {
            $sql = " INSERT INTO `tb_user` (`user_id`, `email`, `password`, `initial_id`, `firstname`, `lastname`, `gender_id`,`phone`, `image`, `status_id`) VALUES (NULL, '".$_POST['email']."', '".$_POST['password']."',".$_POST['initial'].", '".$_POST['firstname']."', '".$_POST['lastname']."', '".$_POST['gender']."', '".$_POST['user_phone']."' ,'".$_SESSION['user_img']."', '".$_POST['status_user']."') ";
            $rs = in_up_delSql($sql);
            echo "ok";
        }
        else{
            echo "E-mail นี้มีผู้ใช้งานเเล้ว";
        }
        
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