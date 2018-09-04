<?php
 session_start();
 include ('../js/function_db.php');
?>
<div class="row">
    <div class="col-sm-1">
        
    </div>
    <div class="col-sm-4">
        <div class="text-left "> 
    <a  href="javascrip:void(0)" data-toggle="modal" data-target="#myModal">เพิ่มข้อมูลหนัง </a>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">เพิ่มภาพยนต์</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="email">ชื่อหนังภาษาไทย</label>
            <input type="text" class="form-control" id="movie_name_th"  >
        </div>
        <div class="form-group">
            <label for="pwd">ชื่อหนังภาษาอังกฤษ</label>
            <input type="text" class="form-control" id="movie_name_eng" >
        </div>
        <div class="form-group">
            <label for="pwd">เรทผู้เข้าชม</label>
            <input type="text" class="form-control" id="audience" >
        </div>
        <div class="form-group">
            <label for="pwd">ระยะเวลา</label>
            <input type="text" class="form-control" id="length" >
        </div>
        <div class="form-group">
            <label for="pwd">วันที่เข้าฉาย</label>
            <input type="date" class="form-control" id="movie_date" >
        </div>
        <div class="form-group">
            <select id="category" class="form-control" data-val="true" data-val-required="กรุณากรอกข้อมูล" >
                <option value="0">เลือกประเภทหนัง</option>
                <?php
                    $sql_cat = "SELECT * FROM category";
                    $rs_cat = selectSql($sql_cat);
                    foreach ($rs_cat as $row_cat) {?>
                <option value="<?php echo $row_cat['category_id']; ?>"><?php echo $row_cat['category_name']; ?></option>
                <?php  } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="pwd">รายละเอียด</label>
            <textarea type="text" class="form-control" id="deteil" ></textarea>
        </div>
        <div class="form-group">
            <label for="pwd">รูปภาพตัวอย่าง</label>
            <input type="file" id="fileinput_movie" multiple="multiple" accept="images/*">
        </div>
      </div>
      <div class="modal-footer">
      <button  id="btn_insert" type="button" class="btn btn-default" data-dismiss="modal">บันทึก</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</div>
    </div>
    <div class="col-sm-7">

    </div>
</div>
<?php
   
    if (!isset($_POST['status'])) {  $_POST['status']=0; }
    if($_POST['status']==1)
    {
        $sql = " SELECT * FROM movie WHERE (movie_name_th LIKE '%".$_POST["id"]."%' or  movie_name_eng LIKE '%".$_POST["id"]."%' or  movie_date LIKE '%".$_POST["id"]."%' ) ";
    }
    else
    {
        $sql = " SELECT * FROM movie ";
    }
    
    $rs = selectSql($sql);
    ?>
        <div class="container ">      
            <table class="table table-striped text-left"> 
                <thead>
                    <tr>
                        <th>ชื่อหนังภาษาไทย</th>
                        <th>ชื่อหนังภาษาอังกฤษ</th>
                        <th>เรทผู้เข้าชม</th>
                        <th>ระยะเวลา</th>
                        <th>วันที่เข้าฉาย</th>
                    </tr>
                </thead> 
            
    <?php
    foreach ($rs as $row)
    {?> 
        <tbody >
            <tr>
                <td><?php echo $row['movie_name_th']?></td>
                <td><?php echo $row['movie_name_eng']?></td>
                <td><?php echo $row['audience']?></td>
                <td><?php echo $row['length_time']?> นาที</td>
                <td><?php echo $row['movie_date']?></td>
                <td><button id="deteil_show_admin" type="button" class="btn btn-primary" name="<?php echo $row['movie_id']; ?>" >ดูข้อมูล</button> <br></td>
            <td><button id="delete" type="button" class="btn btn-danger" name="<?php echo $row['movie_id']; ?>" >ลบ</button> <br></td>
            </tr>
        </tbody> 
    <?php }?>
        </table>  
    </div>
<script type="text/javascript"> 

 $("*[id^=deteil_show_admin]").click(function()
    {
        var id = $(this).attr('name');
        //alert(id);
        $("#show").load("systems/movie_deteil.php",{ id : id });
    });

$("*[id^=delete]").click(function()
    {
        var id = $(this).attr('name');
        //alert(id);
        $.post("systems/movie_delete.php",
        {
            id : id
        },
        function(msg)
        {
            if(msg == "ok"){
                alert("ลบสำเร็จ");
            $("#show").load("systems/movie_show_addmin.php")
            }
            else
            {
                alert(msg + "| " + " ลบไม่ได้");
            }
        });
    });


    $("#btn_insert").click(function()
    {
      $.post("systems/movie_add_chk.php",
      {
        satatus : 0,
        name_th : $("#movie_name_th").val(),
        name_eng : $("#movie_name_eng").val(),
        audience : $("#audience").val(),
        time : $("#length").val(),
        date : $("#movie_date").val(),
        category : $("#category").val(),
        deteil : $("#deteil").val()
        
      },
      function(msg)
      {
        if(msg == "ok")
        {
            alert("บันทึกสำเร็จ");
            $("#show").load("systems/movie_show_addmin.php")
        }
        else
        {
            alert(msg + "| " + " บันทึกไม่ได้");
        }
      });
    });
    $("#fileinput_movie").change(function() {
        
        var file_data = $('#fileinput_movie').prop('files')[0];
        //alert(file_data)
        var form_data = new FormData();
        form_data.append('uploaded_file', file_data);
        //alert(form_data);
         $.ajax({
            url: 'systems/movie_add_chk.php', // point to server-side PHP script
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