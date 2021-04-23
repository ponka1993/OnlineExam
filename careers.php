<?php
session_start();
include('includes/function.php');
$pageid=5;
?>
<!DOCTYPE html>
<html>
<head>
<title>Myeduteacher</title>
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
      
      <div id="comments">
       <h2><strong>(<font color="#FF0000">*</font>) Mandatory Field</strong></h2>
	    <?php if($_REQUEST['m']=='1'){?><p align="center" style="color:#009900;"><strong>Your Request send to Adminstrator!</strong></p><?php }?>
        <?php if($_REQUEST['m']=='2'){?><p align="center" style="color:#FF0000;"><strong>File format not supported!</strong></p><?php }?>
        <form action="careers-process.php" method="post" enctype="multipart/form-data">
		 <div class="one_third first">
            <label for="name">Name <span>*</span></label>
            <input type="text" name="name" id="name" value="" required placeholder="Enter Name">
          </div>
          <div class="one_third">
            <label for="email">Mobile Number <span>*</span></label>
             <input type="text" name="mobile" id="mobile" value="" required placeholder="Enter Mobile">
            </div>
          <div class="one_third">
            <label for="url">Email</label>
            <input type="text" name="email" id="email" value="" required placeholder="Enter Email">
          </div>
		  
		  <div class="one_third first">
            <label for="name">Resume <span>*</span></label>
             <input type="file" name="file" id="file" required />
          </div>
		  <div class="specer">&nbsp;</div>
          <div>
            <input name="submit" type="submit" value="Submit"> 
          </div>
        </form>
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
<script src="js/jquery-ui.js" type="text/javascript"></script>
<script src="js/jquery.min.js" type="text/javascript" ></script>
<script src="js/ajax.js" type="text/javascript"></script>
</body>
</html>