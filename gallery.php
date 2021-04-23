<?php
session_start();
include('includes/function.php');
$pageid=7;
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
      
      <div id="gallery">
        <figure>
          <header class="heading">Latest Gallery</header>
		  <ul class="nospace clear"> 
		      <?php
              $tname='study_gallery';
              $lim=12;
              $tpage='gallery.php';
              $where="ORDER BY `id` DESC";
              include('pagination.php');
              $num=numrows($result);
              if($num>0)
              {
              $i=1;
              while($fetch=fetcharray($result))
              {
			  if($i%4==1){$check=1;}else{$check=0;}
              ?>
            <li class="one_quarter <?php if($check==1){?>first<?php }?>"><a class="nlb" data-lightbox-gallery="gallery1" href="administrator/galleryBig/<?=$fetch['images']?>" title="Gallery Image"><img class="borderedbox" img src="administrator/gallery/<?=$fetch['images']?>" alt="" /></a></li>
			<?php if($i%4==0){echo '</li><li height="20">';} $i++;}}?>
          </ul>
           
        </figure>
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
<script src="layout/scripts/nivo-lightbox/nivo-lightbox.min.js"></script>
</body>
</html>