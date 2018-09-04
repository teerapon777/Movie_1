<?php
    session_start();
    include ('../js/function_db.php');
    $sql = " SELECT movie.category_id,movie.movie_id,movie.movie_name_th,movie.movie_name_eng,movie.audience,movie.length_time,movie.movie_date,movie.deteil,movie.img,category.category_name FROM `movie` LEFT JOIN category ON movie.category_id = category.category_id WHERE movie.movie_id =  '".$_POST['id']."' ";
    $rs = selectSql($sql);
    foreach ($rs as $row)
    {
        ?>
        <hr>
        <div class="container ">      
            <table class="table table-striped text-left"> 
                <tr>
                    <td class="">
                        <img src="<?php echo "images_movie/".$row['img']; ?>" width="230" height="300" class="img-rounded" alt="Cinque Terre" title="<?php echo $row['img']; ?>">
                    </td>
                    <td>
                        <tr>
                            <td>
                                <label for="email">ชื่อภาษาไทย</label>
                            </td>
                            <td>
                                <label for="email"><?php echo $row['movie_name_th']?></label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="email">ชื่อภาษาอังกฤษ</label>
                            </td>
                            <td>
                                <label for="email"><?php echo $row['movie_name_eng']?></label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="email">หมวดหมู่</label>
                            </td>
                            <td>
                                <label for="email"><?php echo $row['category_name']?></label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="email">เรทผู้ชม</label>
                            </td>
                            <td>
                                <label for="email"><?php echo $row['audience']?></label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="email">ระยะเวลา</label>
                            </td>
                            <td>
                                <label for="email"><?php echo $row['length_time']?></label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="email">วันที่เข้าฉาย</label>
                            </td>
                            <td>
                                <label for="email"><?php echo $row['movie_date']?></label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="email">รายละเอียด</label>
                            </td>
                            <td>
                                <label for="email"><?php echo $row['deteil']?></label>
                            </td>
                        </tr>   
                        <tr>
                            <td>
                            
                                
                                <?php
                                if($_SESSION["ssUserstatus"]==2)
                                { ?>
                                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">แก้ไขข้อมูล</button>
                                <?php }
                                ?>
                            <!-- Modal -->
                            <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">แก้ไขข้อมูล</h4>
                                </div>
                                
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="email">ชื่อหนังภาษาไทย</label>
                                    <input type="hidden" class="form-control" id="mov_id" value="<?php echo $row['movie_id']; ?>">
                                    <input type="text" class="form-control" id="movie_name_th" value="<?php echo $row['movie_name_th']?>" >
                                </div>
                                <div class="form-group">
                                    <label for="email">ชื่อหนังภาษาอังกฤษ</label>
                                    <input type="text" class="form-control" id="movie_name_eng" value="<?php echo $row['movie_name_eng']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="pwd">เรทผู้เข้าชม</label>
                                    <input type="text" class="form-control" id="audience" value="<?php echo $row['audience']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">ระยะเวลา</label>
                                    <input type="text" class="form-control" id="length_time" value="<?php echo $row['length_time']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">วันที่เข้าฉาย</label>
                                    <input type="date" class="form-control" id="movie_date" value="<?php echo $row['movie_date']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">รายละเอียด</label>
                                    <textarea type="text" class="form-control" id="deteil" value="<?php echo $row['deteil']; ?>" ><?php echo $row['deteil']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="pwd">หมวดหมู่</label>
                                    <select id="category" class="form-control" data-val="true" data-val-required="กรุณากรอกข้อมูล" >
                                        <?php 
                                        $sql2 = "SELECT * FROM category"; 
                                        $rs2 = selectSql($sql2);
                                        foreach ($rs2 as $row2) { ?>
                                        <option value="<?php echo $row2['category_id']; ?>" <?php if($row2['category_id'] == $row['category_id'] ){ echo "selected"; }?> ><?php echo $row2['category_name']; ?></option>
                                        <?php  } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pwd">รูปภาพตัวอย่าง</label>
                                    <input type="file" id="fileinput_mov" multiple="multiple" value="<?php echo $row2['img']; ?>" accept="images/*">
                                    <input type="hidden" class="form-control" id="img" value="<?php echo $row['img']; ?>">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button id="btn_edit" name="<?php echo $row['movie_id']; ?>" type="button" class="btn btn-default" data-dismiss="modal">บันทึก</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                        </div>
                            </td>
                            <td>
                                <button id="btn_black" type="button" class="btn btn-info btn-lg">กลับ</button>
                            </td>
                        </tr>                      
                    </td>
                </tr>
            </table>
        </div>
  <?php
    }
?>
<input id="status_user_admin" type="hidden" value="<?php echo $_SESSION['ssUserstatus'] ?>">
<script type="text/javascript">
$("#btn_black").click(function()
  {
    var status = $("#status_user_admin").val();
    //alert(status);
    if(status == 2){
        $("#show").load("systems/movie_list2.php") 
    }
    else
    {
        $("#showmain").load("systems/movie_show.php") 
    }
    
});
$("#btn_edit").click(function(){
      
      $.post("systems/movie_edit_chk.php",
      {
        id : $("#mov_id").val(),
        satatus : 0,
        name_th : $("#movie_name_th").val(),
        name_eng : $("#movie_name_eng").val(),
        audience : $("#audience").val(),
        time : $("#length_time").val(),
        date : $("#movie_date").val(),
        category : $("#category").val(),
        deteil : $("#deteil").val(),
        img : $("#img").val()
      },
      function(msg)
      {
        if(msg == "ok")
        {
            alert("บันทึกสำเร็จ");
            $("#showmain").load("systems/movie_show.php") 
        }
        else
        {
            alert(msg + "| " + " บันทึกไม่ได้");
        }
      });
  });
  $("#fileinput_mov").change(function() {
        
        var file_data = $('#fileinput_mov').prop('files')[0];
        //alert(file_data)
        var form_data = new FormData();
        form_data.append('uploaded_file', file_data);
        //alert(form_data);
         $.ajax({
            url: 'systems/movie_edit_chk.php', // point to server-side PHP script
           dataType: 'text',  // what to expect back from the PHP script, if anything
           cache: false,
           contentType: false,
           processData: false,
           data: form_data,
           type: 'post',
             success: function(data){
                 //alert(data);
             }
         });
     });
</script>