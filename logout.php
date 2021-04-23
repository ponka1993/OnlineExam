<?php
session_start();
include('includes/function.php');

unset($_SESSION['uid']);
redirect('index.php');
?>