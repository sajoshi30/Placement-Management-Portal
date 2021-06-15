<?php
session_start();
include "config.php";
date_default_timezone_set('Asia/Kolkata');
$enr = $_SESSION['username'];
$cdate = date('d/m/Y h:i:s a', time());

$logdetails = "UPDATE `studentuser` SET `endtime`='$cdate' WHERE `enr`='$enr'";
 if ($link->query($logdetails) === TRUE) {
 }
$_SESSION['loggedin'] = false;
unset($_SESSION['username']);
header("Location: student_log_in.php");
?>