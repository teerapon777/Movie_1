<?php
session_start();
include ('../js/function_db.php');
?>
         

<?php
    
    if (!isset($_POST['status'])) {  $_POST['status']=0; }
    if($_POST['status']==1)
    {
        $sql = " SELECT * FROM movie WHERE movie_date <= NOW() ";
    }
    else if($_POST['status']==2)
    {
        $sql = " SELECT * FROM movie WHERE movie_date > NOW() ";
    }
    else if($_POST['status']==3)
    {
        $sql = " SELECT * FROM movie WHERE (movie_name_th LIKE '%".$_POST["id"]."%' or  movie_name_eng LIKE '%".$_POST["id"]."%' or  movie_date LIKE '%".$_POST["id"]."%' )";
    }
    else if($_POST['status']==4)
    {
        $sql = " SELECT movie.movie_id,movie.movie_name_th,movie.movie_name_eng,movie.audience,movie.length_time,movie.movie_date,movie.img FROM `cinema_movie` LEFT JOIN movie ON cinema_movie.movie_id = movie.movie_id WHERE cinema_movie.cinema_id = '".$_POST['txt']."' ";
    }
    else
    {
        $sql = " SELECT * FROM movie ";
    }
    
    $rs = selectSql($sql);
    foreach ($rs as $row)
    {?>
    
        <div class="col-sm-4">
            <br>
            <button id="deteil_show" name="<?php echo $row['movie_id']; ?>" class="btn btn-default"><img src="<?php echo "images_movie/".$row['img']; ?>" width="150" height="200" class="img-rounded" alt="Cinque Terre" title="<?php echo $row['img']; ?>"></button>
            <p><?php echo "วันเข้าฉาย : ".$row['movie_date']; ?></p>
            <p><?php echo "เรทผู้ชม : ".$row['audience']." / ความยาว : ".$row['length_time']." นาที"; ?></p>
            <p><B><font size="2.5"><?php echo $row['movie_name_th']; ?> </B></font></p>
            <p><B><font size="2.5"><?php echo $row['movie_name_eng']; ?> </B></font></p>
            
        </div>  
    <?php }
    ?>
<script type="text/javascript"> 
    
    $("*[id^=deteil_show]").click(function()
    {
        var id = $(this).attr('name');
        //alert(id);
        $("#showmain").load("systems/movie_deteil.php",{ id : id });
    });

</script>
