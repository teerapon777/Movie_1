<?php
    session_start();
    date_default_timezone_set("Asia/Bangkok");
    include ('../js/function_db.php');
    $sql_movie = " SELECT movie.movie_id,movie.movie_name_th,movie.movie_name_eng,movie.audience,movie.length_time,movie.movie_date,movie.deteil,movie.img,category.category_name FROM `movie` LEFT JOIN category ON movie.category_id = category.category_id WHERE movie.movie_id =  '".$_POST['movie']."' ";
    $rs_movie = selectSql($sql_movie);
    $time = date("H:i:s");
    foreach ($rs_movie as $row_movie)
    {
        ?>
        <hr>
        <div class="container ">      
            <table class="table table-striped "> 
                <tr height="200">
                    <td class="text-center">
                        <img src="<?php echo "images_movie/".$row_movie['img']; ?>" width="230" height="300" class="img-rounded" alt="Cinque Terre" title="<?php echo $row_movie['img']; ?>">
                    </td>
                    <td class="text-left">
                        <br><br><br>
                        <h2>
                        <label for="email"><?php echo $row_movie['movie_name_th']?></label><br>
                        <label for="email">หมวดหมู่ : <?php echo $row_movie['category_name']?></label><br>
                        <label for="email">เรทผู้ชม : <?php echo $row_movie['audience']?></label><br>
                        <label class="glyphicon glyphicon-time" for="email">  <?php echo $row_movie['length_time']?>  นาที</label><br>
                        </h2>
                    </td>
                </tr>
            </table>
            <?php
                $sql_projection = " SELECT * FROM `projection_system` ";
                $rs_projectio = selectSql($sql_projection);
                foreach ($rs_projectio as $row_projectio)
                { ?>
                    <table class="table table-striped" >
                <tr valign="middle">
                    <td width="300" class="text-center" >
                    <label for="email">รอบฉาย : ระบบ <?php echo $row_projectio['projection_name']?></label><br>
                    </td>
                    <td class="text-left">
               <?php 
                   $sql_round = " SELECT * FROM `cinema_movie` WHERE movie_id = '".$_POST['movie']."' AND cinema_id = '".$_POST['cinema']."' AND projection_id = '".$row_projectio['projection_id']."' AND date_show = curdate() ORDER BY time_show";
                   $rs_round = selectSql($sql_round);
                   if($rs_round != null)
                   {
                    foreach ($rs_round as $row_round)
                   
                    { 
                        if($row_round['time_show'] < $time)
                        {
                            ?>
                            <button id="btn_tickets" name="<?php echo $row_round['id']; ?>" type="button" class="btn btn-info" disabled ><?php echo $row_round['time_show']?></button>
                            <?php
                        }
                        else{
                            ?>
                            <button id="btn_tickets" name="<?php echo $row_round['id']; ?>" type="button" class="btn btn-info" ><?php echo $row_round['time_show']?></button>
                            <?php
                        }
                    }

                   }
                   else{
                       echo "ไม่มีรอบฉาย";
                   }
                   
               ?>
                    </td>
                </tr>
            </table>
                <?php }
            ?>
        </div>
  <?php
    }
?>
<script type="text/javascript">
$("*[id^=btn_tickets]").click(function()
  {
    var id = $(this).attr('name');
    //alert(id);
    $("#show").load("systems/movie_seat.php",{ id : id });
    });

</script>