<?php
    include "../js/function_db.php";
    session_start();
    if (isset($_FILES['uploaded_file'])) {
         $tmpname   = $_FILES['uploaded_file']['tmp_name'];
     
         $target_file = basename($_FILES["uploaded_file"]["name"]);
     
         $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      
         $filetrue = date("Ymd").GeraHash(10).'.'.$imageFileType;
         if(move_uploaded_file($tmpname,"../images_movie/".$filetrue)){
             $_SESSION["filetrue_movie"] = $filetrue;
         } else {
            $_SESSION["filetrue_movie"] = $_POST['img'];
         }
         exit;
     }
     if($_POST['satatus']==0){
        $sql = " UPDATE `movie` SET `movie_name_th` = '".$_POST['name_th']."', `movie_name_eng` = '".$_POST['name_eng']."', `audience` = '".$_POST['audience']."', `length_time` = '".$_POST['time']."', `movie_date` = '".$_POST['date']."', `deteil` = '".$_POST['deteil']."', `img` = '".$_SESSION['filetrue_movie']."' , `category_id` = '".$_POST['category']."' WHERE `movie`.`movie_id` = '".$_POST['id']."' ";
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