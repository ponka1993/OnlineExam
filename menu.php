<div class="rounded">
    <nav id="mainav" class="clear">
      <ul class="clear">
	  <?php $num=tempExam($_SESSION['uid']); ?> 
        <li <?php if($pageid==1){?>class="active" <?php }?>><a <?php if($num<1) {?>href="index.php"<?php } else { ?>href="#"<?php } ?>>Home</a></li>
		<li <?php if($pageid==2){?>class="active" <?php }?>><a <?php if($num<1) {?>href="about.php"<?php } else { ?>href="#"<?php } ?>>About Us</a></li>
        <li <?php if($pageid==3){?>class="active" <?php }?>><a class="drop" href="#">Student</a>
          <ul>
		    <?php if($_SESSION['uid']){?>
		    <li><a <?php if($num<1) {?>href="dashboard.php"<?php } else { ?>href="#"<?php } ?>>DASHBOARD</a></li>
			<li><a <?php if($num<1) {?>href="saq-exam.php"<?php } else { ?>href="#"<?php } ?>>PRACTICE SAQ</a></li>
            <li><a <?php if($num<1) {?>href="practice-exam.php"<?php } else { ?>href="#"<?php } ?>>PRACTICE MCQ</a></li>
            <li><a <?php if($num<1) {?>href="on-line-exam.php"<?php } else { ?>href="#"<?php } ?>>ONLINE EXAM (ONLY MCQ)</a></li>
            <li><a <?php if($num<1) {?>href="result-details.php"<?php } else { ?>href="#"<?php } ?>>RESULT</a></li>
            <li><a <?php if($num<1) {?>href="logout.php"<?php } else { ?>href="#"<?php } ?>>LOG OUT</a></li>
			<?php }else{?>
            <li><a href="student-registration.php">REGISTRATION</a></li>
			<?php if($_SESSION['fid']==''){?>
            <li><a href="student-login.php">LOGIN</a></li>
			<?php }}?>
          </ul>
        </li>
		<?php if($_SESSION['uid']==''){?>
        <li <?php if($pageid==4){?>class="active" <?php }?>><a class="drop" href="#">FREANCHISE</a>
          <ul>
		    <?php if($_SESSION['fid']){?>
		    <li><a href="franchise-account.php">MY ACCOUNT</a></li>
            <li><a href="edit-franchise.php">EDIT PROFILE</a></li>
            <li><a href="franchise-student.php">STUDENT</a></li>
            <li><a href="signout.php">SIGNOUT</a></li>
			<?php }else{?>
            <li><a href="franchise-registration.php">REGISTRATION</a></li>
            <li><a href="franchise-login.php">SIGNIN</a></li>
			<li><a href="franchise-list.php">FRANCHISE LIST</a></li>
            <?php }?>
            
          </ul>
        </li>
		<?php }?>
        <li <?php if($pageid==5){?>class="active" <?php }?>><a <?php if($num<1) {?>href="careers.php"<?php } else { ?>href="#"<?php } ?>>Careers</a></li>
        <li <?php if($pageid==6){?>class="active" <?php }?>><a <?php if($num<1) {?>href="course.php"<?php } else { ?>href="#"<?php } ?>>Course</a></li>
        <li <?php if($pageid==7){?>class="active" <?php }?>><a <?php if($num<1) {?>href="gallery.php"<?php } else { ?>href="#"<?php } ?>>gallery</a></li>
        <li <?php if($pageid==8){?>class="active" <?php }?>><a <?php if($num<1) {?>href="contact.php"<?php } else { ?>href="#"<?php } ?>>Contact Us</a></li>
      </ul>
      
    </nav>
  </div>