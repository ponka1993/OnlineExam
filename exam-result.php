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
<title>Myeduteacher</title>
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
<script type="text/javascript" language="javascript">
function nextval(ques_id,exam_id)
{
window.location.href='online-exam-start.php?ques_id='+ques_id+'&exam='+exam_id;
}

function preval(ques_id,exam_id)
{
window.location.href='online-exam-start.php?ques_id='+ques_id+'&exam='+exam_id;
}


function getTestAnswer(ans,ques,cou,subj)
{
document.frm2.ans.value=ans;
document.frm2.ques_idn.value=ques;
document.frm2.course.value=cou;
document.frm2.subj.value=subj;
}

function saveTestAnswer(exam_id)
{
window.location.href='exam-submit-process.php?exam='+exam_id;
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
<p align="center" style="line-height:20px;font-size:20px; padding-left:25px;">Welcome <span style="color:#7d1935"><?=ucwords(getStudent($_SESSION['uid'],'name'))?></span></p>
<p align="center" style="line-height:30px;font-size:20px;"><span style="color:#FF0000;">Course:</span>&nbsp;<?=getCourse(getStudent($_SESSION['uid'],'course'),'course')?>&nbsp;&nbsp;<span style="color:#FF0000;">Subject:</span>&nbsp;<?=getSubject(getStudent($_SESSION['uid'],'subject'),'subject')?>&nbsp;&nbsp;<span style="color:#FF0000;">Registration ID:</span>&nbsp;<?=getStudent($_SESSION['uid'],'registration_id')?></p>


<?php 
$sql="SELECT * FROM `study_student_exam_result` WHERE `uid`='".$_SESSION['uid']."' AND `course`='".getStudent($_SESSION['uid'],'course')."' ORDER BY `id` DESC LIMIT 0,1";
$res=query($sql);
$fetch=fetcharray($res);
?>
<h3 align="center"><?=getExam($fetch['exam_id'],'ename')?></h3>
<div class="scrollable">
<table>

<tbody>
<tr>
<td class="class1">Student</td>
<td class="class1"><?=getStudent($fetch['uid'],'name')." ( Reg. No. - ".getStudent($fetch['uid'],'registration_id')." )"?></td>

</tr>
<tr>
<td class="class2">Course</td>
<td class="class2"><?=getCourse($fetch['course'],'course')?></td>

</tr>
<tr>
<td class="class1">Subject</td>
<td class="class1"><?=getSubject($fetch['subject'],'subject')?></td>

</tr>
<tr>
<td class="class2">Exam Date</td>
<td class="class2"><?=$fetch['exam_date']?></td>

</tr>
<tr>
<td class="class1">Total Question</td>
<td class="class1"><?=$fetch['total_question']?></td>

</tr>

<tr>
<td class="class2">Attempt Question</td>
<td class="class2"><?=$fetch['attempt_question']?></td>

</tr>

<tr>
<td class="class1">Right Answer</td>
<td class="class1"><?=$fetch['right_answer']?></td>

</tr>

<tr>
<td class="class2">Total Marks</td>
<td class="class2"><?=$fetch['total_marks']?></td>

</tr>

<tr>
<td class="class1">Marks Obtain</td>
<td class="class1"><?=round($fetch['total_marks_obtain'],2)?></td>

</tr>
</tbody>
</table>
</div>


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