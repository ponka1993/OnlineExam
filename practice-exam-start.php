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
<script type="text/javascript" src="js/ajax.js"></script>
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
<script>
function getTestAnswer(answer,ques,course,subject,chapter)
{
xmlhttp.open('GET','check-practice-exam-answer.php?ques='+ques+'&answer='+answer+'&course='+course+'&subject='+subject+'&chapter='+chapter);
xmlhttp.onreadystatechange=getsendRequest1;
xmlhttp.send();
}
function getsendRequest1()
{
if(xmlhttp.readyState==4)
{
if(xmlhttp.status==200)
{
var response=xmlhttp.responseText;
document.getElementById('viewStudentdiv').innerHTML=response;
}
}
}
function closeDiv()
{
document.getElementById('view1').style.display='none';
document.getElementById('view2').style.display='none';
}
</script>
<script type="text/javascript" language="javascript">
function nextval(id,chapter)
{
window.location.href='practice-exam-start.php?chapter='+chapter+'&ques_id='+id;
}
function preval(id,chapter)
{
window.location.href='practice-exam-start.php?chapter='+chapter+'&ques_id='+id;
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
<p align="center" style="font-size:18px;">Practice MCQ ( <?=getSubject($subject,'subject')?> - <?=$_REQUEST['chapter']?> )</p>
<p>&nbsp;</p>

<?php 
$sqlpq="SELECT * FROM `study_exam_question` WHERE `course`='".$course."' AND `subject`='".$subject."' AND `chapter`='".addslashes($_REQUEST['chapter'])."'";
$respq=query($sqlpq);
$numpq=numrows($respq);
if($numpq>0){
$arr=array();
$i=0;
while($fetchpq=fetcharray($respq))
{
$arr[$i]=$fetchpq['id'];
$i++;
}
if($_REQUEST['ques_id'])
{
$sql2="SELECT * FROM `study_exam_question` WHERE `course`='".$course."' AND `subject`='".$subject."' AND `chapter`='".addslashes($_REQUEST['chapter'])."' AND `id`='".$_REQUEST['ques_id']."'";
}
else
{
$sql2="SELECT * FROM `study_exam_question` WHERE `course`='".$course."' AND `subject`='".$subject."' AND `chapter`='".addslashes($_REQUEST['chapter'])."' AND `id`='".$arr[0]."' LIMIT 0,1";
}
$res2=query($sql2);
$num2=numrows($res2);
$fetch2=fetcharray($res2);

$count=count($arr);

if($_REQUEST['ques_id'])
{
for($k=0;$k<$count;$k++)
{
if($arr[$k]==$_REQUEST['ques_id'])
{
$next=$k+1;
}
}
}
else
{
$next=1;
}
if(!$_REQUEST['ques_id'])
{
$ques_id=$arr[0];
}
else{
$ques_id=$_REQUEST['ques_id'];
}

$sql3="SELECT * FROM `study_exam_question` WHERE `course`='".$course."' AND `subject`='".$subject."' AND `chapter`='".addslashes($_REQUEST['chapter'])."' ORDER BY `id` DESC LIMIT 0,1";
$res3=query($sql3);
$fetch3=fetcharray($res3);
$qid=$fetch3['id'];
$sql4="SELECT * FROM `study_exam_question` WHERE `course`='".$course."' AND `subject`='".$subject."' AND `chapter`='".addslashes($_REQUEST['chapter'])."' ORDER BY `id` ASC LIMIT 0,1";
$res4=query($sql4);
$fetch4=fetcharray($res4);
?>
<table width="90%" cellspacing="0" cellpadding="0" align="center">
<tr height="35">
<td align="left" valign="middle" style="font-size:16px;">Question  <?=$next?>  of <?=getNumberOfAttemptPracticeQuestion($course,$subject,$_REQUEST['chapter'])?> </td>
</tr>
</table>

<table width="90%" cellspacing="0" cellpadding="0" style="padding-top:20px;" align="center">
<tr height="30">
<td width="6%" align="left" colspan="2"><strong><?=stripslashes($fetch2['question'])?></strong></td>
</tr>
</table>
<table width="90%" cellspacing="0" cellpadding="0" style="padding-top:10px;" align="center">
<tr>
<td align="left" valign="middle">
<table width="100%" cellspacing="0" cellpadding="0">
<tr height="30">
<td width="3%" align="left" valign="middle" style="padding-top:5px;"><input type="radio" name="tanswer<?=$fetch2['id']?>" id="tanswer1" value="<?=stripslashes($fetch2['wrong1'])?>"  onclick="getTestAnswer(this.value,<?=$ques_id?>,<?=$course?>,<?=$subject?>,'<?=$_REQUEST['chapter']?>');" /></td>
<td width="97%" align="left" valign="middle"><?=stripslashes($fetch2['wrong1'])?></td>
</tr>
<tr height="30">
<td width="3%" align="left" valign="middle" style="padding-top:5px;"><input type="radio" name="tanswer<?=$fetch2['id']?>" id="tanswer2" value="<?=stripslashes($fetch2['wrong2'])?>" onClick="getTestAnswer(this.value,<?=$ques_id?>,<?=$course?>,<?=$subject?>,'<?=$_REQUEST['chapter']?>');" /></td>
<td width="97%" align="left" valign="middle"><?=stripslashes($fetch2['wrong2'])?></td>
</tr>
<tr height="30">
<td width="3%" align="left" valign="middle" style="padding-top:5px;"><input type="radio" name="tanswer<?=$fetch2['id']?>" id="tanswer3" value="<?=stripslashes($fetch2['wrong3'])?>" onClick="getTestAnswer(this.value,<?=$ques_id?>,<?=$course?>,<?=$subject?>,'<?=$_REQUEST['chapter']?>');" /></td>
<td width="97%" align="left" valign="middle"><?=stripslashes($fetch2['wrong3'])?></td>
</tr>
<tr height="30">
<td width="3%" align="left" valign="middle" style="padding-top:5px;"><input type="radio" name="tanswer<?=$fetch2['id']?>" id="tanswer4" value="<?=stripslashes($fetch2['wrong4'])?>" onClick="getTestAnswer(this.value,<?=$ques_id?>,<?=$course?>,<?=$subject?>,'<?=$_REQUEST['chapter']?>');" /></td>
<td width="97%" align="left" valign="middle"><?=stripslashes($fetch2['wrong4'])?></td>
</tr>
</table>
</td>
</tr>
</table>
<div id="viewStudentdiv"></div>

<table width="54%" align="right">
<tr>
<?php if($_REQUEST['ques_id']>$fetch4['id']){?><td width="44%" align="right"><a onClick="preval('<?=$arr[$next-2]?>','<?=$_REQUEST['chapter']?>')" style="cursor:pointer;"><strong>
<input type="image" value="PRE" class="imgbutton" /></strong></a></td><?php }?>
<?php if($fetch3['id']!=$fetch4['id']){?><?php if($_REQUEST['ques_id']<$fetch3['id']){?>
<td width="32%" align="center"><a onClick="nextval('<?=$arr[$next]?>','<?=$_REQUEST['chapter']?>')"  style="cursor:pointer;"><strong>
<input type="image" value="NEXT >>" class="imgbutton" /></strong></a></td>
<?php }?><?php }?>
<td width="24%" align="left"><a href="practice-exam.php" style="cursor:pointer;">
<input type="image" value="FINISH" class="imgbutton" /></a></td>
</tr>
</table>
<?php }?>
<p>&nbsp;</p> 
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