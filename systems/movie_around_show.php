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
            <input type="text" class="form-control" id="around_txt" placeholder="ค้นหา...">
        </div>
        
    </div>
    <div class="col-sm-7">

    </div>
</div>
<div id="movie_around_list">
        
</div>
<script type="text/javascript"> 
  
  $("#movie_around_list").load("systems/movie_around_list.php") 

  $("#around_txt").keyup(function()
    {
        var id = $(this).val();
        //alert(id);
        $.post("systems/movie_around_list.php",
        {
            status : 1,
            id : id
        },
        function(msg)
        { 
            //alert(msg);
          $("#movie_around_list").html(msg);
        });
    });
</script>
