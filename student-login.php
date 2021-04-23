<?php
session_start();
include('includes/function.php');
$pageid=3;
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
      <div id="portfolio">
        <ul class="nospace clear">
          <li class="one_half first">
            <article>
              <div id="comments">
	         <h2><strong>Student Login(<font color="#FF0000">*</font>) Mandatory Field</strong></h2>
			  <?php if($_REQUEST['m']=='1'){?>
              <p align="center" style="color:#FF0000;"><strong>Invalid Registration ID or Password!</strong></p>
              <?php }?>
			   <form action="student-login-process.php" method="post">
              <div class="one_half first"><div class="block clear">
              <label for="comment" style="padding-left:5px;">Registration ID<span>*</span></label>
              <input type="text" name="registration_id" id="registration_id" required placeholder="Enter Registration ID">
              </div></div>
              <div class="one_half"><div class="block clear">
              <label for="comment" style="padding-left:5px;">Password<span>*</span></label>
              <input type="password" name="password" id="password" class="inputbox" required placeholder="Enter Password">
             </div></div>
		   <div class="one_half first"><input name="submit" type="submit" value="SUBMIT"></div>
		</form>
      </div>
            </article>
          </li>
          <li class="one_half">
            <article>
              <h2><strong>New Student Registration</strong></h2>
              <p align="justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
              <p class="right"><a href="student-registration.php">New Registration</a></p>
            </article>
          </li>
        </ul>
      </div>
      <div id="twitter" class="group btmspace-50">
        <div class="one_quarter first center"><a href="contact.php"><img src="images/student.png"></i><br>
          Follow Us</a></div>
        <div class="three_quarter bold">
          <p>WHAT OUR STUDENT ARE SAYING... </p>
		  <p align="justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy </p>
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