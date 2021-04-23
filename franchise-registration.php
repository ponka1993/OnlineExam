<?php
session_start();
include('includes/function.php');
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
       <h2>Freanchise Registration <strong>(<font color="#FF0000">*</font>) Mandatory Field</strong></h2>
	   <?php if($_REQUEST['m']==1){?><p align="center" style="color:#009900;"><strong>New Franchise Registration request sent to Administrator!</strong></p><?php }?>
        <form name="registration" action="franchise-registration-process.php" method="post" >
		 <div class="one_third first">
            <label for="name">Franchise Name <span>*</span></label>
            <input type="text" name="franname" id="franname" value=""  required placeholder="Enter Franchise Name">
          </div>
          <div class="one_third">
            <label for="email">Person Name <span>*</span></label>
            <input type="text" name="pname" id="pname" value=""  required placeholder="Enter Person Name">
          </div>
          <div class="one_third">
            <label for="url">Password <span>*</span></label>
            <input type="text" name="password" id="password" value="" required placeholder="Enter Password">
          </div>
		  
		  <div class="one_third first">
            <label for="name">Email</label>
            <input type="text" name="email" id="email" value=""   placeholder="Enter Email">
			
			</div>
          <div class="one_third">
            <label for="email">Address <span>*</span></label>
            <input type="text" name="address" id="address" value=""  required placeholder="Enter Address" >
          </div>
          <div class="one_third">
            <label for="url">Phone <span>*</span></label>
            <input type="text" name="phone" id="phone" value=""  required placeholder="Enter Phone Number">
          </div>
		  
		  <div class="one_third first">
            <label for="name">State</label>
            <select name="state" id="state" class="selectbox"><option value="">Select State</option>
           <?php
           $sql="SELECT *FROM `study_state`  ORDER BY `state`";
           $res=mysql_query($sql);
           while($fetch=mysql_fetch_array($res))
           {
           ?>
           <option value="<?=$fetch['id']?>"><?=ucwords($fetch['state'])?></option>
           <?php }?>
           </select>
			
			</div>
			
			<div class="one_third">
            <label for="email">City <span>*</span></label>
            <input type="text" name="city" id="city" value=""  required placeholder="Enter City">
          </div>
          <div class="one_third">
            <label for="url">Pincode<span>*</span></label>
            <input type="text" name="pincode" id="pincode" value="" required placeholder="Enter Pincode">
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