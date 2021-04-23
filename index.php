<?php
session_start();
include('includes/function.php');
$pageid=1;

$ip=$_SERVER['REMOTE_ADDR'];
$sql="SELECT * FROM `study_visit` WHERE `ipaddress`='".$ip."'";
$res=query($sql);
$num=numrows($res);
$fetch=fetcharray($res);
if($num>0)
{
$visit=$fetch['visit']+1;
$sql2="UPDATE `study_visit` SET `visit`='".$visit."' WHERE `ipaddress`='".$ip."'";
$res2=query($sql2);
}
else
{
$sql2="INSERT INTO `study_visit`(`ipaddress`,`visit`,`date`) values('".$ip."','1','".date('Y-m-d')."')";
$res2=query($sql2);
}
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

<div class="wrapper" style="width:100%">
  <div id="slider">
    <div id="slide-wrapper" class="rounded clear" style="height:320px;">
	  <div id="slides">
       <div class="slides_container">
       <?php
       $sql="SELECT * FROM `study_banner` ORDER BY `id` DESC";
       $res=query($sql);
       $num=numrows($res);
       if($num>0)
       {
       while($fetch=fetcharray($res))
       {
       ?>
       <div class="slide"><img src="administrator/banner/<?=$fetch['image']?>"/></div>
       <?php }}?>
       </div>
       </div>
	     
	 
    </div>
  </div>
</div>
<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      
      <div class="sidebar one_third first"> 
        
        <h6>Current News and Events</h6>
        <marquee behavior="scroll" direction="up" height="280" onMouseOver="this.setAttribute('scrollamount',0,0);" onMouseOut="this.setAttribute('scrollamount',2);"    scrollamount="2">
			<?php 
            $sqlnews="SELECT * FROM `study_news` ORDER BY `id` DESC";
            $resnews=query($sqlnews);
            $nonews=numrows($resnews);
            if($nonews>0)
			{
            while($fetchnews=fetcharray($resnews))
            {
            ?>
			
			 <p><?=stripslashes($fetchnews['news'])?></p>
            <?php }}?>
			</marquee>
        </div>
        <div id="content" class="two_third"> 
        <h1>Welcome our website</h1>
		<p class="nospace btmspace-15"><a href="#"><span style="font-size:24px; color:#003b64;"><?=stripslashes(getCms(1,'pagename'))?>&nbsp;(Welcome)!</span></a></p>
        <p><?=stripslashes(getCms(1,'content'))?></p>
		<div>&nbsp;</div>
        <p class="nospace btmspace-15"><a href="#"><span style="font-size:24px; color:#003b64;"><?=stripslashes(getCms(2,'pagename'))?>&nbsp;(Our Mission)!</span></a></p>
        <p><?=stripslashes(getCms(2,'content'))?></p>
		<div>&nbsp;</div>
		<p class="nospace btmspace-15"><span style="font-size:24px; color:#003b64;"><?=stripslashes(getCms(3,'pagename'))?>&nbsp;(Our Activities)!</span></p>
        <p><?=stripslashes(getCms(3,'content'))?></p>
        
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

<script src="js/jquery.min.js" type="text/javascript" ></script>
<script src="js/slides.min.jquery.js" type="text/javascript" ></script>
<script type="text/javascript"  src="js/slide.js"></script>
</body>
</html>