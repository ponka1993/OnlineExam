<?php
session_start();
include('includes/function.php');

if($_SESSION['uid'])
{
if($_FILES['photo']['name'])
{
$rand=rand(1,999999);
$target="student/";
$path=$rand.$_FILES['photo']['name'];
$target=$target.basename($path); 
move_uploaded_file($_FILES['photo']['tmp_name'], $target);

$sql="UPDATE `study_student_registration` SET `course`='".$_REQUEST['course']."',`subject`='".$_REQUEST['subject']."',`password`='".$_REQUEST['password']."',`name`='".$_REQUEST['name']."',`fname`='".$_REQUEST['fname']."',`mname`='".$_REQUEST['mname']."',`dob`='".$_REQUEST['dob']."',`qualification`='".$_REQUEST['qualification']."',`phone`='".$_REQUEST['phone']."',`email`='".$_REQUEST['email']."',`address`='".addslashes($_REQUEST['address'])."',`state`='".$_REQUEST['state']."',`city`='".$_REQUEST['city']."',`cantype`='".$_REQUEST['cantype']."',`photo`='".$path."' WHERE `id`='".$_SESSION['uid']."'";
$res=query($sql);
}
else
{
$sql="UPDATE `study_student_registration` SET `course`='".$_REQUEST['course']."',`subject`='".$_REQUEST['subject']."',`password`='".$_REQUEST['password']."',`name`='".$_REQUEST['name']."',`fname`='".$_REQUEST['fname']."',`mname`='".$_REQUEST['mname']."',`dob`='".$_REQUEST['dob']."',`qualification`='".$_REQUEST['qualification']."',`phone`='".$_REQUEST['phone']."',`email`='".$_REQUEST['email']."',`address`='".addslashes($_REQUEST['address'])."',`state`='".$_REQUEST['state']."',`city`='".$_REQUEST['city']."',`cantype`='".$_REQUEST['cantype']."' WHERE `id`='".$_SESSION['uid']."'";
$res=query($sql);
}
redirect('edit-profile.php?m=edit');
}
?>