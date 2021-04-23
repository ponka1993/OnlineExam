<?php
session_start();
include('includes/function.php');
$pageid=8;
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
              <h2 align="center"><strong>BANK DETAILS</strong></h2>
              <p align="center">AXIS BANK</p>
			  <p align="center">Account Holder Name – ANANDA DEBNATH</p>
			  <p align="center">Account No. – 916010069168911</p>
              <p align="center">IFSC Code - UTIB0000729</p>
            </article>
          </li>
          <li class="one_half">
            <article>
              <h2 align="center"><strong>OUR CITY OFFICE ADDRESS</strong></h2>
              <p align="center">City Office :Madhab More,<br> Union Bank 2nd Floor in front of Mc Willam 2nd Floor <br> 736122</p>
			 
              
            </article>
          </li>
          
        </ul>
      </div>
       <div id="comments">
        <h2><strong>Contact Us</strong></h2>
		<?php if($_REQUEST['m']==1){?><div align="center" style="color:#00CC33;">Your message sucessfully sent.  Our support team will Contact with you shortly!</div><?php }?>
        <form name="contact" action="contact-process.php" method="post" >
          <div class="one_third first">
            <label for="name">Name <span>*</span></label>
            <input type="text" name="name" id="name" value="" required placeholder="Enter Name" >
          </div>
          <div class="one_third">
            <label for="email">Mail <span>*</span></label>
            <input type="text" name="email" id="email" value="" required placeholder="Enter Email" >
          </div>
          <div class="one_third">
            <label for="url">Phone <span>*</span></label>
            <input type="text" name="phone" id="phone" value="" required placeholder="Enter Phone" >
          </div>
          <div class="block clear">
            <label for="comment">Message <span>*</span></label>
            <textarea name="message" id="message" required placeholder="Enter Message" ></textarea>
          </div>
          <div>
            <input name="submit" type="submit" value="Send Message">
         
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
</body>
</html>