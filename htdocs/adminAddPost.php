<?php
/*session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: student_log_in.php");
    exit;
}*/
?>



<!DOCTYPE html>
<html>
<head>
	<title>Add Post</title>
</head>
<body style="font-family: sans-serif;">

<div style="height: fit-content;width: 100%; background-color: blue;">
<div style="display: flex;margin-left: 6px;">
<a style= "text-decoration: none;" href="adminpage.php"><h3 style="color: white;margin-right: 20px;">HOME</h3></a>

<a style= "text-decoration: none;" href=""><h3 style="color: white;margin-right: 20px;">QUERIES</h3></a>

<div style="margin-left: 60%;">
<a style= "text-decoration: none;" href=""><h3 style="color: white;margin-right: 20px;">SIGN OUT</h3></a>
</div>	
</div>
</div>

<h2>FILL DETAILS :</h2>
<form method="POST" action="">
	<table>
	<tr><td>Company Name</td><td><input type="text" name="companyname" required=""></td></tr>
	<tr><td>Eligibility</td><td><input type="text" name="eligibility" required=""></td></tr>
	<tr><td>Description</td><td><textarea type="text" name="description" required=""></textarea></td></tr>
	<tr><td>Link</td><td><input type="text" name="link" required=""></td></tr>
	<tr><td>Roles</td><td><input type="text" name="roles" required=""></td></tr>
	<tr><td>Last date for apply</td><td><input type="date" name="lastdate" required=""></td></tr>
	<tr><td></td><td><button name="addbutton">ADD</button></tr>
	




	</table>



</form>
</body>
</html>

<?php
include('config.php');
if (isset($_POST["addbutton"])) {
	
	$com = $_POST['companyname'];
	$el = $_POST['eligibility'];
	$des =  $_POST['description'];
	$ink = $_POST['link'];
	$roles = $_POST['roles'];
	$lastdate =$_POST['lastdate'];
	echo $lastdate;


    $insertquery = "INSERT INTO `adminposts`(`companyname`, `eligiblity`, `description`,`lastdate`,`roles`,`link`) VALUES ('$com','$el','$des','$lastdate','$roles','$ink')";
    $lowercom = strtolower($com);
    $insertquery2 = "INSERT INTO `totalcompanies`(`company`) VALUES ('$lowercom')";

    if ($link->query($insertquery) === TRUE && $link->query($insertquery2) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $link->error;
}
$lowercom = strtolower($com);

$createtable = " CREATE TABLE `$lowercom` (enr VARCHAR(100),role VARCHAR(100))";

  if($link->query($createtable) === TRUE) {
  echo "Record updated successfully";
  } 
  else {
  echo "Error updating record: " . $link->error;
}
}

?>