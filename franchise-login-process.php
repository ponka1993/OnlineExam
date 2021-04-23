<?php
session_start();
include('includes/function.php');

$sql="SELECT * FROM `study_franchise` WHERE `franchise_id`='".$_REQUEST['franchise_id']."' AND `password`='".base64_encode($_REQUEST['password'])."' AND `status`='A'";
$res=query($sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
$_SESSION['fid']=$fetch['id'];

redirect('franchise-account.php');
}else
{
redirect('franchise-login.php?m=1');
}
?> 
