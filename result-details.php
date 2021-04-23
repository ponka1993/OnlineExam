<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['uid']))
{
redirect('index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
<title>People Can Show Miracle</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<!-- / Demo styling - remove before use -->
<style type="text/css">
.container .group{text-align:center;}
.container .group div{padding:8px 0; font-size:16px; font-family:Verdana, Geneva, sans-serif;}
.container .group div:nth-child(odd){color:#FFFFFF; background:#CCCCCC;}
.container .group div:nth-child(even){color:#FFFFFF; background:#979797;}
@media screen and (min-width:180px) and (max-width:900px) {
	.container .group div{margin-bottom:0;}
}
</style>
<!-- / Demo styling -->
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
      
     <p><h3 align="center" style="line-height:20px;font-size:20px;">Welcome <span style="color:#7d1935"><?=getStudent($_SESSION['uid'],'name')?></span></h3></p>
     <p align="center" style="line-height:30px;font-size:17px;"><span style="color:#FF0000;">Course:</span>&nbsp;</strong><?=getCourse(getStudent($_SESSION['uid'],'course'), 'course')?>&nbsp;&nbsp;<span style="color:#FF0000;">Subject:</span>&nbsp;&nbsp;</strong><?=getSubject(getStudent($_SESSION['uid'],'subject'),'subject')?>&nbsp;&nbsp;<span style="color:#FF0000;">Registration ID:</span>&nbsp;</strong><?=getStudent($_SESSION['uid'],'registration_id')?></p>
	  <div class="scrollable">
        <table>
          <thead>
            <tr>
              <th>Sl No</th>
              <th>Course</th>
			  <th>Subject</th>
			  <th>Date</th>
			  <th>Total</th>
			  <th>Attemp</th>
			  <th>Right</th>
			  <th>Total Marks</th>
			  <th>Marks Obtain</th>
			  <th>Action</th>
              
            </tr>
          </thead>
          <tbody>
		 <?php
         $sql="SELECT * FROM `study_student_exam_result` WHERE `uid`='".$_SESSION['uid']."' ORDER BY `id` DESC";
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
			  <td><?=date('d F Y',strtotime($fetch['exam_date']))?></td>
			  <td><?=$fetch['total_question']?></td>
			  <td><?=$fetch['attempt_question']?></td>
			  <td><?=$fetch['right_answer']?></td>
			  <td><?=$fetch['total_marks']?></td>
			  <td><?=round($fetch['total_marks_obtain'],2)?></td>
			  <td><a href="result-details-front.php?examid=<?=$fetch['exam_id']?>&course=<?=$fetch['course']?>&sub=<?=$fetch['subject']?>"><img src="images/view.png"></a></td>
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
<!-- section 1 --> 
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
</body>
</html>