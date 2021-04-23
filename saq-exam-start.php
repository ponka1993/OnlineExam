<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['uid']))
{
redirect('index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
<title>People Can Show Miracle</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="layout/styles/pagination.css" rel="stylesheet" type="text/css">
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
<script type="text/javascript">
function viewAnswer(id)
{
if(document.getElementById('answerdiv'+id).style.display=='none')
{
document.getElementById('answerdiv'+id).style.display='inline';
}
else{
document.getElementById('answerdiv'+id).style.display='none';
}
}
</script>
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
     <div id="bookDiv">
     <p align="center" style="line-height:20px;font-size:20px;">Welcome <span style="color:#7d1935"><?=getStudent($_SESSION['uid'],'name')?></span></p>
     <p align="center" style="line-height:30px;font-size:17px;"><span style="color:#FF0000;">Course:</span>&nbsp;</strong><?=getCourse(getStudent($_SESSION['uid'],'course'), 'course')?>&nbsp;&nbsp;<span style="color:#FF0000;">Subject:</span>&nbsp;&nbsp;</strong><?=getSubject(getStudent($_SESSION['uid'],'subject'),'subject')?>&nbsp;&nbsp;<span style="color:#FF0000;">Registration ID:</span>&nbsp;</strong><?=getStudent($_SESSION['uid'],'registration_id')?></p>
	 <?php
     $course=getCourseDetails($_SESSION['uid'],'course');
     $subject=getSubjectDetails($_SESSION['uid'],'subject');
     ?>
	 
	 <p align="center" style="font-size:20px;">Practice SAQ ( <?=getSubject($subject,'subject')?> - <?=$_REQUEST['chapter']?> )</p>
     <p>&nbsp;</p>
     
    <?php 
    $tname='study_question_saq';
    $lim=10;
    $tpage='saq-exam-start.php?chapter='.$_REQUEST['chapter'];
    $where=" WHERE `course`='".getCourseDetails($_SESSION['uid'],'course')."' AND `subject`='".getSubjectDetails($_SESSION['uid'],'subject')."' AND `chapter`='".addslashes( $_REQUEST['chapter'])."' ORDER BY `id` DESC";
    include('pagination1.php');
    $numsaq=numrows($result);
    if($numsaq){
    $i=1;
    while($fetchsaq=fetcharray($result))
    {
    ?>
   <div id="saqdiv">
   <p><?=$i?>) <?=stripslashes($fetchsaq['question'])?> </p>
   <div id="viewansdiv"><a onClick="viewAnswer(<?=$fetchsaq['id']?>);" style="cursor:pointer; color:#0033FF;">View Answer / Explanation</a></div>
   <div id="answerdiv<?=$fetchsaq['id']?>" style="display:none;">
   <div class="answer">
   <div class="ans"><strong>Answer : </strong><?=stripslashes($fetchsaq['answer'])?></div>
   </div>
   </div>
   </div>
   <?php $i++;}}?>
   <p>&nbsp;</p>
  <div align="center"><?=$pagination?></div>
  </div>
       
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