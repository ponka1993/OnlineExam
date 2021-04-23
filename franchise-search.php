<?php
session_start();
include('includes/function.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>People Can Show Miracle</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="layout/styles/jquery-ui.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
 <div class="wrapper row1">
  <?php include('header-mid.php')?>
</div>
<div class="wrapper row2">
  <?php include('menu.php')?>
</div>
<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      
      <?php
	  $sql="SELECT * FROM `study_franchise` WHERE `franname`='".$_REQUEST['search']."' AND `status`='A' ";
	  $res=query($sql);
	  $num=numrows($res);
	  if($num>0)
	  {
	  $fetch=fetcharray($res)
	  ?>
	  
	  <div id="twitter" class="group btmspace-50" style="background-color:#FFFFFF; border:1px solid #dcdee3; color:#000000;">
         <p align="center">Franchise Name:&nbsp;<?=$fetch['franname']?>&nbsp;|&nbsp;&nbsp;Franchise ID:<?=$fetch['franchise_id']?></p>
		  <p align="center">Person Name: &nbsp;<?=$fetch['pname']?> </p>
		  <p align="center">EmailID:&nbsp;<?=$fetch['email']?>&nbsp;|&nbsp;&nbsp;Phone No:<?=$fetch['phone']?></p>
		  <p align="center">Address: &nbsp;<?=stripslashes($fetch['address'])?> </p>
		   <p align="center">Pin: &nbsp;<?=$fetch['pincode']?> </p>
        </div>
      <?php } else{?>
	  <p>&nbsp;</p>
	  <div id="twitter" class="group btmspace-50" style="background-color:#FFFFFF; border:1px solid #dcdee3; color:#000000;" align="center">No Record Found!</div>
	  <?php }?>
       
      <!-- / main body -->
      <div class="clear"></div>
    </main>
  </div>
</div>
<div class="wrapper row4">
  <?php include('footer-top.php')?>
</div>
<div class="wrapper row5">
  <?php include('footer.php')?>
</div>
<!-- JAVASCRIPTS --> 
<script src="layout/scripts/jquery.min.js"></script> 
<script src="layout/scripts/jquery.fitvids.min.js"></script> 
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script src="js/jquery-ui.js" type="text/javascript"></script>
<script src="js/jquery.min.js" type="text/javascript" ></script>
<script src="js/ajax.js" type="text/javascript"></script>
</body>
</html>