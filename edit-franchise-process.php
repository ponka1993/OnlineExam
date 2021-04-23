<?php
session_start();
include('includes/function.php');

if($_SESSION['fid'])
{
$sql="UPDATE `study_franchise` SET `franname`='".$_REQUEST['franname']."',`pname`='".$_REQUEST['pname']."',`password`='".$_REQUEST['password']."',`email`='".$_REQUEST['email']."',`address`='".addslashes($_REQUEST['address'])."',`phone`='".$_REQUEST['phone']."',`state`='".$_REQUEST['state']."',`city`='".$_REQUEST['city']."',`pincode`='".$_REQUEST['pincode']."' WHERE `id`='".$_SESSION['fid']."'";
$res=query($sql);

redirect('edit-franchise.php?m=edit');
}
?>