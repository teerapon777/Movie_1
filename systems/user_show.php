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
            <input type="text" class="form-control" id="user_txt" placeholder="ค้นหา...">
        </div>
    </div>
    <div class="col-sm-7">

    </div>
</div>
<div id="user_list">
        
</div>
<script type="text/javascript"> 
  $("#user_list").load("systems/user_list.php") 

  $("#user_txt").keyup(function()
    {
        var id = $(this).val();
        //alert(id);
        $.post("systems/user_list.php",
        {
            status : 1,
            id : id
        },
        function(msg)
        { 
            //alert(msg);
          $("#user_list").html(msg);
        });
    });
</script>
