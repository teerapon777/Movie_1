<?php
 session_start();
 include ('../js/function_db.php');
?>

<div class="row">
    <div class="col-sm-1">
        
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <a data-toggle="modal" data-target="#add_cinema" id="insert_user" href="#" class="">เพิ่มโรงภาพยนต์ </a>    
<!-- Modal -->
<div id="add_cinema" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
            <div class="form-group">
                <label for="email">ชื่อโรงภาพยนต์</label>
                <input type="text" class="form-control" id="cinema_name_">
            </div>
                <div class="form-group">
                    <label for="pwd">สาขา</label>
                    <select id="branch" class="form-control" data-val="true" data-val-required="กรุณากรอกข้อมูล" >
                    <?php
                        $sqlbranch = "SELECT * FROM branch";
                        $rsbranch = selectSql($sqlbranch);
                        foreach ($rsbranch as $rowbranch) {?>
                        <option value="<?php echo $rowbranch['branch_id ']; ?>"><?php echo $rowbranch['branch_name']; ?></option>
                    <?php  } ?>
                    </select>
                </div>
            <div class="form-group">
                    <label for="email">เบอร์ติดต่อ</label>
                    <input type="text" class="form-control" id="tel">
            </div>
      </div>
      <div class="modal-footer">
        <button id="btn_add_cinema1" type="button" data-dismiss="modal" class="btn btn-default" >ยืนยัน</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
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
        $sql = " SELECT * FROM `cinema` LEFT JOIN branch ON cinema.branch_id = branch.branch_id WHERE (cinema_name LIKE '%".$_POST["id"]."%' or cinema_name LIKE '%".$_POST["id"]."%' or branch.branch_name LIKE '%".$_POST["id"]."%' )";
    }
    else{
        $sql = " SELECT * FROM `cinema` LEFT JOIN branch ON cinema.branch_id = branch.branch_id ";
    }
    
    $rs = selectSql($sql);
    ?>
        <div class="container ">      
            <table class="table table-striped text-left"> 
                <thead>
                    <tr>
                        <th>ชื่อโรงภาพยนต์</th>
                        <th>สาขา</th>
                        <th>ติดต่อ</th>
                    </tr>
                </thead> 
            
    <?php
    foreach ($rs as $row)
    {?> 
        <tbody >
            <tr>
                <td><?php echo $row['cinema_name']?></td>
                <td><?php echo $row['branch_name']?></td>
                <td><?php echo $row['tel']?></td>

                <td><button id="del_cinema" type="button" class="btn btn-danger" name="<?php echo $row['cinema_id']; ?>" >ลบ</button> <br></td>
            </tr>
        </tbody> 

    <?php }?>
        </table>  
    </div>

<script type="text/javascript"> 

    $("*[id^=del_cinema]").click(function()
    {
        var id = $(this).attr('name');
        //alert(id);
        $.post("systems/cinema_del.php",
        {
            id : id
        },
        function(msg)
        {
            if(msg == "ok"){
                alert("ลบสำเร็จ");
            $("#show").load("systems/cinema_show_addmin.php")
            }
            else
            {
                alert(msg + "| " + " ลบไม่ได้");
            }
        });
    });
    $("#btn_add_cinema1").click(function(){
        //alert("asdfas");
        $.post("systems/cinema_add_chk.php",
        {
            satatus : 0,
            name :  $("#cinema_name_").val(),
            branch : $("#branch").val(),
            tel : $("#tel").val()
        },
        function(msg){
            //alert(msg)
            if(msg == "ok")
            {
                alert("บันทึกสำเร็จ");
                $("#show").load("systems/cinema_show_addmin.php")
            }
            else
            {
                alert(" บันทึกไม่ได้" + "เนื่องจาก" + msg);
            }
        });
    });

</script>