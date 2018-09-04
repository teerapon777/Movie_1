<?php
    session_start();
    unset($_SESSION["filetrue_user_img"]);
    include ('../js/function_db.php');
    if($_POST['status']==1)
    {
        $sql = " SELECT tb_user.user_id,tb_user.image,tb_user.email,tb_user.password,initial.initial_name,tb_user.firstname,tb_user.lastname,gender.gender_name,tb_user.phone,status_user.status_name FROM `tb_user` LEFT JOIN initial ON initial.initial_id = tb_user.initial_id LEFT JOIN gender ON gender.gender_id = tb_user.gender_id LEFT JOIN status_user ON status_user.status_id = tb_user.status_id WHERE tb_user.user_id = '".$_POST['id']."' ";
    }
    else{
        $sql = " SELECT tb_user.user_id,tb_user.image,tb_user.email,tb_user.password,initial.initial_name,tb_user.firstname,tb_user.lastname,gender.gender_name,tb_user.phone,status_user.status_name FROM `tb_user` LEFT JOIN initial ON initial.initial_id = tb_user.initial_id LEFT JOIN gender ON gender.gender_id = tb_user.gender_id LEFT JOIN status_user ON status_user.status_id = tb_user.status_id WHERE tb_user.user_id = '".$_SESSION["ssUser_id"]."' ";
    
    }
    $rs = selectSql($sql);
    foreach ($rs as $row)
    {
        ?>
        <hr>
        <div class="container ">      
            <table class="table table-striped text-left"> 
                <tr>
                    <td class="">
                        <img src="<?php echo "images_user/".$row['image']; ?>" width="230" height="300" class="img-rounded" alt="Cinque Terre" title="<?php echo $row['image']; ?>">
                    </td>
                    <td>
                        <tr>
                            <td>
                                <label for="email">E-mail </label>
                            </td>
                            <td>
                                <label for="email"><?php echo $row['email']?></label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="email">Password</label>
                            </td>
                            <td>
                                <label for="email"><?php echo $row['password']?></label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="email">คำนำหน้า</label>
                            </td>
                            <td>
                                <label for="email"><?php echo $row['initial_name']?></label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="email">ชื่อ</label>
                            </td>
                            <td>
                                <label for="email"><?php echo $row['firstname']?></label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="email">นามสกุล</label>
                            </td>
                            <td>
                                <label for="email"><?php echo $row['lastname']?></label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="email">เพศ</label>
                            </td>
                            <td>
                                <label for="email"><?php echo $row['gender_name']?></label>
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label for="email">เบอร์โทร</label>
                            </td>
                            <td>
                                <label for="email"><?php echo $row['phone']?></label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="email">สถานะ</label>
                            </td>
                            <td>
                                <label for="email"><?php echo $row['status_name']?></label>
                            </td>
                        </tr>   
                        <tr>
                            <td>
                                <button id="edit"  data-toggle="modal" data-target="#btn_edit" type="button" class="btn btn-primary">แก้ไขข้อมูล</button>
                            </td>
                            <td>
                                <button id="btn_black" type="button" class="btn btn-primary">กลับ</button>
                            </td>
                        </tr>                      
                    </td>
                </tr>
            </table>
        </div>
  <?php
   
    if($_POST['status']==1)
    {
        $sql_edit = "SELECT * FROM tb_user WHERE user_id = '".$_POST['id']."' ";
    }
    else{
        $sql_edit = "SELECT * FROM tb_user WHERE user_id = '".$_SESSION['ssUser_id']."' ";
    
    }
    $rs_edit = selectSql($sql_edit);
    foreach ($rs_edit as $row_edit)
    {
    ?>

           
            <div class="modal fade" id="btn_edit" role="dialog">
              <div class="modal-dialog">
              
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header modal-header-success">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">แก้ไขข้อมูล</h4>
                  </div>
                  <div class="modal-body">
                      <form action="">
                      <div class="form-group">
                          
                          <input  type="hidden" class="form-control" id="user_id" value="<?php echo $row_edit['user_id']  ?>">
                        </div>
                        <div class="form-group">
                          
                          <input  type="hidden" class="form-control" id="email" value="<?php echo $row_edit['email']  ?>">
                        </div>
                        <div class="form-group">
                          <label for="pwd">รหัสผ่าน :</label>
                          <input type="password" class="form-control" id="password"  value="<?php echo $row_edit['password']  ?>">
                        </div>
                        <div class="form-group">
                        <label for="email">คำนำหน้า :</label>
                            <select id="initial" class="form-control" data-val="true" data-val-required="กรุณากรอกข้อมูล" >
                            <?php 
                                $sql_initial = "SELECT * FROM initial"; 
                                $rs_initial = selectSql($sql_initial);
                                foreach ($rs_initial as $row_initial) { ?>
                                    <option value="<?php echo $row_initial['initial_id']; ?>" <?php if($row_initial['initial_id'] == $row_edit['initial_id'] ){ echo "selected"; }?> ><?php echo $row_initial['initial_name']; ?></option>
                            <?php  } ?>
                            </select>
                        </div>

                        <div class="form-group">
                          <label for="email">ชื่อ :</label>
                          <input type="text" class="form-control" id="firstname" value="<?php echo $row_edit['firstname']  ?>">
                        </div>
                        <div class="form-group">
                          <label for="email">นามสกุล :</label>
                          <input type="text" class="form-control" id="lastname" value="<?php echo $row_edit['lastname']  ?>">
                        </div>
                        <div class="form-group">
                        <label for="email">เพศ :</label>
                            <select id="gender" class="form-control" data-val="true" data-val-required="กรุณากรอกข้อมูล" >
                            <?php 
                                $sql_gender = "SELECT * FROM gender"; 
                                $rs_gender = selectSql($sql_gender);
                                foreach ($rs_gender as $row_gender) { ?>
                                    <option value="<?php echo $row_gender['gender_id']; ?>" <?php if($row_gender['gender_id'] == $row_edit['gender_id'] ){ echo "selected"; }?> ><?php echo $row_gender['gender_name']; ?></option>
                            <?php  } ?>
                            </select>
                        </div>
                        <div class="form-group">
                          <label for="email">เบอร์โทร</label>
                          <input type="text" class="form-control" id="edit_phone" value="<?php echo $row_edit['phone']  ?>">
                        </div>
                        <?php
                        if($_SESSION["ssUserstatus"]==2)
                        { ?>
                        <div class="form-group">
                                    <label for="pwd">สิทธิ์ผู้ใช้งาน</label>
                                    <select id="status_user" class="form-control" data-val="true" data-val-required="กรุณากรอกข้อมูล" >
                                        <?php 
                                        $sql2 = "SELECT * FROM status_user"; 
                                        $rs2 = selectSql($sql2);
                                        foreach ($rs2 as $row2) { ?>
                                        <option value="<?php echo $row2['status_id']; ?>" <?php if($row2['status_id'] == $row_edit['status_id'] ){ echo "selected"; }?> ><?php echo $row2['status_name']; ?></option>
                                        <?php  } ?>
                                    </select>
                        </div>
                        <?php }
                        ?>
                        <div class="form-group">
                          <label for="pwd">รูปภาพ</label>
                          <input type="file" id="fileinput" multiple="multiple" accept="images/*">
                          <input id="imagess" type="hidden" value="<?php echo $row['image'] ?>">
                          <input id="status_us" type="hidden" value="<?php echo $_SESSION["ssUserstatus"] ?>">
                        </div>
                      </form>
                </form>
                 </div>
                  <div class="modal-footer">
                      <button id="edit_user" type="button" data-dismiss="modal" class="btn btn-default" >ยืนยัน</button>
                      
                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                  </div>
                </div>
                
              </div>
            </div>
      <?php } 
       }
      ?>
