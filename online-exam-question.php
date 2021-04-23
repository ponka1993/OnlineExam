<?php
session_start();
include('includes/function.php');

$sqlq="SELECT * FROM `study_exam_question` WHERE `course`='".getExam($_REQUEST['exam'],'course')."' AND `subject`='".getExam($_REQUEST['exam'],'subject')."' ORDER BY RAND () LIMIT 0,".getExam($_REQUEST['exam'],'noq')."";
$resq=query($sqlq);
$numq=numrows($resq);
if($numq>0)
{
while($fetchq=fetcharray($resq))
{
$sql="INSERT INTO `study_tmp_exam_question` (`uid`,`course`,`subject`,`qtype`,`exam_id`,`question`,`quesid`,`wrong1`,`wrong2`,`wrong3`,`wrong4`,`correct`) VALUES ('".$_SESSION['uid']."','".getExam($_REQUEST['exam'],'course')."','".getExam($_REQUEST['exam'],'subject')."','".getExam($_REQUEST['exam'],'qtype')."','".$_REQUEST['exam']."','".addslashes($fetchq['question'])."','".$fetchq['id']."','".addslashes($fetchq['wrong1'])."','".addslashes($fetchq['wrong2'])."','".addslashes($fetchq['wrong3'])."','".addslashes($fetchq['wrong4'])."','".addslashes($fetchq['correct'])."')";
$res=query($sql);
}
}

redirect('online-exam-start.php?exam='.$_REQUEST['exam']);
?>