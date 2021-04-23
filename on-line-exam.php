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
	 <p>&nbsp;</p>
	 
     <?php 
$arr1=array();
$arr2=array();
$sql1="SELECT * FROM `study_exam` WHERE `course`='".getStudent($_SESSION['uid'],'course')."' AND `status`='A' AND `date`='".date('Y-m-d')."'";
$res1=query($sql1);
$num1=numrows($res1);
if($num1>0)
{$e1=0;
while($fetch1=fetcharray($res1))
{
$arr1[$e1]=$fetch1['id'];
$e1++;
}
}

$sql2="SELECT * FROM `study_student_exam_result` WHERE `course`='".getStudent($_SESSION['uid'],'course')."' AND `uid`='".$_SESSION['uid']."'";
$res2=query($sql2);
$num2=numrows($res2);
if($num2>0)
{$e2=0;
while($fetch2=fetcharray($res2))
{
$arr2[$e2]=$fetch2['exam_id'];
$e2++;
}
}

$arr3=array();
$arr3=array_diff($arr1,$arr2);
sort($arr3);

if(count($arr3)>0){
?>
<div class="scrollable">
<table>
          <thead>
            <tr>
              <th>SL NO</th>
              <th>Exam Name</th>
              <th>Duration&nbsp;(Seconds)</th>
			  <th>NOQ</th>
              
            </tr>
          </thead>
          <tbody>
		  <?php for($i=0;$i<count($arr3);$i++){
          if($i%2==0){$class='class1';}else{$class='class2';}
          $sql="SELECT * FROM `study_exam` WHERE `id`='".$arr3[$i]."' AND `status`='A' AND `date`='".date('Y-m-d')."'";
          $res=query($sql);
          $fetch=fetcharray($res);
          ?>
            <tr class="<?=$class?>">
              <td><?=$i+1?></td>
			  <?php $numt=tempExam($_SESSION['uid']); ?> 
              <td><strong><?php if($numt<1) {?><a href="online-exam-question.php?exam=<?=$fetch['id']?>" style="cursor:pointer; text-decoration:none;"><?=$fetch['ename']." - ".getSubject($fetch['subject'],'subject')?></a><?php } else { ?><?=$fetch['ename']." - ".getSubject($fetch['subject'],'subject')?><?php } ?></strong></td>
              <td><?=$fetch['duration']?></td>
			  <td><?=$fetch['noq']?></td>
              </tr>
           <?php }?>
		   
          </tbody>
        </table>
</div>
	  <?php }else{?>
      <p>&nbsp;</p>
      <p style="color:#FF0000;" align="center"><strong>No Exam Found!</strong></p>
      <p>&nbsp;</p>
      <?php }?>
		
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