<?php
 session_start();
 include ('../js/function_db.php');
?>

<div class="row">
    <div class="col-sm-1">
        
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <a data-toggle="modal" data-target="#add_around" id="insert_user" href="#" class="">เพิ่มรอบฉายภาพยนต์ </a>    
        </div>
        <!-- The Modal -->
<div class="modal" id="add_around">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
                <div class="form-group">
                    <label for="pwd">โรงภาพยนต์</label>
                    <select id="cinema_add_round" class="form-control" data-val="true" data-val-required="กรุณากรอกข้อมูล" >
                    <?php
                        $sqlcinema = "SELECT * FROM cinema LEFT JOIN branch ON branch.branch_id = cinema.branch_id ";
                        $rscinema = selectSql($sqlcinema);
                        foreach ($rscinema as $rowcinema) {?>
                        <option value="<?php echo $rowcinema['cinema_id']; ?>"><?php echo $rowcinema['cinema_name']."".$rowcinema['branch_name']; ?></option>
                    <?php  } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pwd">ภาพยนต์</label>
                    <select id="movie_add_round" class="form-control" data-val="true" data-val-required="กรุณากรอกข้อมูล" >
                    <?php
                        $sqlmovie = "SELECT * FROM movie ";
                        $rsmovie = selectSql($sqlmovie);
                        foreach ($rsmovie as $rowmovie) {?>
                        <option value="<?php echo $rowmovie['movie_id']; ?>"><?php echo $rowmovie['movie_name_th'] ?></option>
                    <?php  } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">วันที่</label>
                    <input type="date" class="form-control" id="date_round">
                </div>
                <div class="form-group">
                    <label for="email">เวลา/รอบ</label>
                    <input type="time" class="form-control" id="time_round">
                </div>
                <div class="form-group">
                    <label for="email">โรงฉายภาพยนต์</label>
                    <input type="number" class="form-control" id="theater">
                </div>
                <div class="form-group">
                    <label for="pwd">ระบบฉายภาพยนต์</label>
                    <select id="projection" class="form-control" data-val="true" data-val-required="กรุณากรอกข้อมูล" >
                    <?php
                        $sqlpro = "SELECT * FROM projection_system ";
                        $rspro = selectSql($sqlpro);
                        foreach ($rspro as $rowpro) {?>
                        <option value="<?php echo $rowpro['projection_id']; ?>"><?php echo $rowpro['projection_name'] ?></option>
                    <?php  } ?>
                    </select>
                </div>  
                
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button id="btn_add_round" type="button" data-dismiss="modal" class="btn btn-default" >ยืนยัน</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>    
    </div>
    <div class="col-sm-7">

    </div>
</div>
<?php
   
    
    if($_POST['status']==1)
    {
        $sql = " SELECT * FROM `branch`  WHERE ( branch_name LIKE '%".$_POST["id"]."%' )";
    }
    else{
        $sql = " SELECT cinema_movie.id,cinema.cinema_name,branch.branch_name,movie.movie_name_th,cinema_movie.date_show,cinema_movie.time_show,cinema_movie.theater,projection_system.projection_name FROM `cinema_movie` LEFT JOIN cinema ON cinema.cinema_id = cinema_movie.cinema_id LEFT JOIN branch ON branch.branch_id = cinema.branch_id LEFT JOIN movie ON movie.movie_id =cinema_movie.movie_id LEFT JOIN projection_system ON projection_system.projection_id = cinema_movie.projection_id ";
    }
    
    $rs = selectSql($sql);
    ?>
        <div class="container ">      
            <table class="table table-striped text-left"> 
                <thead>
                    <tr>
                        <th>โรงภาพยนต์</th>
                        <th>ชื่อภาพยนต์</th>
                        <th>วัที่ฉาย</th>
                        <th>รอบ/เวลา</th>
                        <th>โรงฉายภาพยนต์</th>
                        <th>ระบบฉายภาพยนต์ </th>
                    </tr>
                </thead> 
    <?php
    foreach ($rs as $row)
    {?> 
        <tbody >
            <tr>
                <td><?php echo $row['cinema_name']."".$row['branch_name']?></td>
                <td><?php echo $row['movie_name_th']?></td>
                <td><?php echo $row['date_show']?></td>
                <td><?php echo $row['time_show']?></td>
                <td><?php echo $row['theater']?></td>
                <td><?php echo $row['projection_name']?></td>

                <td><button id="del_around" type="button" class="btn btn-danger" name="<?php echo $row['id']; ?>" >ลบ</button> <br></td>
            </tr>
        </tbody> 

    <?php }?>
        </table>  
    </div>

<script type="text/javascript"> 

    $("*[id^=del_around]").click(function()
    {
        var id = $(this).attr('name');
        //alert(id);
        $.post("systems/movie_round_del.php",
        {
            id : id
        },
        function(msg)
        {
            if(msg == "ok"){
                alert("ลบสำเร็จ");
                $("#show").load("systems/movie_around_show.php")
            }
            else
            {
                alert(msg + "| " + " ลบไม่ได้");
            }
        });
    });
    $("#btn_add_round").click(function(){
        //var ii =  $("#cinema_add_round").val();
        //alert(ii);
        $.post("systems/movie_round_add_chk.php",
        {
            satatus : 0,
            cinema : $("#cinema_add_round").val(),
            movie : $("#movie_add_round").val(),
            date : $("#date_round").val(),
            time : $("#time_round").val(),
            theater : $("#theater").val(),
            projection : $("#projection").val()
        },
        function(msg){
            //alert(msg)
            if(msg == "ok")
            {
                alert("บันทึกสำเร็จ");
                $("#show").load("systems/movie_around_show.php")
            }
            else
            {
                alert(" บันทึกไม่ได้" + "เนื่องจาก" + msg);
            }
        });
    });

</script>