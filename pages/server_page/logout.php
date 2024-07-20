<?php
session_start();
unset($_SESSION['user_dat']);
header('Location:../index.php');
?>