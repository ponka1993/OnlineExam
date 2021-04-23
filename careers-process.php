<?php
session_start();
include('includes/function.php');

if($_SESSION['sid'])
{
if($_FILES['file']['name'])
{
$rand=rand(1,999999);
$target="upload/";
$path=$rand.$_FILES['file']['name'];

$ext=pathinfo($path, PATHINFO_EXTENSION);
if($ext=='docx' || $ext=='pdf')
{
$target=$target.basename($path); 
move_uploaded_file($_FILES['file']['tmp_name'], $target);

$sql="INSERT INTO `study_careers` (`name`,`mobile`,`email`,`file`,`date`) VALUES('".$_REQUEST['name']."','".$_REQUEST['mobile']."','".$_REQUEST['email']."','".$path."','".date('Y-m-d')."')";
$res=query($sql);
redirect('careers.php?m=1');
}else{
redirect('careers.php?m=2');
}
}
}
?>