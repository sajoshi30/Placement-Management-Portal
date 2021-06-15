<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: student_log_in.php");
    exit;
}

include('config.php');
$key = $_SESSION['username'];


		
?>


<?php

$comname = $_GET['com'];
$lowercomname = strtolower($comname);
$uppercomname = strtoupper($comname);

$alreadyapplied = false;

$checkappliedquery = "select * from `$lowercomname` where enr='$key'";
$result = mysqli_query($link, $checkappliedquery);
    $num = mysqli_num_rows($result);
    
    if ($num == 1){
    	$alreadyapplied=true;
    	echo "<h1 align='center' style='font-family: serif; color:green;'>YOU HAVE ALREADY APPLIED FOR $uppercomname !</h1>";
    	exit();
    }

    $querypost = "select `roles` from adminposts where `companyname`='$comname'";
    $resultpost = mysqli_query($link,$querypost);
    while ($rows = mysqli_fetch_assoc($resultpost)) {
    $roles = $rows['roles'];
    }
    $str_arr = explode (",", $roles);
    


?>







<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="loginstyle.css">
    <link rel="stylesheet" type="text/css" href="buttonstyle.css">
	<title>Apply</title>
</head>
<body style="font-family: sans-serif;">

<style>

	button{
		background-color: blue;
		color: white;
		width: fit-content;
	}
	td,tr{
		width: 40px;
	}
    a:hover 
		{
			
			font-size : 1.2rem;
			text-decoration: underline;
			color : orange;
		}
	


</style>
  <div id="maindivlogin">
    <form method="POST">   
      <div align="center" id="logindiv1">    
      <h2 style="padding: 11px;">APPLY</h2>
      </div>
      <div align="center">
     <a href="student_details.php?enrol=<?php echo $recieveenr ?>" style="margin-top: 30px;">Click here to check your details!</a>
        <br>
        <select name="drop" placeholder = "select role" style="padding: 5px;width: 130px;margin-bottom: 5px;margin-top: 30px;">
	<?php 
     for ($i=0; $i < count($str_arr); $i++) { 
     ?>
	<option><?php echo $str_arr[$i]; ?></option>	
    <?php } ?>
	</select><br>
      <button id="loginbutton" name="apply" class="button" style="padding : 10px;" onclick="alert('Your application has been submited');" type="submit"><span>Send</span></button> 
      
      </div> 
    </form>
  </div>

</body>
</html>

<?php 
$statusinsert = "YOUR APPLICATION HAS BEEN SUBMITED";
if(isset($_POST['apply'])){
	echo "string";
	echo '<script>alert("YOUR APPLICATION HAS BEEN SUBMITED")</script>';
    $selectedrole = $_POST['drop'];
    $insertapplied = "INSERT INTO `$lowercomname`(`enr`, `role`) VALUES ('$key','$selectedrole')";
    if($link->query($insertapplied) === TRUE) {
     echo "done";

     } 
     else {
     echo "Error updating record: " . $link->error;
     $statusinsert = "".$link->error;
     }
     
      header("location: student_home_page.php");


}
 ?>