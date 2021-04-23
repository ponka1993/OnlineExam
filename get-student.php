<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['fid']))
{
redirect('index.php');
}
?>

<div align="right" style="padding-right:5px;"><a onClick="closeDiv();" style="cursor:pointer;"><strong>CLOSE</strong></a></div>

<?php
$sql="SELECT * FROM `study_student_registration` WHERE `id`='".$_REQUEST['id']."'";
$res=query($sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
?>

<table style="width:99%" align="center">
           <thead> 
         <tbody>
		      <tr>
              <td class="class1">Course</td>
              <td class="class1"><?=getCourse($fetch['course'],'course')?></td>
              <td class="class1">Subject</td>
              <td class="class1"><?=getSubject($fetch['subject'],'subject')?></td>
          </tr>
		      <tr>
              <td class="class2">Password</td>
              <td class="class2"><?=$fetch['password']?></td>
              <td class="class2">Name</td>
              <td class="class2"><?=$fetch['name']?></td>
          </tr>
		      <tr>
              <td class="class1">Father's Name</td>
              <td class="class1"><?=$fetch['fname']?></td>
              <td class="class1">Subject</td>
              <td class="class1"><?=getSubject($fetch['subject'],'subject')?></td>
          </tr>
		      <tr>
              <td class="class2">Date of Birth</td>
              <td class="class2"><?=date('d F Y',strtotime($fetch['dob']))?></td>
              <td class="class2">Qualification</td>
              <td class="class2"><?=$fetch['qualification']?></td>
          </tr>
		      <tr>
              <td class="class1">Phone</td>
              <td class="class1"><?=$fetch['phone']?></td>
              <td class="class1">Email</td>
              <td class="class1"><?=$fetch['email']?></td>
          </tr>
		      <tr>
              <td class="class2">Address</td>
              <td class="class2"><?=stripslashes($fetch['address'])?></td>
              <td class="class2">City</td>
              <td class="class2"><?=$fetch['city']?></td>
          </tr>
		      <tr>
              <td class="class1">Candidate Type</td>
              <td class="class1"><?=$fetch['cantype']?></td>
              <td class="class1">Photo</td>
              <td class="class1"><div style="height:40px; width:40px; padding-bottom:8px;"><img src="student/<?=$fetch['photo']?>" width="80" height="60" class="curve"/></div></td>
          </tr>
		      <tr>
              <td class="class2">Status</td>
              <td class="class2"><?php if($fetch['status']=='A'){?>Active<?php }else{?>Inactive<?php }?></td>
              <td class="class2">Registration ID</td>
              <td class="class2"><?=$fetch['registration_id']?></td>
          </tr>
		      <tr>
              <td class="class1">State</td>
              <td class="class1"><?=getState($fetch['state'],'state')?></td>
              <td class="class1">Franchise Name</td>
              <td class="class1"><?=getFranchise($fetch['franchise_code'],'franname')?></td>
          </tr>
		  </tbody>
		  </thead>
        </table>

<?php } ?>
