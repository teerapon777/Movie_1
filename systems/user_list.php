<?php
 session_start();
 include ('../js/function_db.php');
?>
<div class="row">
    <div class="col-sm-1">
        
    </div>
    <div class="col-sm-4">
        <div class="text-left "> 
            <a data-toggle="modal" data-target="#add_user" id="insert_user" href="#" class="">เพิ่มข้อมูลผู้ใช้งาน </a>

<!-- Modal -->
<div id="add_user" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">เพิ่มผู้ใช้งาน</h4>
      </div>
      <div class="modal-body">
        <p>
            <form>
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="pwd">รหัสผ่าน :</label>
                    <input type="password" class="form-control" id="password">
                </div> 
                <div class="form-group">
                    <label for="pwd">คำนำหน้า :</label>
                    <select id="initial" class="form-control" data-val="true" data-val-required="กรุณากรอกข้อมูล" >
                    <?php
                        $sqlinitial = "SELECT * FROM initial";
                        $rsinitial = selectSql($sqlinitial);
                        foreach ($rsinitial as $rowinitial) {?>
                        <option value="<?php echo $rowinitial['initial_id']; ?>"><?php echo $rowinitial['initial_name']; ?></option>
                    <?php  } ?>
                    </select>
                </div> 
                <div class="form-group">
                    <label for="email">ชื่อ :</label>
                    <input type="text" class="form-control" id="firstname">
                </div>   
                <div class="form-group">
                    <label for="email">นามสกุล :</label>
                    <input type="text" class="form-control" id="lastname">
                </div>  
                <div class="form-group">
                    <label for="pwd">เพศ :</label>
                    <select id="gender" class="form-control" data-val="true" data-val-required="กรุณากรอกข้อมูล" >
                        <?php
                            $sqlgender = "SELECT * FROM gender";
                            $rsgender = selectSql($sqlgender);
                            foreach ($rsgender as $rowgender) {?>
                        <option value="<?php echo $rowgender['gender_id']; ?>"><?php echo $rowgender['gender_name']; ?></option>
                        <?php  } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">เบอร์โทร</label>
                    <input type="text" class="form-control" id="user_phone">
                </div>
                <div class="form-group">
                    <label for="pwd">สิทธ์การใช้งาน :</label>
                    <select id="status_user" class="form-control" data-val="true" data-val-required="กรุณากรอกข้อมูล" >
                        <?php
                            $sqlstatus = "SELECT * FROM status_user";
                            $rsstatus = selectSql($sqlstatus);
                            foreach ($rsstatus as $rowstatus) {?>
                        <option value="<?php echo $rowstatus['status_id']; ?>"><?php echo $rowstatus['status_name']; ?></option>
                        <?php  } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pwd">รูปภาพ</label>
                    <input type="file" id="fileinput_userimg" multiple="multiple" accept="images/*">
                </div>
            </form>
        </p>
      </div>
      <div class="modal-footer">
        <button id="btn_add_user" type="button" data-dismiss="modal" class="btn btn-default" >ยืนยัน</button>
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
   
    
    if($_POST['status']==1)
    {
        $sql = " SELECT tb_user.user_id,tb_user.image,tb_user.email,tb_user.password,initial.initial_name,tb_user.firstname,tb_user.lastname,gender.gender_name,tb_user.phone,status_user.status_name FROM `tb_user` LEFT JOIN initial ON initial.initial_id = tb_user.initial_id LEFT JOIN gender ON gender.gender_id = tb_user.gender_id LEFT JOIN status_user ON status_user.status_id = tb_user.status_id WHERE (email LIKE '%".$_POST["id"]."%' or  firstname LIKE '%".$_POST["id"]."%' or  lastname LIKE '%".$_POST["id"]."%' or phone LIKE '%".$_POST["id"]."%') ";
    }
    else{
        $sql = " SELECT tb_user.user_id,tb_user.image,tb_user.email,tb_user.password,initial.initial_name,tb_user.firstname,tb_user.lastname,gender.gender_name,tb_user.phone,status_user.status_name FROM `tb_user` LEFT JOIN initial ON initial.initial_id = tb_user.initial_id LEFT JOIN gender ON gender.gender_id = tb_user.gender_id LEFT JOIN status_user ON status_user.status_id = tb_user.status_id ";
    }
    
    $rs = selectSql($sql);
    ?>
        <div class="container ">      
            <table class="table table-striped text-left"> 
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Password</th>
                        <th>ชื่อ-นามกุล</th>
                        <th>เพศ</th>
                        <th>เบอร์โทร</th>
                        <th>สิทธ์การใช้งาน</th>
                    </tr>
                </thead> 
            
    <?php
    foreach ($rs as $row)
    {?> 
        <tbody >
            <tr>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['password']?></td>
                <td><?php echo $row['initial_name'].$row['firstname']." ".$row['lastname'] ?></td>
                <td><?php echo $row['gender_name']?></td>
                <td><?php echo $row['phone']?></td>
                <td><?php echo $row['status_name']?></td>
                <td>
                    <button id="deteil_admin" type="button" class="btn btn-primary" name="<?php echo $row['user_id']; ?>" >ดูข้อมูลผู้ใช้</button> <br>
                </td>
                <td><button id="del_addmin" type="button" class="btn btn-danger" name="<?php echo $row['user_id']; ?>" >ลบ</button> <br></td>
            </tr>
        </tbody> 

    <?php }?>
        </table>  
    </div>

<script type="text/javascript"> 

    $("*[id^=deteil_admin]").click(function(){
        var id = $(this).attr('name');
        //alert(id);
        $("#show").load("systems/user_deteil.php",
        { id : id,status : 1 });
    });
    $("*[id^=del_addmin]").click(function()
    {
        var id = $(this).attr('name');
        //alert(id);
        $.post("systems/user_del.php",
        {
            id : id
        },
        function(msg)
        {
            if(msg == "ok"){
                alert("ลบสำเร็จ");
            $("#show").load("systems/user_show.php")
            }
            else
            {
                alert(msg + "| " + " ลบไม่ได้");
            }
        });
    });
    $("#btn_add_user").click(function()
  {
      $.post("systems/register_chk.php",
      {
        satatus : 0,
        email : $('#email').val(),
        password : $('#password').val(),
        initial : $('#initial').val(),
        firstname : $('#firstname').val(),
        lastname : $('#lastname').val(),
        gender : $('#gender').val(),
        user_phone : $('#user_phone').val(),
        status_user : $('#status_user').val()
        
        
      },
      function(msg)
      {
        if(msg == "ok")
        {
            alert("บันทึกสำเร็จ");
            $("#show").load("systems/user_show.php")
        }
        else
        {
            alert(" บันทึกไม่ได้" + "เนื่องจาก" + msg);
        }
      });
  });
  $("#fileinput_userimg").change(function() {
        
        var file_data = $('#fileinput_userimg').prop('files')[0];
        //alert(file_data)
        var form_data = new FormData();
        form_data.append('uploaded_file', file_data);
        //alert(form_data);
         $.ajax({
            url: 'systems/register_chk.php', // point to server-side PHP script
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