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

	  <div>&nbsp;</div>
        <table width="90%" align="center" cellpadding="0" cellspacing="0" border="0">
		<?php
        $sql="SELECT * FROM `study_answer_given` WHERE `uid`='".$_SESSION['uid']."' AND `exam_id`='".$_REQUEST['examid']."' AND `course`='".$_REQUEST['course']."' AND `subject`='".$_REQUEST['sub']."'";
		$res=query($sql);
		$num=numrows($res);
		if($num>0)
		{
		$i=1;
		while($fetch=fetcharray($res))
		{
		?>
		<tr><td valign="top">Q.<?=$i?></td><td valign="top"><?=getExamquestion($fetch['quesid'],'question')?></td></tr>
		<tr><td valign="top">Ans</td>
		<?php if( getCorrect($fetch['quesid'],'correct')==$fetch['answer']){ ?>
		<td valign="top" style="color:#00FF00;"><?=$fetch['answer']?></td>
		<?php }else{?>
		<td valign="top" style="color:#FF0000;"><?=$fetch['answer']?></td>
		<?php }?>
		</tr>
		<tr><td colspan="2">&nbsp;</td></tr>
		<?php $i++;}}?>
       </table> 
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