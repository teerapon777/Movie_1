<?php
    session_start();
    include ('../js/function_db.php');
?>
<div class="row form-inline">
<hr>
  <div class="form-group" >
    <select  id="cinema"  class="form-control">
      <option value="0">เลือกโรงภาพยนตร์</option>
      <?php
        $sql_cinema = " SELECT cinema.cinema_id,cinema.cinema_name,branch.branch_name FROM cinema 
        LEFT JOIN branch ON cinema.branch_id = branch.branch_id ";
        $rs_cinema = selectSql($sql_cinema);
        foreach ($rs_cinema as $row_cinema) {  ?>
            <option onclick="CalShowDiv(this.value)" value="<?php echo $row_cinema['cinema_id']; ?>">
            <?php echo $row_cinema['cinema_name']." ".$row_cinema['branch_name'] ?></option>
            
        <?php } 
      ?>
    </select>
  </div>
  <div class="form-group" >
    <select  id="movie" class="form-control">
      <option value="0">เลือกภาพยนตร์</option>
      
    </select>

  </div>
  <button id="btn_showdown" type="button" class="btn btn-info">รอบฉาย</button>
</div>
<div class="tab-list">
      
  <div class="form-group">
    <input type="text" class="form-control" id="txt" placeholder="ค้นหา...">
  </div>
    <p>
        <a id="now" href="javascrip:void(0)" class="active">กำลังฉาย </a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a id="next" href="javascrip:void(0)" class="active"> โปรแกรมหน้า</a>
    </p>      
</div>
<hr>
<div id="movie_list">

</div>
<script type="text/javascript"> 
  $("#movie_list").load("systems/movie_list.php") 
  $("#now").click(function()
    {
//        alert(id);
        $.post("systems/movie_list.php",
        {
            status : 1,
        },
        function(msg)
        {
          $("#movie_list").html(msg);
        });
    });
    $("#next").click(function()
    {
//        alert(id);
        $.post("systems/movie_list.php",
        {
            status : 2,
        },
        function(msg)
        {
          $("#movie_list").html(msg);
        });
    });
    $("#txt").keyup(function()
    {
        var id = $(this).val();
        //alert(id);
        $.post("systems/movie_list.php",
        {
            status : 3,
            id : id
        },
        function(msg)
        {
          $("#movie_list").html(msg);
        });
    });
    $("#cinema").change(function()
    {
        var id = $(this).val();
        //alert(id);
        $.post("systems/movie_select.php",
        {
            status : 1,
            params : id
        },
        function(msg)
        {
          //alert(msg);
          $("#movie").html(msg);
         
        });
    });
    
    
    $("#btn_showdown").click(function()
    {
        var cinema = $('#cinema').val();
        var movie = $('#movie').val();
        $("#show").load("systems/movie_showdown.php",{ movie : movie,cinema : cinema });
    });
</script>