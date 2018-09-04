<?php
    include "../js/function_db.php";
    session_start();
    if (isset($_FILES['uploaded_file'])) {
         $tmpname   = $_FILES['uploaded_file']['tmp_name'];
     
         $target_file = basename($_FILES["uploaded_file"]["name"]);
     
         $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      
         $filetrue = date("Ymd").GeraHash(10).'.'.$imageFileType;
         if(move_uploaded_file($tmpname,"../images_movie/".$filetrue)){
             $_SESSION["filetrue"] = $filetrue;
         } else {
             echo 'no';
         }
         exit;
     }
     if($_POST['satatus']==0){
        $sql_movie = "INSERT INTO `movie` (`movie_id`, `movie_name_th`, `movie_name_eng`, `audience`, `length_time`, `movie_date`, `deteil`, `img`, `category_id`) VALUES (NULL, '".$_POST['name_th']."', '".$_POST['name_eng']."', '".$_POST['audience']."', '".$_POST['time']."', '".$_POST['date']."', '".$_POST['deteil']."', '".$_SESSION['filetrue']."', '".$_POST['category']."') ";
        $rs = in_up_delSql($sql_movie);
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