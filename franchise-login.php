<?php
session_start();
include('includes/function.php');
$pageid=4;
?>
<!DOCTYPE html>
<html>
<head>
<title>Myeduteacher</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
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
      <div class="wrapper row3">
  <div class="rounded">
    <div class="container clear"> 
      <!-- section content --> 
     <div class="group">
	   <div id="comments">
	   <h2><strong>Franchise Login(<font color="#FF0000">*</font>) Mandatory Field</strong></h2>
			   <?php if($_REQUEST['m']=='1'){?>
              <p align="center" style="color:#FF0000;"><strong>Invalid Franchise ID or Password!</strong></p>
              <?php }?>
			   <form action="franchise-login-process.php" method="post">
        <div class="one_half first"><div class="block clear">
              <label for="comment">Franchise ID<span>*</span></label>
              <input type="text" name="franchise_id" id="franchise_id" required placeholder="Enter  Franchise ID">
            </div></div>
        <div class="one_half"><div class="block clear">
              <label for="comment">Password<span>*</span></label>
              <input type="password" name="password" id="password"  required placeholder="Enter Password">
            </div></div>
		<div class="one_half first"><input name="submit" type="submit" value="Submit Form"></div>
		</form>
      </div>
     
      <div class="clear"></div>
	  </div>
	  <!-- section content --> 
    </div>
  </div>
</div>
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

</body>
</html>