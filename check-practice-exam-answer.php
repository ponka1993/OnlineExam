<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['uid']))
{
redirect('index.php');
}

$sqlpa="SELECT * FROM `study_exam_question` WHERE `id`='".$_REQUEST['ques']."' AND `course`='".$_REQUEST['course']."' AND `subject`='".$_REQUEST['subject']."' AND `chapter`='".addslashes($_REQUEST['chapter'])."'";
$respa=query($sqlpa);
$numpa=numrows($respa);
$fetchpa=fetcharray($respa);
?>
<table width="90%" border="0" align="center">
<tr>
<td align="center" valign="middle">
<div class="answer">
<table width="100%" border="0">
<tr>
<td width="18%" align="left" valign="middle" style="font-size:14px; font-weight:bold; color:#990000;">Correct Answer : </td>
<td width="82%" align="left" valign="middle" class="ans"><?=stripslashes($fetchpa['correct'])?></td>
</tr>
</table>
</div>
</td>
</tr>
<tr>
<td align="center" valign="middle">&nbsp;</td></tr>
</table>

