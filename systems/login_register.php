
<?php
session_start();
if (!isset($_SESSION["ssUserfname"]))
{?>
<ul class="nav navbar-nav navbar-right">
            <li data-toggle="modal" data-target="#login_show"><a href="#"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;เข้าสู่ระบบ</a></li>
            
            <div class="modal fade" id="login_show" role="dialog">
              <div class="modal-dialog ">
              
                <!-- Modal content-->
                <div class="modal-content">
                
                  <div class="modal-header modal-header-info">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">เข้าสู่ระบบ</h4>
                  </div>
                  <div class="modal-body">
                      <form action="">
                        <div class="form-group">
                          <label for="email">Email address:</label>
                          <input type="text" class="form-control" id="user">
                        </div>
                        <div class="form-group">
                          <label for="pwd">Password:</label>
                          <input type="password" class="form-control" id="pass">
                        </div>
                      </form>
                </form>
                  </div>
                  <div class="modal-footer">
                      <button id="btn_login" type="button" data-dismiss="modal" class="btn btn-default" >เข้าสู่ระบบ</button>
                      
                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                  </div>
                </div>
                
              </div>
            </div>
          </ul>


          <ul class="nav navbar-nav navbar-right">
            <li data-toggle="modal" data-target="#Regiser_show"><a href="#"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;สมัครสมาชิก</a></li>
            
            <div class="modal fade" id="Regiser_show" role="dialog">
              <div class="modal-dialog">
              
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header modal-header-success">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">สมัครสมาชิก</h4>
                  </div>
                  <div class="modal-body">
                      <form action="">
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
                              include ('../js/function_db.php');
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
                          <label for="pwd">รูปภาพ</label>
                          <input type="file" id="fileinput_userimg" multiple="multiple" accept="images/*">
                        </div>
                      </form>
                </form>
                 </div>
                  <div class="modal-footer">
                      <button id="btn_register" type="button" data-dismiss="modal" class="btn btn-default" >ยืนยัน</button>
                      
                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                  </div>
                </div>
                
              </div>
            </div>
          </ul>
          
<script type="text/javascript">

$(function(){
  $('#btn_login').click(function(){
    $.post('systems/login_chk.php',{
      user : $('#user').val(),
      pass : $('#pass').val()
    },function(msg){
      if (msg=='ok') {
        
        alert('เข้าสู่ระบบเรียบร้อย')
        $("#login").load("systems/login_register.php");
        $("#navbar").load("systems/navbar_status.php");
      } else {
        alert(msg + "| " + "Username หรือ Password ไม่ถูกต้อง");
      }
    });
  });

  $("#btn_register").click(function()
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
        status_user : 1
        
        
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
});
</script>
<?php } 
else{
    ?>
    <ul class="nav navbar-nav">
    <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"><img class="img-circle"  src="<?php echo "images_user/".$_SESSION["ssUsersimg"]; ?>" width="30" height="25"  title="<?php echo $_SESSION["ssUsersimg"]; ?>">&nbsp;&nbsp;<?php echo $_SESSION["ssUserfname"]." ".$_SESSION["ssUserlname"] ; ?>
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li id="user_deteil"><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;ข้อมูลผู้ใช้งาน</a></li>
                <li id="oklogout" ><a href=""><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;ออกจากระบบ </a></li>
              </ul>
            </li> 
    </ul>
<script>
$(function(){
  $('#oklogout').click(function(){
    $.post('systems/login_chk.php',{
      user : $(null).val(),
      pass : $(null).val()
    },function(data){
      $("#showmain").load("systems/movie_show.php") 
        alert('ออกจากระบบเรียบร้อย');
    });
  });
  $("#user_deteil").click(function()
  {
    $("#show").load("systems/user_deteil.php");
  });
});
</script>

<?php
}
?>