<script type="text/javascript">

$("#edit_user").click(function()
  { 
      var sss = $('#imagess').val();
      var status_us = $("#status_us").val();
      //alert(sss);
      $.post("systems/user_edit_chk.php",
      {
        satatus : 0,
        id : $('#user_id').val(),
        email : $('#email').val(),
        password : $('#password').val(),
        initial : $('#initial').val(),
        firstname : $('#firstname').val(),
        lastname : $('#lastname').val(),
        gender : $('#gender').val(),
        phone : $('#edit_phone').val(),
        status : $('#status_user').val(),
        img : $('#imagess').val()
        
      },
      function(msg)
      {
        if(msg == "ok")
        {
            alert("บันทึกสำเร็จ");
            if(status_us == 1)
            {
                window.location.reload();
            }
            else{
                $("#show").load("systems/user_show.php")
            }
           
        }
        else
        {
            alert(" บันทึกไม่ได้" + msg);
        }
      });
  });
  $("#fileinput").change(function() {
        
        var file_data = $('#fileinput').prop('files')[0];
        //alert(file_data)
        var form_data = new FormData();
        form_data.append('uploaded_file', file_data);
        //alert(form_data);
         $.ajax({
            url: 'systems/user_edit_chk.php', // point to server-side PHP script
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



$("#btn_black").click(function()
  {
    window.location.reload();
});
</script>