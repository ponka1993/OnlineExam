<?php
session_start();
include('includes/function.php');

$sql="SELECT * FROM `study_student_registration` WHERE `registration_id`='".$_REQUEST['registration_id']."' AND `password`='".$_REQUEST['password']."' AND `status`='A'";
$res=query($sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
$_SESSION['uid']=$fetch['id'];

$sql1="DELETE FROM `study_tmp_exam_question` WHERE `uid`='".$_SESSION['uid']."' ORDER BY `id` DESC";
$res1=query($sql1);

$sql2="DELETE FROM `study_tmp_answer_given` WHERE `uid`='".$_SESSION['uid']."' ORDER BY `id` DESC";
$res2=query($sql2);

redirect('dashboard.php');
}
else
{
redirect('student-login.php?m=1');
}
?> 
