<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['fid']))
{
redirect('index.php');
}
$pageid=4;
?>

<!DOCTYPE html>
<html>
<head>
<title>People Can Show Miracle</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<!-- / Demo styling - remove before use -->
<style type="text/css">
.container .group{text-align:center;}
.container .group div{padding:8px 0; font-size:16px; font-family:Verdana, Geneva, sans-serif;}
.container .group div:nth-child(odd){color:#FFFFFF; background:#CCCCCC;}
.container .group div:nth-child(even){color:#FFFFFF; background:#979797;}
@media screen and (min-width:180px) and (max-width:900px) {
	.container .group div{margin-bottom:0;}
}
</style>
<!-- / Demo styling -->
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
	  <p>&nbsp;</p>
      <p align="center" style="line-height:23px;font-size:20px; color:#FF0000">Welcome <span style="color:#7d1935"><?=getFranchise($_SESSION['fid'],'franname')?></span>&nbsp;&nbsp;Registratiotn ID&nbsp;<span style="color:#7d1935"><?=getFranchise($_SESSION['fid'],'franchise_id')?></span>	</p>
	  
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
       
      <!-- / main body -->
      <div class="clear"></div>
    </main>
  </div>
</div>
<!-- section 1 --> 
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
</body>
</html>