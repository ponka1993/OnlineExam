<?php
session_start();
include('includes/function.php');

if($_SESSION['uid'])
{

$sql1="SELECT * FROM `study_tmp_answer_given` WHERE `exam_id`='".$_REQUEST['exam']."' AND `ques_id`='".$_REQUEST['ques_idn']."' AND `uid`='".$_SESSION['uid']."'";
$res1=query($sql1);
$no=numrows($res1);
if($no>0)
{

$sql="UPDATE `study_tmp_answer_given` SET `answer`='".addslashes($_REQUEST['ans'])."' WHERE `exam_id`='".$_REQUEST['exam']."' AND `ques_id`='".$_REQUEST['ques_idn']."' AND `uid`='".$_SESSION['uid']."'";
$res=query($sql);

}else{

$sql="INSERT INTO `study_tmp_answer_given` (`uid`,`exam_id`,`ques_id`,`quesid`,`answer`,`course`,`subject`) VALUES ('".$_SESSION['uid']."','".$_REQUEST['exam']."','".$_REQUEST['ques_idn']."','".$_REQUEST['quesid']."','".addslashes($_REQUEST['ans'])."','".$_REQUEST['course']."','".$_REQUEST['subj']."')";
$res=query($sql);

$sql2="UPDATE `study_tmp_exam_question` SET `status`='A' WHERE `exam_id`='".$_REQUEST['exam']."' AND `id`='".$_REQUEST['ques_idn']."' AND `uid`='".$_SESSION['uid']."'";
$res2=query($sql2);

}

redirect('online-exam-start.php?exam='.$_REQUEST['exam'].'&ques_id='.$_REQUEST['ques_id'].'&prev='.$_REQUEST['prev']);
}
?>