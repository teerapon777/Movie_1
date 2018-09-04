<?php
    session_start();
    unset($_SESSION['num']);
    unset($_SESSION['row']);
    unset($_SESSION['price']);
    include ('../js/function_db.php');
    $sql_movie = " SELECT cinema_movie.id,movie.movie_name_th,movie.img,cinema_movie.date_show,cinema_movie.time_show,cinema.cinema_name,branch.branch_name,cinema_movie.theater,projection_system.projection_id,projection_system.projection_name FROM `cinema_movie` LEFT JOIN movie ON movie.movie_id = cinema_movie.movie_id LEFT JOIN cinema ON cinema.cinema_id = cinema_movie.cinema_id LEFT JOIN branch ON branch.branch_id = cinema.branch_id LEFT JOIN projection_system ON projection_system.projection_id = cinema_movie.projection_id WHERE cinema_movie.id = '".$_POST['id']."' ";
    $rs_movie = selectSql($sql_movie);
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
                        <p>
                        <label for="email"><?php echo $row_movie['movie_name_th']?></label><br>
                        <label for="email">วันที่ <?php echo $row_movie['date_show']?> | รอบ <?php echo $row_movie['time_show']?></label><br>
                        <label  for="email"><?php echo $row_movie['cinema_name']." ".$row_movie['branch_name'] ?></label><br>
                        <label  for="email"> โรงภาพยนต์  <?php echo $row_movie['theater']?> | ระบบฉาย <?php echo $row_movie['projection_name']?></label><br>
                        <input id="id_movie_seat" type="hidden" value="<?php echo $row_movie['id'] ?>">    
                    </p>
                    </td>
                </tr>
            </table>
            <div class="row text-center">
                <div class="col-sm-10">
                    <div class="col-sm-4">
                        <img src="img/Deluxe.png" width="120" height="80" class="img-rounded" ><br>
                        <label for="email">Deluxe 
                        <?php
                            if($row_movie['projection_id'] == 1)
                            { 
                                echo "180";  
                            }
                            else if($row_movie['projection_id']==2)
                            { 
                                echo "210";  
                            }
                        ?> บาท</label>
                    </div>
                    <div class="col-sm-4">
                        <img src="img/Premium.png" width="120" height="80" class="img-rounded" ><br>
                        <label for="email">Premium <?php
                            if($row_movie['projection_id'] == 1)
                            { 
                                echo "200";  
                            }
                            else if($row_movie['projection_id']==2)
                            { 
                                echo "230";  
                            }
                        ?> บาท</label>
                    </div>
                    <div class="col-sm-4">
                        <img src="img/SofaSweet.png" width="150" height="100" class="img-rounded" ><br>
                        <label for="email">Sofa Sweet (Pair) <?php
                            if($row_movie['projection_id'] == 1)
                            { 
                                echo "500";  
                            }
                            else if($row_movie['projection_id']==2)
                            { 
                                echo "550";  
                            }
                        ?> บาท</label>
                    </div>
                </div>
            </div>
            <div  class="row">
            <div id="a_seat"  class="col-sm-10">
            </div>
            <div class="col-sm-2">
                <br><br><br><br><br><br><br><br><br><br><br><br><br>
                <label for="email"><?php echo $row_movie['movie_name_th']?></label><br>
                <label for="email">วันที่ <?php echo $row_movie['date_show']?></label><br>
                <label for="email">รอบ <?php echo $row_movie['time_show']?></label><br>
                <label  for="email"> โรงภาพยนต์  <?php echo $row_movie['theater']?></label><br>
                <label  for="email"> ระบบฉาย <?php echo $row_movie['projection_name']?></label><br>
                <br><br><br><br>
                <div id="reservations" >

                </div>
            </div> 
            </div>
        </div>
  <?php
    }
?>
<script type="text/javascript">
$("#a_seat").load("systems/a_seat.php",
{ 
    id : $("#id_movie_seat").val() 
},function(msg){ $("#a_seat").html(msg); }); 
$("#reservations").load("systems/movie_reservations.php");

</script>