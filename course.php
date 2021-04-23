<?php
session_start();
include('includes/function.php');
$pageid=6;
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
      <h1><strong>Course</strong></h1>
      <div class="scrollable">
        <table>
          <thead>
            <tr>
              <th>Course Name</th>
              <th>Duration</th>
              <th>Fees</th>
              
            </tr>
          </thead>
          <tbody>
		  <?php
         $sql="SELECT * FROM `study_course` WHERE `status`='A' ORDER BY `id` DESC";
         $res=query($sql);
         $num=numrows($res);
         $i=1;
         if($num>0)
         {
         while($fetch=fetcharray($res))
         {
         if($i%2==0){$class='class1';}else{$class='class2';}
         ?>
            <tr class="<?=$class?>">
              <td><?=$fetch['course']?></td>
              <td><?php if($fetch['duration']){?><?=$fetch['duration']?><?php }else{?>--<?php }?></td>
              <td><?php if($fetch['duration']){?>Rs.<?=$fetch['fees']?><?php }else{?>--<?php }?></td>
              </tr>
            <?php $i++;}} else{?>
			<tr><td colspan="3" align="center">No Record Found</td></tr>
			<?php }?>
          </tbody>
        </table>
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