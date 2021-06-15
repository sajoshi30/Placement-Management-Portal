<?php

session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: student_log_in.php");
    exit;
}
include_once('config.php');

//$myEnr = $_GET['enrol'];

 
$key = $_SESSION['username'];
 

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

	
if (isset($_POST['savebutton'])) {
	

   $firstname = $_POST['firstname'];	
   $lastname = $_POST['lastname'];
   $email = $_POST['email'];	
   $mobile	= $_POST['mobile'];
   $whatsapp = $_POST['whatsapp'];	
   $address = $_POST['address'];	
   $currentloc = $_POST['currentloc'];
   
   $skypeid = $_POST['skypeid'];	
   $tenth = $_POST['tenth'];	
   $twelvth = $_POST['twelvth'];	
   $diplomacgpa = $_POST['diplomacgpa'];	
   $spi1 = $_POST['spi1'];	
   $spi2 = $_POST['spi2'];	
   $spi3 = $_POST['spi3'];	
   $spi4 = $_POST['spi4'];	
   $spi5 = $_POST['spi5'];	
   $cpi = $_POST['cpi'];	
   $cgpa = $_POST['cgpa'];	
   $knowmtech = $_POST['knowmtech'];	
   $interestedtech = $_POST['interestedtech'];	
   $placementexp = $_POST['placementexp'];


	$updatequery = " UPDATE `studententries` SET `COL 1`= '$firstname',`COL 2`= '$lastname' ,`COL 4`= '$email',`COL 5`= '$mobile',`COL 6`='$whatsapp',`COL 7`= '$address',`COL 8`= '$skypeid',`COL 9`= '$tenth' ,`COL 10`= '$twelvth',`COL 11`= '$diplomacgpa',`COL 12`= '$spi1',`COL 13`= '$spi2',`COL 14`= '$spi3',`COL 15`='$spi4',`COL 16`='$spi5',`COL 17`='$cpi',`COL 18`= '$cgpa' ,`COL 19`= '$knowmtech',`COL 20`='$interestedtech',`COL 21`='$placementexp',`currentloc` = '$currentloc' WHERE `COL 3`='$enr' ";

	header("location: student_home_page.php");
  
   //$updatequery = " UPDATE studententries SET `COL 1`= '$fname' WHERE `COL 3` ='$enr' ";



if ($link->query($updatequery) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $link->error;
}



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
<div align=center style="background-color: blue;width: 100%;font-size: 3rem;">
	<h2 style="color: white;font-family: sans-serif;">EDIT DETAILS</h2>
</div>

 <form method="POST" >

<table align="center" cellpadding="5%" style="font-size: 2rem; font-family: sans-serif;width: 50% ">
	
	
   
	<tr><td>First Name</td><td><input type="text" name="firstname" value="<?php echo $firstname ?>"required="" autofocus=""></td></tr>
	<tr><td>Last Name</td><td><input type="text" name="lastname" value="<?php echo $lastname ?>" required="" autofocus=""></td></tr>
	<tr><td>Enrolment No</td><td><input type="text" name="enr" value="<?php echo $enr ?>" readonly></td></tr>
	<tr><td>Email</td><td><input type="text" name="email" value="<?php echo $email ?>" required="" autofocus=""></td>	</tr>
	<tr><td>Mobile</td><td><input type="text" name="mobile" value="<?php echo $mobile ?>" required="" autofocus=""></td></tr>	
	<tr><td>WhatsApp</td><td><input type="text" name="whatsapp" value="<?php echo $whatsapp ?>" required="" autofocus=""></td></tr>	
	<tr><td>Address</td><td><textarea type="text" name="address" required="" autofocus=""><?php echo $address ?></textarea></td></tr>
    <tr><td>Current Location</td><td><input type="text" name="currentloc" value="<?php echo $currentloc ?>" required="" autofocus=""></td></tr>	
	<tr><td>SkypeId</td><td><input type="text" name="skypeid" value="<?php echo $skypeid ?>" required="" autofocus="" ></td></tr>	
	<tr><td>10th %</td><td><input type="text" name="tenth" value="<?php echo $tenth?>" required="" autofocus=""></td></tr>	
	<tr><td>12 %</td><td><input type="text" name="twelvth"value="<?php echo $twelvth ?>" ></td></tr>	
	<tr><td>Diploma CGPA</td><td><input type="text" name="diplomacgpa"value="<?php echo $diplomacgpa ?>" ></td></tr>	
	<tr><td>SEM 1</td><td><input type="text" name="spi1"value="<?php echo $spi1 ?>" ></td></tr>	
	<tr><td>SEM 2</td><td><input type="text" name="spi2"value="<?php echo $spi2 ?>" ></td></tr>	
	<tr><td>SEM 3</td><td><input type="text" name="spi3"value="<?php echo $spi3 ?>" required="" autofocus=""></td></tr>	
	<tr><td>SEM 4</td><td><input type="text" name="spi4"value="<?php echo $spi4 ?>" required="" autofocus=""></td></tr>	
	<tr><td>SEM 5</td><td><input type="text" name="spi5"value="<?php echo $spi5 ?>" required="" autofocus=""></td></tr>	
	<tr><td>CPI</td><td><input type="text" name="cpi"value="<?php echo $cpi ?>" required="" autofocus=""></td></tr>	
	<tr><td>CGPA</td><td><input type="text" name="cgpa"value="<?php echo $cgpa ?>" required="" autofocus=""></td></tr>	
	<tr><td>Known Tech.</td><td><textarea type="text" name="knowmtech" required="" autofocus="" ><?php echo $knowmtech ?></textarea></td></tr>		
    <tr><td>Interested Tech.</td><td><textarea type="text" name="interestedtech" required="" autofocus=""><?php echo $interestedtech ?></textarea></td></tr>	
    <tr><td>Placemnt Exp.</td><td><textarea type="text" name="placementexp"><?php echo $placementexp ?></textarea></td></tr>	
    <tr><td></td><td><button name="savebutton">SAVE</button></tr>	
    </form>




</table>



</body>
</html>