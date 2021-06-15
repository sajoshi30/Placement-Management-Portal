<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: student_log_in.php");
    exit();

}

include('config.php');
$key = $_SESSION['username'];

?>



<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="loginstyle.css">
    <link rel="stylesheet" type="text/css" href="buttonstyle.css">
	<title>Queries</title>
</head>
<body>



	 <div id="maindivlogin">
    <form method="POST">   
      <div align="center" id="logindiv1">    
      <h2 style="padding: 11px;">QUERY/SUGGESTIONS</h2>
      </div>
      <div align="center">
      <textarea style="width: 250px;height: 120px; "class="inputs" type="text" name="que"  placeholder="Write here.." required="" autofocus="" ></textarea><br>
        <br>
      <button id="loginbutton" style="padding-top : 7px;padding-bottom : 7px;padding-right : 10px;padding-left : 10px;" name="send" class="button" type="submit"><span>Send</span></button> 
      
      </div> 
    </form>
  </div>
</body>
</html>

<?php 
$statusinsert = "YOUR APPLICATION HAS BEEN SUBMITED";
if(isset($_POST['send'])){
	echo "string";
	echo '<script>alert("YOUR APPLICATION HAS BEEN SUBMITED")</script>';
    $querybystudent = $_POST['que'];
    $insertapplied = "INSERT INTO `studentqueries`(`enr`, `query`) VALUES ('$key','$querybystudent')";
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


