<?php
    session_start();
    include ('../js/function_db.php');
    ?>

    <table align="center">
    <input type="hidden" id="around_id_hid" value="<?php echo $_POST['id']." ".$_SESSION["ssEmail"] ?>">
    <td>
        <div id="qr_code_show">
            ไม่สามารถสร้างได้
        </div>
    </td>
    <?php
    ?>
    <td>
        <label for="">ภาพยนต์ : </label><label for=""> <?php echo $_POST['name']; ?></label><br>
        <label for="">วันที่ : </label><label for=""> <?php echo $_POST['date']; ?></label><br>
        <label for="">รอบ : </label><label for=""> <?php echo $_POST['time']; ?></label><br>
    <?php
    $sql = " SELECT tickets_id,around_id,t_row,num FROM `tickets` WHERE email = '".$_SESSION["ssEmail"]."' AND around_id = '".$_POST['id']."' ";
    $rs = selectSql($sql);
    echo "ที่นั่ง : ";
    foreach ($rs as $row)
    {
       echo $row['t_row'].$row['num']." " ;
       
    }?>
    </td>
    </table>



<script type="text/javascript">
$(function(){
    var id = $("#around_id_hid").val();
    $("#qr_code_show").load("systems/gen_qrcode.php",{
        id : id
    });
});


</script>