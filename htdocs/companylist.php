<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: student_log_in.php");
    exit;
}

include('config.php');
$enr = $_SESSION['username'];
$sendenr = $enr*3-293922;


$querypost = "select * from adminposts";
$resultpost = mysqli_query($link,$querypost);

$curdate = date("Y-m-d");



		
?>

  




<!DOCTYPE html>
<html style="font-size: 80%">
<head>
	<link rel="stylesheet" type="text/css" href="sidenavstyle.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="buttonstyle.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Companies</title>
</head>
<body >

	<style>
		button{
			background-color: blue;
			color: white;
			padding: 5px;
			border-radius: 5px;
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


<?php 
$count = 0;
while ($rows = mysqli_fetch_assoc($resultpost)) {

        
		$comname = $rows['companyname'];
		$el = $rows['eligiblity'];
		$des = $rows['description'];
		$lastdate = $rows['lastdate'];
		$ink = $rows['link'];


		
        ?>





 <div class="homediv" width="fit-content" style="border: 0.5px solid;border-radius: 10px;margin:3px;">
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

	

	

</table>

</div>

<?php 
$count++;
} 
?>

</div>






</body>
</html>


