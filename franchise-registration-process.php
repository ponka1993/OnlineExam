<?php
session_start();
include('includes/function.php');

if($_REQUEST['email'])
{
$rand=rand(111111,999999);
$sql="INSERT INTO `study_franchise` (`franchise_id`,`franname`,`pname`,`password`,`email`,`address`,`phone`,`state`,`city`,`pincode`) values('".$rand."','".$_REQUEST['franname']."','".$_REQUEST['pname']."','".base64_encode($_REQUEST['password'])."','".$_REQUEST['email']."','".addslashes($_REQUEST['address'])."','".$_REQUEST['phone']."','".$_REQUEST['state']."','".$_REQUEST['city']."','".$_REQUEST['pincode']."')";
$res=query($sql);
$id=mysql_insert_id();
$newid=(1000+$id);
$franid='PCSMF'.$newid;

$sqlup="UPDATE `study_franchise` SET `franchise_id`='".$franid."' WHERE `id`='".$id."'";
$resup=query($sqlup);

redirect('franchise-registration.php?m=1');
}

?>