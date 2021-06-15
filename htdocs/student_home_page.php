<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: student_log_in.php");
    exit;
}

include('config.php');
$enr = $_SESSION['username'];



$querypost = "select * from adminposts";
$resultpost = mysqli_query($link,$querypost);
date_default_timezone_set('Asia/Kolkata');
$curdate = date("Y-m-d");
$cdate = date('d/m/Y h:i:s a', time());

$logdetails = "UPDATE `studentuser` SET `time`='$cdate' WHERE `enr`='$enr'";
 if ($link->query($logdetails) === TRUE) {
 }

		
?>

  




<!DOCTYPE html>
<html style="font-size: 80%">
<head>
    <link rel="stylesheet" type="text/css" href="buttonstyle.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
</head>
<body >

	<style>
		button{
			background-color: blue;
			color: white;
		}
		h3{
			padding-left: 12px;
			padding-top: 1px;
			padding-bottom: 1px;
		}
        a:hover 
		{
			
			font-size : 1.5rem;
			text-decoration: underline;
			color : orange;
		}

	</style>

    <style>
body {
  font-family: sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: blue;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 18px;
  color: white;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
    font-size : 1.5rem;
	
	color : orange;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
	background-color: blue;
	color: white;
	height: 50px;
  transition: margin-left .5s;
  padding: 11px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="student_home_page.php">HOME</a>
  <a href="applied.php">MY APPLICATIONS</a>
  <a href="companylist.php">VIEW COMPANIES</a>
  <a  href="student_details.php">UPDATE DETAILS</a>

 <a  href="student_queries.php">QUERIES</a>
 <a  href="changepassword.php">CHANGE PASSWORD</a>
 <a href="uploadResume.php">UPDATE RESUME</a>
 <a href="logout.php">LOGOUT</a>
</div>

<div id="main">
 <span id="menubutton" style="font-size:20px;cursor:pointer;" onclick="openNav()">&#9776; MENU</span>
</div>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("menubutton").style.display = "none";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("menubutton").style.display = "block";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
<?php 
$count = 0;
while ($rows = mysqli_fetch_assoc($resultpost)) {

        
		$comname = $rows['companyname'];
		$el = $rows['eligiblity'];
		$des = $rows['description'];
		$lastdate = $rows['lastdate'];
		$ink = $rows['link'];
        $status = $rows['status'];
        $show = $rows['show'];
        if($show == 1){


		
        ?>





 <div class="homediv" width="fit-content" style="border: 0.5px solid blue;border-radius: 5px;margin-bottom: 3px;margin-top: 1px;margin-left : 3px;margin-right : 3px;">
 <table  width="fit-content" cellpadding="15px" >
	
    <tr>
		<td>
			
		</td>
		<td>
			
			<h2><?php echo $comname ?></h2>
		</td>
	</tr>


	<tr>
		<td>
			ELIGIBILITY:
		</td>
		<td>
			<?php echo $el ?>
		</td>
	</tr>

	<tr>
		<td>
			DESCRIPTION:
		</td>
		<td>
			<?php echo $des ?>
		</td>
	</tr>

		<tr>
		<td>
			DETAILS:
		</td>
		<td>
			<a href="<?php echo $ink; ?>">For more details click here</a>
		</td>
	</tr>

	</tr>

	<tr>
		<td>
			LASTDATE:
		</td>
		<td>
			<?php echo $lastdate; ?>
		</td>
	</tr>

	</tr>

		<tr>
		<td>
			
		</td>
        <?php 
        if($status==0){

         ?>
		<td>
			<BUTTON name="<?php echo $comname; ?>" style = "background-color: grey;padding  : 9px; border-radius: 5px;" disabled>APPLY</BUTTON>
		</td>
		<?php 
		   }
		   else
		   { 
		  	?>
		  	<td>
		  		
			<BUTTON class="button" name="<?php echo $count; ?>" onclick="location.href='send_application.php?com=<?php echo $comname; ?>';"><span> APPLY </span></BUTTON>
		</td>
		<?php } ?>
 	</tr>

</table>

</div>

<?php 
$count++;
} }
?>

</div>






</body>
</html>


