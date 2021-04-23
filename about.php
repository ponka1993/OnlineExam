<?php
session_start();
include('includes/function.php');
$pageid=2;
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
	  <?php
      $sql="SELECT * FROM `study_about` ORDER BY `id` DESC";
      $res=query($sql);
      $num=numrows($res);
      if($num>0)
      {
      $fetch=fetcharray($res);
      ?>
      <div id="portfolio">
        <ul class="nospace clear">
          <li class="one_half first">
            <article><img class="borderedbox" src="administrator/about/<?=$fetch['image']?>" alt="">
            </article>
          </li>
          <li class="one_half">
            <article>
            <p><?=stripslashes($fetch['content'])?></p>
            </article>
          </li>
        </ul>
      </div>
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
</body>
</html>