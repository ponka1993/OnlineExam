<?php
session_start();
include('includes/function.php');

if($_FILES['photo']['name'])
{
$rand=rand(111,999999);
/*---------------------------Small Images------------------------------------------*/
$errors= array();
$arr=array();

$file_name=$rand.$_FILES['photo']['name'];
$file_type=$_FILES['photo']['type'];
$arr=explode('/',$file_type);

if($arr[1]=="jpg" || $arr[1]=="jpeg" || $arr[1]=="png" || $arr[1]=="gif"){

if($arr[1]=="jpg" || $arr[1]=="jpeg" )
{
$uploadedfile = $_FILES['photo']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);
}
if($arr[1]=="png")
{
$uploadedfile = $_FILES['photo']['tmp_name'];
$src = imagecreatefrompng($uploadedfile);
}
if($arr[1]=="gif") 
{
$uploadedfile = $_FILES['photo']['tmp_name'];
$src = imagecreatefromgif($uploadedfile);
}

list($width,$height)= getimagesize($_FILES['photo']['tmp_name']);
if($width > 80){$newwidth = 80;}else{$newwidth = $width;}
if($height > 100){$newheight = 100;}else{$newheight = $height;}

$tmp=imagecreatetruecolor($newwidth,$newheight);
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

$date = date('Y-m-d');// current date

$expiry = strtotime(date("Y-m-d", strtotime($date)) . " +52 week");
$expire=date('Y-m-d',$expiry);

if($_SESSION['fid'])
{
$franchise=$_SESSION['fid'];
}else{
$franchise=$_REQUEST['franchise'];
}

$sql="INSERT INTO `study_student_application` (`franchise_code`,`course`,`subject`,`name`,`fname`,`mname`,`dob`,`qualification`,`phone`,`email`,`address`,`state`,`city`,`cantype`,`photo`,`reg_date`,`date`,`expire`) VALUES('".$franchise."','".$_REQUEST['course']."','".$_REQUEST['subject']."','".$_REQUEST['name']."','".$_REQUEST['fname']."','".$_REQUEST['mname']."','".$_REQUEST['dob']."','".$_REQUEST['qualification']."','".$_REQUEST['phone']."','".$_REQUEST['email']."','".$_REQUEST['address']."','".$_REQUEST['state']."','".$_REQUEST['city']."','".$_REQUEST['cantype']."','".$file_name."','".$_REQUEST['reg_date']."','".date('Y-m-d')."','".$expire."')";
$res=query($sql);

$desired_dir="student/";

if(is_dir($desired_dir)==false){
mkdir("$desired_dir", 0700);		// Create directory if it does not exist

}

if(is_dir("$desired_dir/".$file_name)==false){
$filename ="$desired_dir/".$rand.$_FILES['photo']['name'];


imagejpeg($tmp,$filename,100);
imagedestroy($src);
imagedestroy($tmp);
}else{									// rename the file if another one exist

$new_dir="$desired_dir/".$file_name.time();
rename($uploadedfile,$new_dir) ;				
}
}


redirect('student-registration.php?m=1');
}
else{
redirect('student-registration.php');
}
?>