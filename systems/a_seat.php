<input type="hidden" id="round" value="<?php echo $_POST['id']?>">
<?php
session_start();

include ('../js/function_db.php');
$sql_movie = " SELECT cinema_movie.id,movie.movie_name_th,movie.img,cinema_movie.date_show,cinema_movie.time_show,cinema.cinema_name,branch.branch_name,cinema_movie.theater,projection_system.projection_id,projection_system.projection_name FROM `cinema_movie` LEFT JOIN movie ON movie.movie_id = cinema_movie.movie_id LEFT JOIN cinema ON cinema.cinema_id = cinema_movie.cinema_id LEFT JOIN branch ON branch.branch_id = cinema.branch_id LEFT JOIN projection_system ON projection_system.projection_id = cinema_movie.projection_id WHERE cinema_movie.id = '".$_POST['id']."' ";
$rs_movie = selectSql($sql_movie);
foreach ($rs_movie as $row_movie)
{
?>

    <table>
                        <tr>
                            <td>
                                <br><br>
                            </td>
                        </tr>
                        <tr class="text-left">
                            <br><br>
                            <img src="img/screen.svg" width="880" height="100" class="img-rounded" >
                        </tr>

                        <tr class="text-center">
                            <td> M </td>
                            <?php
                            for($i=1;$i<=19;$i++)
                            { ?>
                                <td> <?php
                                $sql_tickets = " SELECT DISTINCT tickets_id,around_id,t_row,num FROM `tickets` WHERE around_id = '".$_POST['id']."' AND t_row = 'M' AND num = '".$i."' ";
                                $rs_tickets = selectSql($sql_tickets);
                                
                                if($rs_tickets == null )
                                    {
                                        ?>
                                        
                                        <a  id="chair_movie" 
                                        price="<?php 
                                        if($row_movie['projection_id']==1)
                                        { echo 180;  }
                                        else if($row_movie['projection_id']==2)
                                        { echo 210;  } ?>"
                                        row="<?php echo "M" ?>" 
                                        name="<?php echo $i ?>" 
                                        href="javascrip:void(0)">
                                        <div id="imgM_<?php echo $i ?>" ><img id="bg"src="img/Deluxe.png" width="45"  class="img-rounded" ></div></a>
                                        
                                        
                                    <?php
                                    }
                                else{
                                        ?>
                                        <img src="img/busy1.png" width="45"  class="img-rounded" >
                                    <?php
                                    }
                                ?> 
                                </td>
                            <?php }
                            ?>
                            <td> M </td>
                        </tr>
                        <tr class="text-center">
                            <td> L </td>
                            <?php
                            for($i=1;$i<=19;$i++)
                            { ?>
                                <td> <?php
                                $sql_tickets = " SELECT DISTINCT tickets_id,around_id,t_row,num FROM `tickets` WHERE around_id = '".$_POST['id']."' AND t_row = 'L' AND num = '".$i."' ";
                                $rs_tickets = selectSql($sql_tickets);
                                
                                if($rs_tickets == null )
                                    {
                                        ?>
                                        <a id="chair_movie" price="<?php 
                                        if($row_movie['projection_id']==1){ echo 180;  }
                                        else if($row_movie['projection_id']==2){ echo 210;  } ?>"
                                         row="<?php echo "L" ?>" name="<?php echo $i ?>" 
                                         href="javascrip:void(0)"><div id="imgL_<?php echo $i ?>" >
                                         <img src="img/Deluxe.png" width="45"  class="img-rounded" ></div></a>
                                    <?php
                                    }
                                else{
                                        ?>
                                        <img src="img/busy1.png" width="45"  class="img-rounded" >
                                    <?php
                                    }
                                ?> 
                                </td>
                            <?php }
                            ?>
                            <td> L </td>
                        </tr>
                        <tr class="text-center">
                            <td> K </td>
                            <?php
                            for($i=1;$i<=19;$i++)
                            { ?>
                                <td> <?php
                                $sql_tickets = " SELECT DISTINCT tickets_id,around_id,t_row,num FROM `tickets` WHERE around_id = '".$_POST['id']."' AND t_row = 'K' AND num = '".$i."' ";
                                $rs_tickets = selectSql($sql_tickets);
                                
                                if($rs_tickets == null )
                                    {
                                        ?>
                                        <a id="chair_movie" price="<?php 
                                        if($row_movie['projection_id']==1){ echo 180;  }
                                        else if($row_movie['projection_id']==2){ echo 210;  } ?>" row="<?php echo "K" ?>" name="<?php echo $i ?>" href="javascrip:void(0)">
                                        <div id="imgK_<?php echo $i ?>" ><img src="img/Deluxe.png" width="45"  class="img-rounded" ></div></a>
                                    <?php
                                    }
                                else{
                                        ?>
                                        <img src="img/busy1.png" width="45"  class="img-rounded" >
                                    <?php
                                    }
                                ?> 
                                </td>
                            <?php }
                            ?>
                            <td> K </td>
                        </tr>
                        <tr class="text-center">
                            <td> J </td>
                            <?php
                            for($i=1;$i<=19;$i++)
                            { ?>
                                <td> <?php
                                $sql_tickets = " SELECT DISTINCT tickets_id,around_id,t_row,num FROM `tickets` WHERE around_id = '".$_POST['id']."' AND t_row = 'J' AND num = '".$i."' ";
                                $rs_tickets = selectSql($sql_tickets);
                                
                                if($rs_tickets == null )
                                    {
                                        ?>
                                        <a id="chair_movie" price="<?php 
                                        if($row_movie['projection_id']==1){ echo 180;  }
                                        else if($row_movie['projection_id']==2){ echo 210;  } ?>" row="<?php echo "J" ?>" name="<?php echo $i ?>" href="javascrip:void(0)">
                                        <div id="imgJ_<?php echo $i ?>" ><img src="img/Deluxe.png" width="45"  class="img-rounded" ></div></a>
                                    <?php
                                    }
                                else{
                                        ?>
                                        <img src="img/busy1.png" width="45"  class="img-rounded" >
                                    <?php
                                    }
                                ?> 
                                </td>
                            <?php }
                            ?>
                            <td> J </td>
                        </tr>
                        <tr class="text-center">
                            <td> H </td>
                            <?php
                            for($i=1;$i<=19;$i++)
                            { ?>
                                <td> <?php
                                $sql_tickets = " SELECT DISTINCT tickets_id,around_id,t_row,num FROM `tickets` WHERE around_id = '".$_POST['id']."' AND t_row = 'H' AND num = '".$i."' ";
                                $rs_tickets = selectSql($sql_tickets);
                                
                                if($rs_tickets == null )
                                    {
                                        ?>
                                        <a id="chair_movie" price="<?php 
                                        if($row_movie['projection_id']==1){ echo 180;  }
                                        else if($row_movie['projection_id']==2){ echo 210;  } ?>" row="<?php echo "H" ?>" name="<?php echo $i ?>" href="javascrip:void(0)">
                                        <div id="imgH_<?php echo $i ?>" ><img src="img/Deluxe.png" width="45"  class="img-rounded" ></div></a>
                                    <?php
                                    }
                                else{
                                        ?>
                                        <img src="img/busy1.png" width="45"  class="img-rounded" >
                                    <?php
                                    }
                                ?> 
                                </td>
                            <?php }
                            ?>
                            <td> H </td>
                        </tr>
                        <tr class="text-center">
                            <td> G </td>
                            <?php
                            for($i=1;$i<=19;$i++)
                            { ?>
                                <td> <?php
                                $sql_tickets = " SELECT DISTINCT tickets_id,around_id,t_row,num FROM `tickets` WHERE around_id = '".$_POST['id']."' AND t_row = 'G' AND num = '".$i."' ";
                                $rs_tickets = selectSql($sql_tickets);
                                
                                if($rs_tickets == null )
                                    {
                                        ?>
                                        <a id="chair_movie" price="<?php 
                                        if($row_movie['projection_id']==1){ echo 180;  }
                                        else if($row_movie['projection_id']==2){ echo 210;  } ?>" row="<?php echo "G" ?>" name="<?php echo $i ?>" href="javascrip:void(0)">
                                        <div id="imgG_<?php echo $i ?>" ><img src="img/Deluxe.png" width="45"  class="img-rounded" ></div></a>
                                    <?php
                                    }
                                else{
                                        ?>
                                        <img src="img/busy1.png" width="45"  class="img-rounded" >
                                    <?php
                                    }
                                ?> 
                                </td>
                            <?php }
                            ?>
                            <td> G </td>
                        </tr>
                        <tr class="text-center">
                            <td>
                                <br><br>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td> F </td>
                            <?php
                            for($i=1;$i<=19;$i++)
                            { ?>
                                <td> <?php
                                $sql_tickets = " SELECT DISTINCT tickets_id,around_id,t_row,num FROM `tickets` WHERE around_id = '".$_POST['id']."' AND t_row = 'F' AND num = '".$i."' ";
                                $rs_tickets = selectSql($sql_tickets);
                                
                                if($rs_tickets == null )
                                    {
                                        ?>
                                        <a id="chair_movie" price="<?php 
                                        if($row_movie['projection_id']==1){ echo 180;  }
                                        else if($row_movie['projection_id']==2){ echo 210;  } ?>" row="<?php echo "F" ?>" name="<?php echo $i ?>" href="javascrip:void(0)">
                                        <div id="imgF_<?php echo $i ?>" ><img src="img/Deluxe.png" width="45"  class="img-rounded" ></div></a>
                                    <?php
                                    }
                                else{
                                        ?>
                                        <img src="img/busy1.png" width="45"  class="img-rounded" >
                                    <?php
                                    }
                                ?> 
                                </td>
                            <?php }
                            ?>
                            <td> F </td>
                        </tr>
                        <tr class="text-center">
                            <td> E </td>
                            <?php
                            for($i=1;$i<=19;$i++)
                            { ?>
                                <td> <?php
                                $sql_tickets = " SELECT DISTINCT tickets_id,around_id,t_row,num FROM `tickets` WHERE around_id = '".$_POST['id']."' AND t_row = 'E' AND num = '".$i."' ";
                                $rs_tickets = selectSql($sql_tickets);
                                
                                if($rs_tickets == null )
                                    {
                                        ?>
                                        <a id="chair_movie" price="<?php 
                                        if($row_movie['projection_id']==1){ echo 180;  }
                                        else if($row_movie['projection_id']==2){ echo 210;  } ?>" row="<?php echo "E" ?>" name="<?php echo $i ?>" href="javascrip:void(0)">
                                        <div id="imgE_<?php echo $i ?>" ><img src="img/Deluxe.png" width="45"  class="img-rounded" ></div></a>
                                    <?php
                                    }
                                else{
                                        ?>
                                        <img src="img/busy1.png" width="45"  class="img-rounded" >
                                    <?php
                                    }
                                ?> 
                                </td>
                            <?php }
                            ?>
                            <td> E </td>
                        </tr>
                        <tr class="text-center">
                            <td> D </td>
                            <?php
                            for($i=1;$i<=19;$i++)
                            { ?>
                                <td> <?php
                                $sql_tickets = " SELECT DISTINCT tickets_id,around_id,t_row,num FROM `tickets` WHERE around_id = '".$_POST['id']."' AND t_row = 'D' AND num = '".$i."' ";
                                $rs_tickets = selectSql($sql_tickets);
                                
                                if($rs_tickets == null )
                                    {
                                        ?>
                                        <a id="chair_movie" price="<?php 
                                        if($row_movie['projection_id']==1){ echo 180;  }
                                        else if($row_movie['projection_id']==2){ echo 210;  } ?>" row="<?php echo "D" ?>" name="<?php echo $i ?>" href="javascrip:void(0)">
                                        <div id="imgD_<?php echo $i ?>" ><img src="img/Deluxe.png" width="45"  class="img-rounded" ></div></a>
                                    <?php
                                    }
                                else{
                                        ?>
                                        <img src="img/busy1.png" width="45"  class="img-rounded" >
                                    <?php
                                    }
                                ?> 
                                </td>
                            <?php }
                            ?>
                            <td> D </td>
                        </tr>
                        <tr class="text-center">
                            <td>
                                <br><br>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <?php
                                
                            ?>
                            <td> C </td>
                            <td></td>
                            <?php
                            for($i=1;$i<=17;$i++)
                            { ?>
                                <td> <?php
                                $sql_tickets = " SELECT DISTINCT tickets_id,around_id,t_row,num FROM `tickets` WHERE around_id = '".$_POST['id']."' AND t_row = 'C' AND num = '".$i."' ";
                                $rs_tickets = selectSql($sql_tickets);
                                
                                if($rs_tickets == null )
                                    {
                                        ?>
                                        <a id="chair_movie" price="<?php 
                                        if($row_movie['projection_id']==1){ echo 200;  }
                                        else if($row_movie['projection_id']==2){ echo 230;  } ?>" row="<?php echo "C" ?>" name="<?php echo $i ?>" href="javascrip:void(0)">
                                        <div id="imgC_<?php echo $i ?>" ><img src="img/Premium.png" width="45"  class="img-rounded" ></div></a>
                                    <?php
                                    }
                                else{
                                        ?>
                                        <img src="img/busy1.png" width="45"  class="img-rounded" >
                                    <?php
                                    }
                                ?> 
                                </td>
                            <?php }
                            ?>
                            <td></td>
                            <td> C </td>
                        </tr>
                        <tr class="text-center">
                            <?php
                                
                            ?>
                            <td> B </td>
                            <td></td>
                            <?php
                            for($i=1;$i<=17;$i++)
                            { ?>
                                <td> <?php
                                $sql_tickets = " SELECT DISTINCT tickets_id,around_id,t_row,num FROM `tickets` WHERE around_id = '".$_POST['id']."' AND t_row = 'B' AND num = '".$i."' ";
                                $rs_tickets = selectSql($sql_tickets);
                                
                                if($rs_tickets == null )
                                    {
                                        ?>
                                        <a id="chair_movie" price="<?php 
                                        if($row_movie['projection_id']==1){ echo 200;  }
                                        else if($row_movie['projection_id']==2){ echo 230;  } ?>" row="<?php echo "B" ?>" name="<?php echo $i ?>" href="javascrip:void(0)">
                                        <div id="imgB_<?php echo $i ?>" ><img src="img/Premium.png" width="45"  class="img-rounded" ></div></a>
                                    <?php
                                    }
                                else{
                                        ?>
                                        <img src="img/busy1.png" width="45"  class="img-rounded" >
                                    <?php
                                    }
                                ?> 
                                </td>
                            <?php }
                            ?>
                            <td></td>
                            <td> B </td>
                        </tr>
                        <tr class="text-center">
                            <?php
                                
                            ?>
                            <td> A </td>
                            <td></td>
                            <?php
                            for($i=1;$i<=17;$i++)
                            { ?>
                                <td> <?php
                                $sql_tickets = " SELECT DISTINCT tickets_id,around_id,t_row,num FROM `tickets` WHERE around_id = '".$_POST['id']."' AND t_row = 'A' AND num = '".$i."' ";
                                $rs_tickets = selectSql($sql_tickets);
                                
                                if($rs_tickets == null )
                                    {
                                        ?>
                                        <a onClick="JavaScript:myFunction();" id="chair_movie" price="<?php 
                                        if($row_movie['projection_id']==1){ echo 200;  }
                                        else if($row_movie['projection_id']==2){ echo 230;  } ?> " row="<?php echo "A" ?>" name="<?php echo $i ?>" href="javascrip:void(0)">
                                        <div id="imgA_<?php echo $i ?>" ><img id="testtt" src="img/Premium.png" width="45"  class="img-rounded" ></div></a>
                                    <?php
                                    }
                                else{
                                        ?>
                                        <img src="img/busy1.png" width="45"  class="img-rounded" >
                                    <?php
                                    }
                                ?> 
                                </td>
                            <?php }
                            ?>
                            <td></td>
                            <td> A </td>
                        </tr>
                        <tr class="text-center">
                            <td>
                                <br>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td> AA </td>
                            <td></td>
                            <td></td>
                            <?php
                            for($i=1;$i<=5;$i++)

                            { ?>
                                 <?php
                                $sql_tickets = " SELECT DISTINCT tickets_id,around_id,t_row,num FROM `tickets` WHERE around_id = '".$_POST['id']."' AND t_row = 'AA' AND num = '".$i."' ";
                                $rs_tickets = selectSql($sql_tickets);
                                
                                if($rs_tickets == null )
                                    {
                                        ?><td>
                                        <a  id="chair_movie" name="<?php echo $i ?>" price="<?php 
                                        if($row_movie['projection_id']==1){ echo 500;  }
                                        else if($row_movie['projection_id']==2){ echo 550;  }?>" row="<?php echo "AA" ?>" href="javascrip:void(0)" >
                                        <div id="imgAA_<?php echo $i ?>" ><img  src="img/SofaSweet.png" width="45"  class="img-rounded" ></div></a>
                                        </td>
                                        <td>
                                            <a id="chair_movie" name="<?php echo $i ?>" price="<?php 
                                        if($row_movie['projection_id']==1){ echo 500;  }
                                        else if($row_movie['projection_id']==2){ echo 550;  }?>" row="<?php echo "AA" ?>"  href="javascrip:void(0)" >
                                        <div id="imgAA_<?php echo $i ?>" ><img src="img/SofaSweet.png" width="45"  class="img-rounded" ></div></a>
                                        </td>
                                        <td></td>
                                        
                                    <?php
                                    } 
                                else{
                                        ?><td>
                                            <img src="img/busy2.png" width="45"  class="img-rounded" >
                                        </td>
                                        <td>
                                            <img src="img/busy2.png" width="45"  class="img-rounded" >
                                        </td>
                                        <td></td>
                                    <?php
                                    }
                                ?> 
                                

                            <?php }
                            ?>
                            <td></td>
                            <td></td>
                            <td> AA </td>
                        </tr>
                        <tr class="text-center">
                            <td>
                                <br><br>
                            </td>
                        </tr>
    </table>
                
 <?php } ?>
