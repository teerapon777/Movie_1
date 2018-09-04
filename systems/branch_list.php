<?php
 session_start();
 include ('../js/function_db.php');
?>

<div class="row">
    <div class="col-sm-1">
        
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <a data-toggle="modal" data-target="#add_branch" id="insert_user" href="#" class="">เพิ่มสาขาโรงภาพยนต์ </a>    
        </div>
        <!-- The Modal -->
<div class="modal" id="add_branch">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
            <div class="form-group">
                <label for="email">โรงภาพยนต์</label>
                <input type="text" class="form-control" id="cinema_add_round">
            </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <button id="btn_add_branch" type="button" data-dismiss="modal" class="btn btn-default" >ยืนยัน</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>    
    </div>
    <div class="col-sm-7">

    </div>
</div>
<?php
   
    
    if($_POST['status']==1)
    {
        $sql = " SELECT * FROM `branch`  WHERE ( branch_name LIKE '%".$_POST["id"]."%' )";
    }
    else{
        $sql = " SELECT * FROM `branch` ";
    }
    
    $rs = selectSql($sql);
    ?>
        <div class="container ">      
            <table class="table table-striped text-left"> 
                <thead>
                    <tr>
                        <th>ชื่อสาขา</th>
                    </tr>
                </thead> 
    <?php
    foreach ($rs as $row)
    {?> 
        <tbody >
            <tr>
                <td><?php echo $row['branch_name']?></td>

                <td><button id="del_branch" type="button" class="btn btn-danger" name="<?php echo $row['branch_id']; ?>" >ลบ</button> <br></td>
            </tr>
        </tbody> 

    <?php }?>
        </table>  
    </div>

<script type="text/javascript"> 

    $("*[id^=del_branch]").click(function()
    {
        var id = $(this).attr('name');
        //alert(id);
        $.post("systems/branch_del.php",
        {
            id : id
        },
        function(msg)
        {
            if(msg == "ok"){
                alert("ลบสำเร็จ");
            $("#show").load("systems/branch_show.php")
            }
            else
            {
                alert(msg + "| " + " ลบไม่ได้");
            }
        });
    });
    $("#btn_add_branch").click(function(){
        //var ii =  $("#branch_name").val();
        //alert(ii);
        $.post("systems/branch_add_chk.php",
        {
            satatus : 0,
            name :  $("#branch_name").val()
        },
        function(msg){
            //alert(msg)
            if(msg == "ok")
            {
                alert("บันทึกสำเร็จ");
                $("#show").load("systems/branch_show.php")
            }
            else
            {
                alert(" บันทึกไม่ได้" + "เนื่องจาก" + msg);
            }
        });
    });

</script>