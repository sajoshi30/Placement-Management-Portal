<?php
/*session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: student_log_in.php");
    exit;
}*/

include('config.php');


$querypost = "select * from `totalcompanies`";
$resultpost = mysqli_query($link,$querypost);




		
?>



<!DOCTYPE html>
<html style="font-size: 80%">
<head>
	

	<title>ADMIN</title>
</head>
<body style="font-family: sans-serif;">
<style>
td{
    width : 300px;
}

</style>

<?php 
$count = 0;
while ($rows = mysqli_fetch_assoc($resultpost)) {

        
		$comname = $rows['company'];
		
        ?>
       

 <div width="fit-content" style="border: 0.5px solid;border-radius: 10px;margin-bottom: 3px;margin-top: 3px;">
 <table  width="fit-content" cellpadding="15px" >
	
    <tr>
		<td>
        <?php echo 'User IP Address - '. $_SERVER['REMOTE_ADDR']; ?>
			<h2><?php echo $comname ?></h2>
		</td>
		<td>
     <?php $lowcomname = strtolower($comname); ?> 
    <button onclick="location.href='export.php?comp=<?php echo $lowcomname; ?>'" class="btn btn-primary">Export Results</button> 
		</td>
    <td>
      <form method="POST" action="controlposts.php">
       <button id='<?php echo $count ?>' name='button<?php echo $count ?>' onclick="toggle()" class="btn btn-primary">OFF</button>
       </form>
		</td>	
		</td>
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

