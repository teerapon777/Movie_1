<?php
include ('../js/function_db.php');
$sql =  " SELECT * FROM tickets "
$rs = selectSql($sql); 
foreach($rs as $row)
{ ?>
    <table>
    <tr>
          <td>
            <?php echo $row['tickets_id'] ?>
          </td>
          <td>
              <img src="gen_qrcode.php?w=<?php echo $row['tickets_id']?>" alt="">
          </td>
      </tr>
    </table>
<? }
?>