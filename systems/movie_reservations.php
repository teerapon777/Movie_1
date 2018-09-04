<?php
session_start();
//session_destroy();
//
if((!isset($_SESSION['num'])) && (!isset($_SESSION['row'])) && (!isset($_SESSION['price']))){ 
    $_SESSION['row'] = array();
    $_SESSION['num'] = array();
    $_SESSION['price'] = array();
 }   
 $r = $_POST['row'];
 array_push($_SESSION['row'],$r);

$a = $_POST['id'];
array_push($_SESSION['num'],$a);

$p = $_POST['price'];
array_push($_SESSION['price'],$p);
?>
<div class="text-center">
    <label for="">เลือกที่นั่ง</label><br>
    <label for="">
    <?php foreach($_SESSION['num'] as $row => $value)
    {
        echo $_SESSION['row'][$row].$value." ";
        
    }
        //print_r($_SESSION['str']);
     ?>
    </label><br><br>
    <label for="">ราคา</label><br>
    <label for=""><?php 
    foreach($_SESSION['price'] as $row => $value)
    {
        $price = $price + $_SESSION['price'][$row];

    }
    echo $price;
    ?></label><br><br>
    <button  id="btn_next" type="button" name="<?php echo $_POST['id_round'] ?>" class="btn btn-info">ดำเนินการต่อ</button>
    <button  id="btn_clr" type="button" name="<?php echo $_POST['id_round'] ?>" class="btn btn-info">ล้าง</button>
</div>
<script type="text/javascript">

$("#btn_next").click(function()
{
    var id_round = $(this).attr("name");
    //alert(id_round);
    $("#show").load("systems/movie_tickets.php",
    { 
        id : id_round
    });
});
$("#btn_clr").click(function()
{
    var id_round = $(this).attr("name");
    //alert(id_round);
    $("#show").load("systems/movie_seat.php",{ id : id_round });
});
</script>    


