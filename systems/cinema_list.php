<?php
session_start();
include ('../js/function_db.php');
?>
<div class="row">
    <div class="col-sm-4">
       <!-- <div class="form-group">
            <a data-toggle="modal" data-target="#add_user" id="insert_user" href="#" class="">เพิ่มข้อมูลโรงภาพยนต์</a>
        </div> -->
    </div>
    <div class="col-sm-4">
        
    </div>
    <div class="col-sm-4">

    </div>
</div>       

<?php
    
    if (!isset($_POST['status'])) {  $_POST['status']=0; }
    if($_POST['status']==1)
    {
        $sql = " SELECT * FROM `cinema` LEFT JOIN branch ON cinema.branch_id = branch.branch_id WHERE (cinema_name LIKE '%".$_POST["id"]."%' or cinema_name LIKE '%".$_POST["id"]."%' or branch.branch_name LIKE '%".$_POST["id"]."%' )";
    }
    else
    {
        $sql = " SELECT * FROM `cinema` LEFT JOIN branch ON cinema.branch_id = branch.branch_id ";
    }
    
    $rs = selectSql($sql);
    foreach ($rs as $row)
    {?>
    
        <div class="col-sm-4">
            <br>
            
            <p><B><?php echo "โรงภาพยนต์ : ".$row['cinema_name']; ?></B></font></p></p>
            <p><B><?php echo "สาขา : ".$row['branch_name'] ?></B></font></p></p>
            <p><B><?php echo "ติดต่อ : ".$row['tel'] ?></B></font></p>
            
            <!-- <button id="delete" name="<?php //echo $row['movie_id']; ?>" type="button" class="btn btn-danger">Delete</button>-->
        </div>  
    <?php }
    ?>
