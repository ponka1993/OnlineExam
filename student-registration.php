<?php
session_start();
include('includes/function.php');
$pageid=3;
?>
<!DOCTYPE html>
<html>
<head>
<title>Myeduteacher</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="layout/styles/jquery-ui.css" rel="stylesheet" type="text/css" media="all">
<script>
function getCourse(id)
{
xmlhttp.open('GET','get-course.php?course='+id);
xmlhttp.onreadystatechange=getsendRequest1;
xmlhttp.send();
}
function getsendRequest1()
{
if(xmlhttp.readyState==4)
{
if(xmlhttp.status==200)
{
var response=xmlhttp.responseText;

document.getElementById('courseDiv').innerHTML=response;
}
}
}
</script>
</head>
<body id="top">
 <div class="wrapper row1">
  <?php include('header-mid.php')?>
</div>
<div class="wrapper row2">
  <?php include('menu.php')?>
</div>
<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      
      <div id="comments">
       <h2>Student Registration <strong>(<font color="#FF0000">*</font>) Mandatory Field</strong></h2>
	   <?php if($_REQUEST['m']==1){?><p align="center" style="color:#009900;"><strong>New Student Registration request sent to administrator!</strong></p><?php }?>
        <form name="registration" action="student-registration-process.php" method="post" enctype="multipart/form-data">
		  <?php if($_SESSION['fid']==''){?>
		  <div class="one_third first">
            <label for="name">&nbsp;</label>
            
          </div>
		  <div class="one_third">
            <label for="email">Franchise <span>*</span></label>
            <select name="franchise" id="franchise"  required>
            <option value="">Select Franchise</option>
            <?php
            $sql="SELECT * FROM `study_franchise` WHERE `status`='A' ORDER BY `franname`";
            $res=query($sql);
            $num=numrows($res);
            if($num>0)
            {
            while($fetch=fetcharray($res))
            {
             ?>
            <option value="<?=$fetch['id']?>"><?=ucwords(strtolower($fetch['franname']))?> (<?=ucwords(strtolower($fetch['city']))?>)</option>
            <?php }}?>
            </select>
          </div>
		  <div class="one_third first">
            <label for="name">&nbsp;</label>
          </div>
		  <?php }?>
          
		  
          <div class="one_third first">
            <label for="name">Course<span>*</span></label>
            <select name="course" id="course" class="selectbox" required onChange="getCourse(this.value);">
            <option value="">Select Course</option>
            <?php
            $sql="SELECT *FROM `study_course` WHERE `status`='A' ORDER BY `course`";
            $res=query($sql);
            $num=numrows($res);
            if($num>0)
            {
            while($fetch=fetcharray($res))
            {
            ?>
            <option value="<?=$fetch['id']?>"><?=ucwords(strtolower($fetch['course']))?></option>
            <?php }}?>
            </select>
          </div>
		  <div class="one_third">
            <label for="email">Subject <span>*</span></label>
            <div id="courseDiv"><select name="subject" id="subject" class="selectbox" required><option value="">Select Subject</option></select></div>
          </div>
          <div class="one_third">
          <label for="url">Registration Date <span>*</span></label>
          <input type="text" name="reg_date" id="reg_date" class="inputbox" placeholder="xxxx-xx-xx" required />
		  <script>
            $(function(){
            $("#reg_date").datepicker({
            changeMonth: true,
            changeYear: true
             });
             });
             </script>
          </div>
			
		  <div class="one_third first">
            <label for="name">Name <span>*</span></label>
            <input type="text" name="name" id="name" value="" size="22" required placeholder="Enter Name">
          </div>
          <div class="one_third">
            <label for="email">Father's Name <span>*</span></label>
            <input type="text" name="fname" id="fname" value="" size="22" required placeholder="Enter Father Name">
          </div>
          <div class="one_third">
            <label for="url">Mother Name </label>
            <input type="text" name="mname" id="mname" value="" size="22" placeholder="Enter Mother Name">
          </div>
		  
		  <div class="one_third first">
            <label for="name">Date of Birth<span>*</span></label>
            <input type="text" name="dob" id="dob" value="" size="22" required placeholder="xxxx-xx-xx">
			<script>
            $(function(){
            $("#dob").datepicker({
            changeMonth: true,
            changeYear: true
            });
            });
            </script>
		  </div>
          <div class="one_third">
            <label for="email">Qualification<span>*</span></label>
            <input type="text" name="qualification" id="qualification" value="" size="22" required placeholder="Enter Qualification" >
          </div>
          <div class="one_third">
            <label for="url">Phone <span>*</span></label>
            <input type="text" name="phone" id="phone" value="" size="22" required placeholder="Enter Phone Number">
          </div>
		  
		  <div class="one_third first">
            <label for="name">Email<span>*</span></label>
            <input type="text" name="email" id="email" value="" size="22" required placeholder="Enter Email">
			
		  </div>
          <div class="one_third">
            <label for="email">Address<span>*</span></label>
            <input type="text" name="address" id="address" value="" size="22" required placeholder="Enter Address" >
          </div>
          <div class="one_third">
            <label for="url">State <span>*</span></label>
            <select name="state" id="state" class="selectbox" required>
            <option value="">Select State</option>
            <?php
           $sql="SELECT *FROM `study_state`  ORDER BY `state`";
           $res=query($sql);
           $num=numrows($res);
           if($num>0)
           {
           while($fetch=fetcharray($res))
           {
           ?>
           <option value="<?=$fetch['id']?>"><?=ucwords($fetch['state'])?></option>
           <?php }}?>
           </select>
          </div>
		  
		  <div class="one_third first">
            <label for="name">City<span>*</span></label>
            <input type="text" name="city" id="city" value="" size="22" required placeholder="Enter city">
		  </div>
          <div class="one_third">
            <label for="email">Candidate Type<span>*</span></label>
            <select name="cantype" id="cantype"  class="selectbox"  required>
            <option value="">Candidate Type</option>
            <option value="General">General</option>
            <option value="SC">SC</option>
            <option value="ST">ST</option>
            <option value="OBC/A">OBC/A</option>
            <option value="OBC/B">OBC/B</option>
            <option value="BPL">BPL</option>
            </select>
          </div>
		  <div class="one_third">
            <label for="url">Photo <span>*</span></label>
            <input type="file" name="photo" id="photo" required>
          </div>
          
		  <div class="specer">&nbsp;</div>
          <div>
            <input name="submit" type="submit" value="Submit"> 
          </div>
        </form>
      </div>
       
      <!-- / main body -->
      <div class="clear"></div>
    </main>
  </div>
</div>
<div class="wrapper row4">
  <?php include('footer-top.php')?>
</div>
<div class="wrapper row5">
  <?php include('footer.php')?>
</div>
<!-- JAVASCRIPTS --> 
<script src="layout/scripts/jquery.min.js"></script> 
<script src="layout/scripts/jquery.fitvids.min.js"></script> 
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script src="js/jquery-ui.js" type="text/javascript"></script>
<script src="js/jquery.min.js" type="text/javascript" ></script>
<script src="js/ajax.js" type="text/javascript"></script>
</body>
</html>