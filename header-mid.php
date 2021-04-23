<header id="header" class="clear"> 

    <div id="logo" class="fl_left">
    <a href="index.php"><img src="images/logo1.png" /></a>
    </div>
	<div class="fl_right">
	  <div style="color:#FFFFFF;"><img src="images/icon-chat.png" border="0" />&nbsp;<?=getAddress('1','phone')?>
        <img src="images/mail.png" height="25" width="35" />&nbsp;<?=getAddress('1','email')?></div>
       
      <form class="clear" method="post" action="franchise-search.php">
        <fieldset>
          <legend>Search:</legend>
          <input type="text" name="search" id="search" value="<?=$_REQUEST['search']?>" required placeholder="Search by Franchise Name">
          <button class="fa fa-search" type="submit" title="Search"><em>Search</em></button>
        </fieldset>
      </form>
    </div>
	
  </header>