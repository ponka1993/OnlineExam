<?php
session_start();
include('includes/function.php');
unset($_SESSION['fid']);
redirect('index.php');
?>