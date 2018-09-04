<?php
 session_start();
 include ('../js/function_db.php');
?>

<?php
    if(($_POST['status']==1)&&($_POST["id"]!=null))
    {
        $sql = " SELECT DISTINCT tickets.around_id,movie.movie_name_th,cinema_movie.date_show,cinema_movie.time_show FROM `tickets` 
        LEFT JOIN cinema_movie ON cinema_movie.id = tickets.around_id 
        LEFT JOIN movie ON movie.movie_id = cinema_movie.movie_id WHERE ( email = '".$_SESSION["ssEmail"]."' and movie.movie_name_th LIKE '%".$_POST["id"]."%' or cinema_movie.date_show LIKE '%".$_POST["id"]."%'  ) ";
    }
    else{
        $sql = " SELECT DISTINCT tickets.around_id,movie.movie_name_th,cinema_movie.date_show,cinema_movie.time_show FROM `tickets` 
        LEFT JOIN cinema_movie ON cinema_movie.id = tickets.around_id 
        LEFT JOIN movie ON movie.movie_id = cinema_movie.movie_id WHERE email = '".$_SESSION["ssEmail"]."' ";
    }
    
    $rs = selectSql($sql);
    ?>
        <div class="container ">      
            <table class="table table-striped text-left"> 
                <thead>
                    <tr>
                        <th>ภาพยนต์</th>
                        <th>วันที่</th>
                        <th>รอบ</th>
                        <th>สถานะ</th>
                    </tr>
                </thead> 
    <?php
    foreach ($rs as $row)
    {?> 
        <tbody >
            <tr>
                <td><?php echo $row['movie_name_th']?></td>
                <td><?php echo $row['date_show']?></td>
                <td><?php echo $row['time_show']?></td>
                <td><?php echo "จอง" ?></td>
                <td><button id="detile_coupon" type="button" class="btn btn-danger" 
                nameId="<?php echo $row['around_id']; ?>"
                nameName="<?php echo $row['movie_name_th']; ?>"
                namedate="<?php echo $row['date_show']; ?>"
                nametime="<?php echo $row['time_show']; ?>" >ดู QR CODE</button> <br></td>
            </tr>
        </tbody> 

    <?php }?>
        </table>  
    </div>

<script type="text/javascript"> 

    $("*[id^=detile_coupon]").click(function()
    {
        var id = $(this).attr('nameid');
        //alert(id);
        $("#show").load("systems/coupon_detile.php",{ 
            id : id,
            name :  $(this).attr('nameName'),
            date :  $(this).attr('namedate'),
            time :  $(this).attr('nametime')
        });
    });
</script>