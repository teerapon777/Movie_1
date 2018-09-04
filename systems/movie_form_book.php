<?php
session_start();
?>
<input type="hidden" id="id_rounds" value="<?php echo $_POST['id'] ?>">
<div class="text-center">
     <h2>ยืนยันการจองบัตรชมภาพยนตร์</h2>
</div>
<?php
if($_SESSION['ssUser_id'] == null)
{ ?>
<div>
<form  class="text-center" align="center">
    <div class="row">
        <div class="form-group col-sm-2" > 
        </div>
        <div class="form-group col-sm-8" >
            <label for="email">Email address:</label>
            <input type="email" class="form-control" id="email" disabled="disabled">
        </div>
        <div class="form-group col-sm-2" >
            
        </div>
    </div>  
    <div class="row">
        <div class="form-group col-sm-2" >
            
        </div>
        <div class="form-group col-sm-8">
            <label for="pwd">เบอร์โทรศัพท์</label>
            <input  type="text" class="form-control" id="pwd" disabled="disabled">
        </div>
        <div class="form-group col-sm-2" >
        </div>
    </div>
   
    <div class="row">
        <div class="form-group col-sm-2" >
            
        </div>
        <div class="form-group col-sm-8">
            <label for="" style="background-color:red;" >กรุณาเข้าสู่ระบบก่อนทำการจองตั๋ว</label>
        </div>
        <div class="form-group col-sm-2" >
        </div>
    </div>
</form>

</div>  
<?php }
else{
 ?>
<div>
<form  class="text-center" align="center">
    <div class="row">
        <div class="form-group col-sm-2" > 
        </div>
        <div class="form-group col-sm-8" >
            <label for="email">Email address:</label>
            <input type="email" class="form-control" id="email_book" value="<?php echo $_SESSION['ssEmail']; ?>" >
        </div>
        <div class="form-group col-sm-2" >
            
        </div>
    </div>  
    <div class="row">
        <div class="form-group col-sm-2" >
            
        </div>
        <div class="form-group col-sm-8">
            <label for="pwd">เบอร์โทรศัพท์</label>
            <input  type="text" class="form-control" value="<?php echo $_SESSION['ssPhone']; ?>" id="phone_book" >
        </div>
        <div class="form-group col-sm-2" >
        </div>
    </div>
</form>
</div> 
<div class="text-left">
</div>
<div class="text-center">
    <button id="btn_book_movie" type="button" class="btn btn-success">ยืนยันการจอง</button>
</div>
<br><br>
<?php }
?>


<script type="text/javascript">
$("#btn_book_movie").click(function()
    {
        var id =  $("#id_rounds").val();
        var email = $("#email_book").val();
        var phone = $("#phone_book").val();
        //alert(email);
        //alert(phone);
        $.post("systems/movie_form_book_chk.php",
        {
            id : id,
           email : email,
           phone : phone,
        },
        function(msg){
            if(msg == "ok")
            {
               //alert(msg);
               alert("จองตั๋วภาพยนต์สำเร็จ กรุณานำคิวอาร์โค้ดไปชำระเงินที่โรงภาพยนต์ก่อนเวลาฉาย 1 ชม.");
               $("#show").load("systems/coupon_show.php"); 
            }
            else{
                alert("จองไม่ได้");
            }
        });
    });
</script>