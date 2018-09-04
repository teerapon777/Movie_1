<?php
    session_start();
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
                        <input id="id_movie_round" type="hidden" value="<?php echo $row_movie['id']?>">
                        <label for="email"><?php echo $row_movie['movie_name_th']?></label><br>
                        <label for="email">วันที่ <?php echo $row_movie['date_show']?> | รอบ <?php echo $row_movie['time_show']?></label><br>
                        <label  for="email"><?php echo $row_movie['cinema_name']." ".$row_movie['branch_name'] ?></label><br>
                        <label  for="email"> โรงภาพยนต์  <?php echo $row_movie['theater']?> | ระบบฉาย <?php echo $row_movie['projection_name']?></label><br>

                        
                        <label for="email">ที่นั่งที่เลื่อก<br>
                         <?php foreach($_SESSION['num'] as $row => $value)
                        {
                            echo $_SESSION['row'][$row].$value." ";
        
                        }
                        //print_r($_SESSION['str']);
                        ?> </label>&nbsp;&nbsp;&nbsp;&nbsp;
                        <label for="email">ราคา<br>
                        <?php foreach($_SESSION['price'] as $row => $value)
                        {
                            $price = $price + $_SESSION['price'][$row];
                        }
                        echo $price." "." บาท";
                        ?> </label>
                    </p>
                    </td>
                    
                </tr>
            </table>
            <div class="row text-center" >
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="btn-group">
                        <button id="btn_buy" type="button" class="btn btn-info">ซื่อตั๋วชมภาพยนต์</button>
                        <button id="btn_book" type="button" class="btn btn-info">จองตั๋วชมภาพยนต์</button>
                    </div>
                    <div align="center">
                        <table color="red" border="1"  width="600" align="center">
                            <tr>
                                <td>
                                    <div id="show_form">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
            <div  class="row">
                <div id="a_seat"  class="col-sm-10">

                </div>
                <div class="col-sm-2">
                
                </div> 
            </div>
        </div>
  <?php
    }
?>
<br>
<br>
<br>
<br>
<br>
<script type="text/javascript">
$(function(){
    $("#show_form").load("systems/movie_form_buy.php",{ id : $("#id_movie_round").val()} ); 
});

$("#btn_buy").click(function()
{
    $("#show_form").load("systems/movie_form_buy.php", { id : $("#id_movie_round").val() } )
});
$("#btn_book").click(function()
{
    $("#show_form").load("systems/movie_form_book.php",{ id : $("#id_movie_round").val() })
});

</script>