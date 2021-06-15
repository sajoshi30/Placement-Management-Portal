<?php

session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: student_log_in.php");
    exit;
}


$key = $_SESSION['username'];

include_once('config.php');


$query = "SELECT * FROM `studententries` WHERE `COL 3`= '$key'";
$result = mysqli_query($link,$query);

while ($rows = mysqli_fetch_assoc($result)) {
$firstname = $rows['COL 1'];	
$lastname = $rows['COL 2'];
$enr = $rows['COL 3'];	
$email = $rows['COL 4'];	
$mobile	= $rows['COL 5'];
$whatsapp = $rows['COL 6'];	
$address = $rows['COL 7'];
$currentloc = $rows['currentloc'];	
$skypeid = $rows['COL 8'];	
$tenth = $rows['COL 9'];	
$twelvth = $rows['COL 10'];	
$diplomacgpa = $rows['COL 11'];	
$spi1 = $rows['COL 12'];	
$spi2 = $rows['COL 13'];	
$spi3 = $rows['COL 14'];	
$spi4 = $rows['COL 15'];	
$spi5 = $rows['COL 16'];	
$cpi = $rows['COL 17'];	
$cgpa = $rows['COL 18'];	
$knowmtech = $rows['COL 19'];	
$interestedtech = $rows['COL 20'];	
$placementexp = $rows['COL 21'];	
}



?>





<!DOCTYPE html>
<html style="font-size: 62.5%;">
<head>
	<title>My Details</title>
</head>
<body>

<style>
	table,td{
		border: 1px solid blue;
	}
	button{
		background-color: blue;
		font-size: 2rem;
		color: white;
		width: 40rem;
	}
	


</style>
<div align="center" style="background-color: blue;width: 100%;font-size: 3rem;margin-top : -1px;">
	<h2 style="color: white;font-family: sans-serif;">STUDENT DETAILS</h2>
</div>

<table align="center" cellpadding="5%" style="font-size: 2rem; font-family: sans-serif;width: 50% ">
	
	
    

    <?php 
    

    ?>
	<tr><td>First Name</td><td><?php echo $firstname ?></td></tr>
	<tr><td>Last Name</td><td><?php echo $lastname ?></td></tr>
	<tr><td>Enrolment No</td><td><?php echo $enr ?></td></tr>
	<tr><td>Email</td><td><?php echo $email ?></td>	</tr>
	<tr><td>Mobile</td><td><?php echo $mobile ?></td></tr>	
	<tr><td>WhatsApp</td><td><?php echo $whatsapp ?></td></tr>	
	<tr><td>Address</td><td><?php echo $address ?></textarea></td></tr>	
    <tr><td>Current Location</td><td><?php echo $currentloc ?></td></tr>
	<tr><td>SkypeId</td><td><?php echo $skypeid ?></td></tr>	
	<tr><td>10th %</td><td><?php echo $tenth ?></td></tr>	
	<tr><td>12 %</td><td><?php echo $twelvth ?></td></tr>	
	<tr><td>Diploma CGPA</td><td><?php echo $diplomacgpa ?></td></tr>	
	<tr><td>SEM 1</td><td><?php echo $spi1 ?></td></tr>	
	<tr><td>SEM 2</td><td><?php echo $spi2 ?></td></tr>	
	<tr><td>SEM 3</td><td><?php echo $spi3 ?></td></tr>	
	<tr><td>SEM 4</td><td><?php echo $spi4 ?></td></tr>	
	<tr><td>SEM 5</td><td><?php echo $spi5 ?></td></tr>	
	<tr><td>CPI</td><td><?php echo $cpi ?></td></tr>	
	<tr><td>CGPA</td><td><?php echo $cgpa ?></td></tr>	
	<tr><td>Known Tech.</td><td><?php echo $knowmtech ?></textarea></td></tr>		
    <tr><td>Interested Tech.</td><td><?php echo $interestedtech ?></textarea></td></tr>	
    <tr><td>Placemnt Exp.</td><td><?php echo $placementexp ?></td></tr>
    <tr><td></td><td><button name="editbutton" onclick="location.href='student_updatedetails.php';">EDIT</button></tr>	
   




</table>



</body>
</html>