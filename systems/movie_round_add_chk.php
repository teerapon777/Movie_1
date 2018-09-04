<?php
session_start();
include ('../js/function_db.php');
$sql = "INSERT INTO `cinema_movie` (`id`, `cinema_id`, `movie_id`, `date_show`, `time_show`, `theater`, `projection_id`) VALUES (NULL, '".$_POST['cinema']."', '".$_POST['movie']."', '".$_POST['date']."', '".$_POST['time']."', '".$_POST['theater']."', '".$_POST['projection']."');";
$rs = in_up_delSql($sql);
echo "ok";
?>