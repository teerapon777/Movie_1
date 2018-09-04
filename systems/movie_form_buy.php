<input type="hidden" id="id_rounds" value="<?php echo $_POST['id'] ?>">
<div class="text-center">
    <h2>ยืนยันการซื้อบัตรชมภาพยนตร์ </h2>
</div>
<div>
<form  class="text-center" align="center">
    <div class="row">
        <div class="form-group col-sm-2" > 
        </div>
        <div class="form-group col-sm-8" >
            <label for="email">Email address:</label>
            <input id="email_buy" type="email" class="form-control" >
        </div>
        <div class="form-group col-sm-2" >
            
        </div>
    </div>  
    <div class="row">
        <div class="form-group col-sm-2" >
            
        </div>
        <div class="form-group col-sm-8">
            <label for="pwd">เบอร์โทรศัพท์</label>
            <input id="phone_buy" type="text" class="form-control" >
        </div>
        <div class="form-group col-sm-2" >
        </div>
    </div>
    
</form>
</div>
<div class="text-center">
    <h2>เลือกช่องทางการชำระเงิน</h2>
    <form >
    <label class="radio-inline">
        <img src="img/ktb.png" alt="" width="70"><br>
        <input type="radio" name="optradio">ธนาคารกรุงไทย
    </label>
    <label class="radio-inline">
    <img src="img/kkb.png" alt="" width="70"><br>
      <input type="radio" name="optradio">ธนาคารกสิกรไทย
    </label>
    <label class="radio-inline">
    <img src="img/scb.png" alt="" width="70"><br>
      <input type="radio" name="optradio">ธนาคารกรุงเทพ
    </label>
    <label class="radio-inline">
    <img src="img/kcb.png" alt="" width="70"><br>
      <input type="radio" name="optradio">ธนาคารกรุงศรี
    </label>
    </form>
</div>
<br>
<div class="text-center">
    <button id="btn_buy_movie" type="button" class="btn btn-success">ยืนยันการสั่งซื่อ</button>
</div>
<br><br>
<script type="text/javascript">
$("#btn_buy_movie").click(function()
    {
        var id =  $("#id_rounds").val();
        var email = $("#email_buy").val();
        var phone = $("#phone_buy").val();
        //alert(email);
        //alert(phone);
       $.post("systems/movie_form_buy_chk.php",
       {
           id : id,
           email : email,
           phone : phone,
       },
       function(msg){
           if(msg == "ok")
           {
               //alert(msg);
               alert("ซื่อตั๋วภาพยนต์สำเร็จ ระบบขะส่งคิวอาร์โค้ดไปยัง Email ของคูณ");
               window.location.reload(); 
           }
       });
    });
</script>
