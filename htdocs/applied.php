<div align="center" style="height: 50px; background-color: blue;margin-top: -1px; margin-bottom: 8px;"><h1 style="padding-top: 5px;color: white;">YOUR APPLICATIONS</h1></div>

<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: student_log_in.php");
    exit;
}

$key = $_SESSION['username'];

include('config.php');





$query_totcom = "SELECT * FROM `totalcompanies`";
$res_totcom = mysqli_query($link,$query_totcom);
while ($rows = mysqli_fetch_assoc($res_totcom)) {
	$temp = $rows['company'];
	$subquery = "select * from `$temp` where `enr` = '$key'";
	$result_subquery = mysqli_query($link,$subquery);
	$num = mysqli_num_rows($result_subquery);
	if ($num == 1){
     
	

		
?>

<!DOCTYPE html>
<html>
<head>
	
	<title>My Applications</title>
</head>
<body style="font-family: sans-serif;">
<div align="center">

 <div align="center" style="background-color: white;
    padding: 12px;
    width: 50%;
    border: solid 0.5px blue;
    height: 50px;
    margin-top: 3px;
    border-radius: 20px;"><h2 ><?php echo strtoupper($rows['company']); ?></h2></div>
</div>
</body>
</html>

<?php  
	}
}

		?>