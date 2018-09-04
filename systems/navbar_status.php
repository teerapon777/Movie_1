
<?php
session_start();
if ( !isset($_SESSION["ssUserstatus"]) )
{
  $_SESSION["ssUserstatus"] = 0;
}
else{
  if ($_SESSION["ssUserstatus"] == 1)
{?>
    <ul class="nav navbar-nav">
        <li id="my_coupon_show" ><a href="#"><span class="glyphicon glyphicon-qrcode"></span>&nbsp;&nbsp;บัตรภาพยนต์ของฉัน </a></li>
    </ul>
<?php } 
else if($_SESSION["ssUserstatus"] == 2){
    ?>
    <ul class="nav navbar-nav">
    <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">การจัดการข้อมูล
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li id="user_show_addmin" ><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;จัดการข้อมูลผู้ใช้งาน</a></li>
                <li id="movie_show_addmin" ><a href="#"><span class="glyphicon glyphicon-film"></span>&nbsp;&nbsp;จัดการข้อมูลภาพยนต์ </a></li>
                <li id="movie_around" ><a href="#"><span class="glyphicon glyphicon-film"></span>&nbsp;&nbsp;จัดการข้อมูลรอบฉายภาพยนต์ </a></li>
                <li id="cinema_show_admin1" ><a href="#"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;จัดการข้อมูลโรงภาพยนต์ </a></li>
                <li id="branch_show" ><a href="#"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;จัดการข้อมูลสาขาโรงภาพยนต์ </a></li>
              </ul>
            </li>
    
    </ul>
<?php
}
}

?>

<script type="text/javascript"> 

  $("#user_show_addmin").click(function(){
    $("#show").load("systems/user_show.php") 
  });
  $("#movie_show_addmin").click(function(){
    $("#show").load("systems/movie_show_addmin.php") 
  });
  $("#cinema_show_admin1").click(function(){
    $("#show").load("systems/cinema_show_addmin.php") 
  });
  $("#branch_show").click(function(){
    $("#show").load("systems/branch_show.php") 
  });
  $("#movie_around").click(function(){
    $("#show").load("systems/movie_around_show.php") 
  });
  $("#my_coupon_show").click(function(){
    $("#show").load("systems/coupon_show.php") 
  });

</script>
