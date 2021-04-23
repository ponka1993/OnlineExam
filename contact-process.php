<?php
include('includes/function.php');

if($_REQUEST['phone'])
{
$sql="INSERT INTO `study_contact` (`name`,`email`,`phone`,`message`) VALUES('".$_REQUEST['name']."','".$_REQUEST['email']."','".$_REQUEST['phone']."','".addslashes($_REQUEST['message'])."')";
$res=query($sql);

$headers="From: ".$_REQUEST['email']."\r\n";
$headers.="MIME-Version: 1.0" . "\r\n";
$headers.="Content-type:text/html;charset=iso-8859-1"."\r\n";
$headers.="Contact Us";

$to="krish.be@rediffmail.com,info@pcsmindia.in";
$subject="Feedback from pcsmindia.in";

$message="<p><strong>Name :</strong> ".$_REQUEST['name']."</p>
<p><strong>Email :</strong> ".$_REQUEST['email']."</p>
<p><strong>Phone :</strong> ".$_REQUEST['phone']."</p>
<p><strong>Message :</strong> ".$_REQUEST['message']."</p>";
$message.="<br>Thanks";

mail($to,$subject,$message,$headers);

redirect('contact.php?m=1');
}
?>