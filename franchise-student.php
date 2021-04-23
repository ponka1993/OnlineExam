<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['fid']))
{
redirect('index.php');
}
$pageid=4;
?>
<!DOCTYPE html>
<html>
<head>
<title>People Can Show Miracle</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<script>
function viewStudent(id)
{
xmlhttp.open('GET','get-student.php?id='+id);
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
document.getElementById('view1').style.display='inline';
document.getElementById('view2').style.display='inline';
document.getElementById('viewStudentdiv').innerHTML=response;
}
}
}

function closeDiv()
{
document.getElementById('view1').style.display='none';
document.getElementById('view2').style.display='none';
}
</script>
</head>
<body id="top">
<div id="view1" class="black_overlay"></div>
<div id="view2" class="graph_content" style="background-color:#FFFFFF;">
<div id="viewStudentdiv"></div>
</div>
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
	   <p align="center" style="line-height:25px;font-size:20px; color:#FF0000">Welcome <span style="color:#7d1935"><?=getFranchise($_SESSION['fid'],'franname')?></span>&nbsp;&nbsp;Registratiotn ID&nbsp;<span style="color:#7d1935"><?=getFranchise($_SESSION['fid'],'franchise_id')?></span></p>
      <h1><strong>Franchise Student</strong></h1>
      <div class="scrollable">
        <table>
          <thead>
            <tr>
			  <th>Sl no</th>
              <th>Course</th>
              <th>Subject</th>
              <th>Registration ID</th>
			  <th>Password</th>
			  <th>Name</th>
			  <th>Photo</th>
			  <th>View</th>
              
            </tr>
          </thead>
          <tbody>
		 <?php
         $sql="SELECT * FROM `study_student_registration` WHERE `franchise_code`='".$_SESSION['fid']."' ORDER BY `id` DESC";
         $res=query($sql);
         $num=numrows($res);
         if($num>0)
         {
         $i=1;
         while($fetch=fetcharray($res))
         {
         if($i%2==0){$class='class1';}else{$class='class2';}
         ?>

            <tr class="<?=$class?>">
              <td><?=$i?></td>
              <td><?=getCourse($fetch['course'],'course')?></td>
              <td><?=getSubject($fetch['subject'],'subject')?></td>
			  <td><?=$fetch['registration_id']?></td>
			  <td><?=$fetch['password']?></td>
			  <td><?=$fetch['name']?></td>
			  <td><div style="height:40px; width:40px; overflow:hidden;"><img src="student/<?=$fetch['photo']?>" height="40" width="40" /></div></td>
			  <td><a onClick="viewStudent(<?=$fetch['id']?>);" style="cursor:pointer;"><img src="images/demo/view.gif" title="View Student" /></a></td>
              </tr>
            <?php $i++;}} else{?>
			<tr><td colspan="9" align="center">No Record Found</td></tr>
			<?php }?>
          </tbody>
        </table>
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
<script src="js/ajax.js" type="text/javascript"></script>
</body>
</html>