<script type="text/javascript">

$("*[id^=chair_movie]").click(function()
  {
    var row = $(this).attr('row');
    var id = $(this).attr('name');
    var price = $(this).attr('price');
    var id_round = $("#round").val();
    //alert(id_round);
    $("#reservations").load("systems/movie_reservations.php",
    { 
        id_round : id_round,
        row : row,
        id : id ,
        price : price
    });
  });

function myFunction() {
    document.getElementById("#testtt").src="img/check2.png";
}
<?php
for($xm=1;$m<=19;$m++)
{ ?>    
    $("#imgM_<?php echo $m ?>").click(function()
    {
        //alert("asdfasdf");
        //$("*[id^=img_scess]").load("systems/imgs.php");
        $("#imgM_<?php echo $m ?>").load("systems/imgs.php");
    });
<?php } 
?>
<?php
for($l=1;$l<=19;$l++)
{ ?>    
    $("#imgL_<?php echo $l ?>").click(function()
    {
        //alert("asdfasdf");
        //$("*[id^=img_scess]").load("systems/imgs.php");
        $("#imgL_<?php echo $l ?>").load("systems/imgs.php");
    });
<?php } 
?>
<?php
for($k=1;$k<=19;$k++)
{ ?>    
    $("#imgK_<?php echo $k ?>").click(function()
    {
        //alert("asdfasdf");
        //$("*[id^=img_scess]").load("systems/imgs.php");
        $("#imgK_<?php echo $k ?>").load("systems/imgs.php");
    });
<?php } 
?>
<?php
for($j=1;$j<=19;$j++)
{ ?>    
    $("#imgJ_<?php echo $j ?>").click(function()
    {
        //alert("asdfasdf");
        //$("*[id^=img_scess]").load("systems/imgs.php");
        $("#imgJ_<?php echo $j ?>").load("systems/imgs.php");
    });
<?php } 
?>
<?php
for($h=1;$h<=19;$h++)
{ ?>    
    $("#imgH_<?php echo $h ?>").click(function()
    {
        //alert("asdfasdf");
        //$("*[id^=img_scess]").load("systems/imgs.php");
        $("#imgH_<?php echo $h ?>").load("systems/imgs.php");
    });
<?php } 
?>
<?php
for($g=1;$g<=19;$g++)
{ ?>    
    $("#imgG_<?php echo $g ?>").click(function()
    {
        //alert("asdfasdf");
        //$("*[id^=img_scess]").load("systems/imgs.php");
        $("#imgG_<?php echo $g ?>").load("systems/imgs.php");
    });
<?php } 
?>
<?php
for($f=1;$f<=19;$f++)
{ ?>    
    $("#imgF_<?php echo $f ?>").click(function()
    {
        //alert("asdfasdf");
        //$("*[id^=img_scess]").load("systems/imgs.php");
        $("#imgF_<?php echo $f ?>").load("systems/imgs.php");
    });
<?php } 
?>
<?php
for($e=1;$e<=19;$e++)
{ ?>    
    $("#imgE_<?php echo $e ?>").click(function()
    {
        //alert("asdfasdf");
        //$("*[id^=img_scess]").load("systems/imgs.php");
        $("#imgE_<?php echo $e ?>").load("systems/imgs.php");
    });
<?php } 
?>
<?php
for($d=1;$d<=19;$d++)
{ ?>    
    $("#imgD_<?php echo $d ?>").click(function()
    {
        //alert("asdfasdf");
        //$("*[id^=img_scess]").load("systems/imgs.php");
        $("#imgD_<?php echo $d ?>").load("systems/imgs.php");
    });
<?php } 
?>
<?php
for($c=1;$c<=17;$c++)
{ ?>    
    $("#imgC_<?php echo $c ?>").click(function()
    {
        //alert("asdfasdf");
        //$("*[id^=img_scess]").load("systems/imgs.php");
        $("#imgC_<?php echo $c ?>").load("systems/imgs.php");
    });
<?php } 
?>
<?php
for($b=1;$b<=17;$b++)
{ ?>    
    $("#imgB_<?php echo $b ?>").click(function()
    {
        //alert("asdfasdf");
        //$("*[id^=img_scess]").load("systems/imgs.php");
        $("#imgB_<?php echo $b ?>").load("systems/imgs.php");
    });
<?php } 
?>
<?php
for($a=1;$a<=17;$a++)
{ ?>    
    $("#imgA_<?php echo $a ?>").click(function()
    {
        //alert("asdfasdf");
        //$("*[id^=img_scess]").load("systems/imgs.php");
        $("#imgA_<?php echo $a ?>").load("systems/imgs.php");
    });
<?php } 
?>
<?php

for($aa=1;$aa<=5;$aa++)
{ ?>    
    $("*[id^=imgAA_<?php echo $aa ?>]").click(function()
    {
        //alert("asdfasdf");
        //$("*[id^=img_scess]").load("systems/imgs.php");
        $("*[id^=imgAA_<?php echo $aa ?>]").load("systems/imgs.php");
    });
<?php } 
?>


</script>    

