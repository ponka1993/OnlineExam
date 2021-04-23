<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['uid']))
{
redirect('index.php');
}
$pageid=3;
?>
<!DOCTYPE html>
<html>
<head>
<title>People Can Show Miracle</title>
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
<p style="padding-right:15px;"><img class="imgr borderedbox" src="student/<?=getStudent($_SESSION['uid'],'photo')?>" alt=""></p>
<p align="center" style="line-height:20px;font-size:20px; padding-left:25px;">Welcome <span style="color:#7d1935"><?=ucwords(getStudent($_SESSION['uid'],'name'))?></span></p>
<p align="center" style="line-height:30px;font-size:20px;"><span style="color:#FF0000;">Course:</span>&nbsp;<?=getCourse(getStudent($_SESSION['uid'],'course'),'course')?>&nbsp;&nbsp;<span style="color:#FF0000;">Subject:</span>&nbsp;<?=getSubject(getStudent($_SESSION['uid'],'subject'),'subject')?>&nbsp;&nbsp;<span style="color:#FF0000;">Registration ID:</span>&nbsp;<?=getStudent($_SESSION['uid'],'registration_id')?></p>
<p align="center" style="font-size:22px;">Practice SAQ</p>
<div class="specer">&nbsp;</div>
<h1 align="center"><strong>Chapter</strong></h1>
<div class="scrollable">
<table style="width:80%" align="center">
<thead>
<tr>
<th align="center">Chapter</th>

</tr>
</thead>
<tbody>
<?php
$sql="SELECT DISTINCT `chapter`,`subject` FROM `study_question_saq` WHERE `course`='".getCourseDetails($_SESSION['uid'],'course')."' AND `subject`='".getSubjectDetails($_SESSION['uid'],'subject')."' ORDER BY `chapter` ASC";
$res=query($sql);
$num=numrows($res);
if($num>0)
{
$i=1;
while($fetch=fetcharray($res))
{
if($i%2==0){$class='class1';}else{$class='class2';}
?>

<tr class="<?=$class?>">
<td align="center"><a href="saq-exam-start.php?chapter=<?=$fetch['chapter']?>" style="text-decoration:none; color:#000000;"><?=$fetch['chapter']?></a></td>
<?php $i++;}} else{?>
<tr><td align="center">No Record Found</td></tr>
<?php }?>

</tr>

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