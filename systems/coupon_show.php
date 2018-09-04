<?php
    session_start();
    include ('../js/function_db.php');
?>
<hr>
<div class="row">
    <div class="col-sm-1">
        
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <input type="text" class="form-control" id="coupon_txt" placeholder="ค้นหา...">
        </div>
        
    </div>
    <div class="col-sm-7">

    </div>
</div>
<div id="coupon_list_show">
        
</div>
<script type="text/javascript"> 
  
  $("#coupon_list_show").load("systems/coupon_list_show.php") 

  $("#coupon_txt").keyup(function()
    {
        var id = $(this).val();
        //alert(id);
        $.post("systems/coupon_list_show.php",
        {
            status : 1,
            id : id
        },
        function(msg)
        { 
            //alert(msg);
          $("#coupon_list_show").html(msg);
        });
    });
</script>
