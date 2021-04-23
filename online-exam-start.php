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
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
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


function getTestAnswer(ans1,ques,cou,subj,quesid)
{
document.frm2.ans.value=ans1;
document.frm2.ques_idn.value=ques;
document.frm2.course.value=cou;
document.frm2.subj.value=subj;
document.frm2.quesid.value=quesid;
}

function saveTestAnswer(exam_id)
{
window.location.href='exam-submit-process.php?exam='+exam_id;
}
</script>
<script>
function getValidate()
{
if(document.frm2.ans.value=='')
{
alert("Click one answer!!");
return false;
}
return true;
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
$sqle="SELECT * FROM `study_exam` WHERE `id`='".$_REQUEST['exam']."'";
$rese=query($sqle);
$num=numrows($rese);
if($num>0)
{
$fetche=fetcharray($rese);
?>
<h3 align="center"><?=$fetche['ename']?></h3>
<p>&nbsp;</p>
<?php 
$sql="SELECT * FROM `study_tmp_exam_question` WHERE `course`='".$fetche['course']."' AND `subject`='".$fetche['subject']."' AND `exam_id`='".$_REQUEST['exam']."' AND `uid`='".$_SESSION['uid']."' AND `status`='S' ORDER BY `id` ASC";
$res=query($sql);
$num=numrows($res);
if($num>0)
{
$arr=array();
if($num>0)
$i=0;
while($fetch=fetcharray($res))
{
$arr[$i]=$fetch['id'];
$i++;
}
if($_REQUEST['ques_id'])
{
$sql2="SELECT * FROM `study_tmp_exam_question` WHERE `course`='".$fetche['course']."' AND `subject`='".$fetche['subject']."' AND `exam_id`='".$_REQUEST['exam']."' AND `uid`='".$_SESSION['uid']."' AND `status`='S'  AND `id`='".$_REQUEST['ques_id']."'";
}
else
{
$sql2="SELECT * FROM `study_tmp_exam_question` WHERE `course`='".$fetche['course']."' AND `subject`='".$fetche['subject']."' AND `exam_id`='".$_REQUEST['exam']."' AND `uid`='".$_SESSION['uid']."' AND `status`='S'  AND `id`='".$arr[0]."' LIMIT 0,1";
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

$sql7="SELECT * FROM `study_tmp_exam_question` WHERE `course`='".$fetche['course']."' AND `subject`='".$fetche['subject']."' AND `exam_id`='".$_REQUEST['exam']."' AND `uid`='".$_SESSION['uid']."' AND `status`='S' ORDER BY `id` DESC LIMIT 0,1";
$res7=query($sql7);
$fetch7=fetcharray($res7);
$qid=$fetch7['id'];

$sql8="SELECT * FROM `study_tmp_exam_question` WHERE `course`='".$fetche['course']."' AND `subject`='".$fetche['subject']."' AND `exam_id`='".$_REQUEST['exam']."' AND `uid`='".$_SESSION['uid']."' AND `status`='S' ORDER BY `id` ASC LIMIT 0,1";
$res8=query($sql8);

$fetch8=fetcharray($res8);


if(!$_REQUEST['ques_id'])
{
$ques_id=$arr[0];
}
else{
$ques_id=$_REQUEST['ques_id'];
}


$current_date=date('Y-m-d');

getExam($_REQUEST['exam'],'duration')."seconds";

//$hr=examValue($_REQUEST['exam'],'avatime');

$timestamp = time();
$diff = getExam($_REQUEST['exam'],'duration'); //<-Time of countdown in seconds.  ie. 3600 = 1 hr. or 86400 = 1 day.

//MODIFICATION BELOW THIS LINE IS NOT REQUIRED.
$hld_diff = $diff;
if(isset($_SESSION['ts'])) {
$slice = ($timestamp - $_SESSION['ts']);	
$diff = $diff - $slice;
}

if(!isset($_SESSION['ts']) || $diff > $hld_diff || $diff < 0) {
$diff = $hld_diff;
$_SESSION['ts'] = $timestamp;
}

//Below is demonstration of output.  Seconds could be passed to Javascript.
$diff; //$diff holds seconds less than 3600 (1 hour);

$hours = floor($diff / 3600) . ' : ';
$diff = $diff % 3600;
$minutes = floor($diff / 60) . ' : ';
$diff = $diff % 60;
$seconds = $diff;

?>
<input type="hidden" name="timeStart" id="timeStart" value="<?=$range?>" />
<table width="90%" cellspacing="0" cellpadding="0" align="center">
<tr height="35">
<td align="left" valign="middle" style="font-size:16px;">Question  <?=getQuestionNumber($_REQUEST['ques_id'],$fetche['course'],$fetche['subject'],$_REQUEST['exam'],$_SESSION['uid'])?>  of <?=getNumberOfAttemptQuestion($fetche['course'],$fetche['subject'],$_REQUEST['exam'],$_SESSION['uid'])?> </td>
<td align="right" valign="top"><div id="strclock" align="center" style="color:#FF0000;font-size:24px;"></div> <script type="text/javascript">
var hour = <?php echo floor($hours); ?>;
var min = <?php echo floor($minutes); ?>;
var sec = <?php echo floor($seconds); ?>

function countdown() {
if(sec <= 0 && min > 0) {
sec = 59;
min -= 1;
}
else if(min <= 0 && sec <= 0) {
min = 0;
sec = 0;
}
else {
sec -= 1;
}

if(min <= 0 && hour > 0) {
min = 59;
hour -= 1;
}

var pat = /^[0-9]{1}$/;
sec = (pat.test(sec) == true) ? '0'+sec : sec;
min = (pat.test(min) == true) ? '0'+min : min;
hour = (pat.test(hour) == true) ? '0'+hour : hour;

document.getElementById('strclock').innerHTML = hour+":"+min+":"+sec;
setTimeout("countdown()",1000);
if(hour==0 && min==0 && sec==0){
saveTestAnswer(<?=$_REQUEST['exam']?>);
}

}
countdown();

</script></td>
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
<td width="3%" align="left" valign="middle">
<input type="radio" name="tanswer<?=$fetch2['id']?>" id="tanswer1" value="<?=stripslashes($fetch2['wrong1'])?>"  onclick="getTestAnswer('<?=$fetch2['wrong1']?>','<?=$ques_id?>','<?=$fetche['course']?>','<?=$fetche['subject']?>','<?=$fetch2['quesid']?>');" /></td>
<td width="97%" align="left" valign="middle"><?=stripslashes($fetch2['wrong1'])?></td>
</tr>
<tr height="30">
<td width="3%" align="left" valign="middle"><input type="radio" name="tanswer<?=$fetch2['id']?>" id="tanswer2" value="<?=stripslashes($fetch2['wrong2'])?>" onClick="getTestAnswer('<?=$fetch2['wrong2']?>','<?=$ques_id?>','<?=$fetche['course']?>','<?=$fetche['subject']?>','<?=$fetch2['quesid']?>');" /></td>
<td width="97%" align="left" valign="middle"><?=stripslashes($fetch2['wrong2'])?></td>
</tr>
<tr height="30">
<td width="3%" align="left" valign="middle"><input type="radio" name="tanswer<?=$fetch2['id']?>" id="tanswer3" value="<?=stripslashes($fetch2['wrong3'])?>" onClick="getTestAnswer('<?=$fetch2['wrong3']?>','<?=$ques_id?>','<?=$fetche['course']?>','<?=$fetche['subject']?>','<?=$fetch2['quesid']?>');" /></td>
<td width="97%" align="left" valign="middle"><?=stripslashes($fetch2['wrong3'])?></td>
</tr>
<tr height="30">
<td width="3%" align="left" valign="middle"><input type="radio" name="tanswer<?=$fetch2['id']?>" id="tanswer4" value="<?=stripslashes($fetch2['wrong4'])?>" onClick="getTestAnswer('<?=$fetch2['wrong4']?>','<?=$ques_id?>','<?=$fetche['course']?>','<?=$fetche['subject']?>','<?=$fetch2['quesid']?>');" /></td>
<td width="97%" align="left" valign="middle"><?=stripslashes($fetch2['wrong4'])?></td>
</tr>
</table>
</td>
</tr>
</table>

<?php 
$sql="SELECT * FROM `study_tmp_exam_question` WHERE `course`='".$fetche['course']."' AND `subject`='".$fetche['subject']."' AND `exam_id`='".$_REQUEST['exam']."' AND `uid`='".$_SESSION['uid']."' AND `status`='S'";
$res=query($sql);
$num=numrows($res);
?>
<div align="right">

<?php if($num==0 || $fetch7['id']==$fetch8['id'] || $_REQUEST['ques_id']==$fetch7['id']){?>
<form name="frm2" method="post" action="exam-final-submit-process.php">
<input type="hidden" name="exam" id="exam" value="<?=$_REQUEST['exam']?>" />
<input type="hidden" name="ques_id" id="ques_id" value="<?=$_REQUEST['ques_id']?>" />
<input type="hidden" name="prev" id="prev" value="<?=$fetch2['id']?>" />
<input type="hidden" name="ans" id="ans" value="" />
<input type="hidden" name="ques_idn" id="ques_idn" value="" />
<input type="hidden" name="quesid" id="quesid" value="" />
<input type="hidden" name="course" id="course" value="" />
<input type="hidden" name="subj" id="subj" value="" />
<input type="image" src="images/final.jpg" border="0" class="curve" />
</form>
<!--<a onClick="saveTestAnswer('<?=$_REQUEST['exam']?>');" style="cursor:pointer;"><img src="images/final.jpg" border="0" class="curve" /></a>-->
<?php }?>

<?php if($fetch7['id']!=$fetch8['id']){?>
<?php if($_REQUEST['ques_id']<$fetch7['id']){?>
<form name="frm2" method="post" action="exam-new-submit-process.php">
<input type="hidden" name="exam" id="exam" value="<?=$_REQUEST['exam']?>" />
<input type="hidden" name="ques_id" id="ques_id" value="<?=$arr[$next]?>" />
<input type="hidden" name="prev" id="prev" value="<?=$fetch2['id']?>" />
<input type="hidden" name="ans" id="ans" value="" />
<input type="hidden" name="ques_idn" id="ques_idn" value="" />
<input type="hidden" name="quesid" id="quesid" value="" />
<input type="hidden" name="course" id="course" value="" />
<input type="hidden" name="subj" id="subj" value="" />
<input type="image" src="images/next.jpg" border="0" class="curve" />
</form>
<?php }else{

if($num>1){
?>
<p>&nbsp;</p>
<!--<a href="skipped-question.php?exam=<?=$_REQUEST['exam']?>" style="cursor:pointer;"><img src="images/skipped.jpg" border="0" class="curve" /></a>-->
<?php }}?>
<?php }?>

</div>
<?php }else{?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p style="color:#FF0000;" align="center"><strong>No Exam Question Found!</strong></p>
<?php }}?>
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