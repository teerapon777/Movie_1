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
            <input type="text" class="form-control" id="cinema_txt" placeholder="ค้นหา...">
        </div>
        
    </div>
    <div class="col-sm-7">

    </div>
</div>
<div id="cinema_list_admin1">
        
</div>
<script type="text/javascript"> 
  
  $("#cinema_list_admin1").load("systems/cinema_list_addmin.php") 

  $("#cinema_txt").keyup(function()
    {
        var id = $(this).val();
        //alert(id);
        $.post("systems/cinema_list_addmin.php",
        {
            status : 1,
            id : id
        },
        function(msg)
        { 
            //alert(msg);
          $("#cinema_list_admin1").html(msg);
        });
    });
</script>
