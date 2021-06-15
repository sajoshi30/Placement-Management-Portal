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
	<title>Admin</title>
</head>
<body style="font-family: sans-serif;">

<div style="height: fit-content;width: 100%; background-color: blue;">
<div style="display: flex;margin-left: 6px;">
<a style= "text-decoration: none;" href="adminAddPost.php"><h3 style="color: white;margin-right: 20px;">NEW POST</h3></a>
<a style= "text-decoration: none;" href="controlposts.php"><h3 style="color: white;margin-right: 20px;">POST STATUS</h3></a>
<a style= "text-decoration: none;" href=""><h3 style="color: white;margin-right: 20px;">QUERIES</h3></a>

<div style="margin-left: 60%;">
<a style= "text-decoration: none;" href=""><h3 style="color: white;margin-right: 20px;">SIGN OUT</h3></a>
</div>	
</div>
</div>



</body>
</html>