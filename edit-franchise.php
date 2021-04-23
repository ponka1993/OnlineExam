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
<title>Myeduteacher</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="layout/styles/jquery-ui.css" rel="stylesheet" type="text/css" media="all">
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
	   <p align="center" style="line-height:25px;font-size:20px; color:#FF0000">Welcome <span style="color:#7d1935"><?=getFranchise($_SESSION['fid'],'franname')?></span>&nbsp;&nbsp;Registratiotn ID&nbsp;<span style="color:#7d1935"><?=getFranchise($_SESSION['fid'],'franchise_id')?></span></p>
       <h2><strong>Edit Franchise </strong></h2>
	   <?php 
       $sql2="SELECT *FROM `study_franchise` WHERE `id`='".$_SESSION['fid']."'";
       $res2=query($sql2);
       $num2=numrows($res2);
       $fetch2=fetcharray($res2);
       ?>
	   <?php if($_REQUEST['m']=='edit'){?><p align="center" style="color:#009900;">Profile Successfully Updated!</p><?php }?>
        <form name="form1" action="edit-franchise-process.php" method="post">
		 <div class="one_third first">
            <label for="name">Franchise Name <span>*</span></label>
            <input type="text" name="franname" id="franname" value="<?=$fetch2['franname']?>"   placeholder="Enter Franchise Name">
          </div>
          <div class="one_third">
            <label for="email">Person Name <span>*</span></label>
            <input type="text" name="pname" id="pname" value="<?=$fetch2['pname']?>"   placeholder="Enter Person Name">
          </div>
          <div class="one_third">
            <label for="url">Password <span>*</span></label>
            <input type="text" name="password" id="password" value="<?=$fetch2['password']?>"  placeholder="Enter Password">
          </div>
		  
		  <div class="one_third first">
            <label for="name">Email</label>
            <input type="text" name="email" id="email" value="<?=$fetch2['email']?>"   placeholder="Enter Email">
			
			</div>
          <div class="one_third">
            <label for="email">Address <span>*</span></label>
            <input type="text" name="address" id="address" value="<?=$fetch2['address']?>"   placeholder="Enter Address" >
          </div>
          <div class="one_third">
            <label for="url">Phone <span>*</span></label>
            <input type="text" name="phone" id="phone" value="<?=$fetch2['phone']?>"   placeholder="Enter Phone Number">
          </div>
		  
		  <div class="one_third first">
            <label for="name">State</label>
            <select name="state" id="state" class="selectbox"><option value="">Select State</option>
            <?php
            $sql="SELECT *FROM `study_state`  ORDER BY `state`";
            $res=query($sql);
			$num=numrows($res);
			if($num>0)
			{
            while($fetch=fetcharray($res))
            {
            ?>
            <option value="<?=$fetch['id']?>"<?php if($fetch2['state']==$fetch['id']){echo 'selected';}?>><?=ucwords($fetch['state'])?></option>
            <?php }}?>
            </select>
			
			</div>
			
			<div class="one_third">
            <label for="email">City <span>*</span></label>
            <input type="text" name="city" id="city" value="<?=$fetch2['city']?>"   placeholder="Enter City">
          </div>
          <div class="one_third">
            <label for="url">Pincode<span>*</span></label>
            <input type="text" name="pincode" id="pincode" value="<?=$fetch2['pincode']?>"  placeholder="Enter Pincode">
          </div>
		  <div class="specer">&nbsp;</div>
          <div>
            <input name="submit" type="submit" value="UPDATE">
            
            
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