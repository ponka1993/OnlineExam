<?php
session_start();
include('includes/function.php');
?>
<select name="subject" id="subject" class="selectbox"  required><option value="">Select Subject</option>
<?php
$sql="SELECT *FROM `study_subject` WHERE `course`='".$_REQUEST['course']."'";
$res=mysql_query($sql);
while($fetch=mysql_fetch_array($res))
{
?>
<option value="<?=$fetch['id']?>"><?=ucwords($fetch['subject'])?></option>
<?php }?>
</select>





