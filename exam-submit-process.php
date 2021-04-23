<?php
session_start();
include('includes/function.php');

if($_SESSION['uid'])
{
if($_REQUEST['case']=='tmp'){
$sql1="SELECT * FROM `study_tmp_answer_given` WHERE `exam_id`='".$_REQUEST['exam']."' AND `ques_id`='".$_REQUEST['ques_id']."' AND `uid`='".$_SESSION['uid']."'";
$res1=query($sql1);
$no=numrows($res1);
if($no>0)
{
$sql="UPDATE `study_tmp_answer_given` SET `answer`='".$_REQUEST['ans']."' WHERE `exam_id`='".$_REQUEST['exam']."' AND `ques_id`='".$_REQUEST['ques_id']."' AND `uid`='".$_SESSION['uid']."'";
mysql_query("SET NAMES UTF8");
$res=query($sql);
}
else{
$sql="INSERT INTO `study_tmp_answer_given` (`uid`,`exam_id`,`ques_id`,`answer`,`course`,`subject`) VALUES ('".$_SESSION['uid']."','".$_REQUEST['exam']."','".$_REQUEST['ques_id']."','".$_REQUEST['ans']."','".$_REQUEST['course']."','".$_REQUEST['subj']."')";
mysql_query("SET NAMES UTF8");
$res=query($sql);

$sql2="UPDATE `study_tmp_exam_question` SET `status`='A' WHERE `exam_id`='".$_REQUEST['exam']."' AND `id`='".$_REQUEST['ques_id']."' AND `uid`='".$_SESSION['uid']."'";
$res2=query($sql2);
}
}
else{

$course=getExam($_REQUEST['exam'],'course');
$subject=getExam($_REQUEST['exam'],'subject');

$sql1="SELECT * FROM `study_tmp_answer_given` WHERE `exam_id`='".$_REQUEST['exam']."' AND `uid`='".$_SESSION['uid']."' AND `course`='".$course."' AND `subject`='".$subject."'";
$res1=query($sql1);
$no1=numrows($res1);
//if($no1>0)
//{
while($fetch1=fetcharray($res1)){

$sql2="INSERT INTO `study_answer_given` (`uid`,`exam_id`,`ques_id`,`answer`,`exam_given_date`,`test_given_id`,`course`,`subject`) VALUES ('".$fetch1['uid']."','".$fetch1['exam_id']."','".$fetch1['ques_id']."','".addslashes($fetch1['answer'])."','".date('Y-m-d')."','".$rand."','".$course."','".$subject."')";
$res2=query($sql2);
//}
}

$sql="SELECT * FROM `study_tmp_answer_given` WHERE `exam_id`='".$_REQUEST['exam']."' AND `uid`='".$_SESSION['uid']."' AND `course`='".$course."' AND `subject`='".$subject."'";
$res=query($sql);
$fetch=fetcharray($res);
$no=numrows($res);
$no_ques=$no;


$sql4="SELECT * FROM `study_tmp_answer_given` WHERE `exam_id`='".$_REQUEST['exam']."' AND `uid`='".$_SESSION['uid']."' AND `answer`!=''";
$res4=query($sql4);
$no4=numrows($res4);
$i=0;
while($fetch4=fetcharray($res4))
{

if(getTestRightAnswer($fetch4['ques_id'])==$fetch4['answer'])
{
$right_answer=$i+1;
$i++;
}
}
$max_marks=getExam($_REQUEST['exam'],'qualify');
if($max_marks!='' && $no_ques!=''){
$per_ques_marks=$max_marks/$no_ques;
}
$marks=$right_answer*$per_ques_marks;

$sql6="INSERT INTO `study_student_exam_result` (`exam_date`,`total_question`,`attempt_question`,`right_answer`,`total_marks`,`total_marks_obtain`,`exam_id`,`course`,`subject`,`uid`) VALUES ('".date('Y-m-d')."','".$no_ques."','".$no4."','".$right_answer."','".$max_marks."','".$marks."','".$_REQUEST['exam']."','".$course."','".$subject."','".$_SESSION['uid']."')";
$res6=query($sql6);

$sql7="DELETE FROM `study_tmp_exam_question` WHERE `uid`='".$_SESSION['uid']."' AND `course`='".$course."' AND `subject`='".$subject."'";
$res7=query($sql7);
$sql8="DELETE FROM `study_tmp_answer_given` WHERE `uid`='".$_SESSION['uid']."' AND `course`='".$course."' AND `subject`='".$subject."' AND `exam_id`='".$_REQUEST['exam']."'";
$res8=query($sql8);

redirect('exam-result.php');
}
}
?>