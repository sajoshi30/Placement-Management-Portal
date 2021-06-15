  <?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: student_log_in.php");
    exit;
}

include('config.php');
$key = $_SESSION['username'];



if(isset($_POST['changepass'])){
  $oldp = $_POST['oldpass'];
  $newp = $_POST['newpass'];
  $newp2 = $_POST['newpass2'];

  if($newp2 != $newp)
  {
                 echo "<div align='center'style='background-color: #d6403594;'><h2 style='color: #b9160a'>New password and Confirm Password Donot Match !</h2></div>";
                  header( "refresh:2; url=student_home_page.php" );

  } 
  else{


$oldpassquery = "SELECT * FROM `studentuser` where enr='$key' and pass='$oldp'";
$newpassquery = "UPDATE `studentuser` SET `pass`= '$newp' WHERE enr='$key'";
$resultold = mysqli_query($link, $oldpassquery);
    $num = mysqli_num_rows($resultold);
    
    if ($num == 1){
        
                
                if ($link->query($newpassquery) === TRUE) {
                echo "<div align='center'style='background-color: #42e00e80;'><h2 style='color: #4caf50'>Password Updated!</h2></div>";
                
                header( "refresh:2; url=student_home_page.php" );
                } else {
                 echo "Error updating record: " . $link->error;
                 echo "<div align='center'style='background-color: #d6403594;'><h2 style='color: #b9160a'>Something Went Wrong!</h2></div>";
                 header( "refresh:2; url=student_home_page.php" );
                }
              }
            else{
                 $showError = "Old password Is Invalid!";

                
                 echo "<div align='center'style='background-color: #d6403594;'><h2 style='color: #b9160a'>$showError</h2></div>";
                  header( "refresh:2; url=student_home_page.php" );
            }
            
       }
     } 
       
      
   
?>





  <!DOCTYPE html>
  <html>
  <head>
  	<link rel="stylesheet" type="text/css" href="loginstyle.css">
    <link rel="stylesheet" type="text/css" href="buttonstyle.css">
  	<title></title>
  </head>
  <body>
    <style>
      button{
    background-color: blue;
    color: white;
    width: fit-content;
    margin-top: 8px;
  }
    </style>
  <div id="maindivlogin">
    <form method="POST">   
      <div align="center" id="logindiv1">    
      <h2 style="padding: 11px;">Change Password</h2>
      </div>
        <div align="center">
      <input class="inputs" type="text" name="oldpass" placeholder="Old Password" required="" autofocus="" /><br>
      <input type="password" class="inputs" name="newpass" placeholder="New Password" />  <br>
      <input type="password" class="inputs" name="newpass2" placeholder="Confirm Password"/>  <br>
      <button name="changepass" class="button" type="submit"><span>UPDATE</span></button> 
      
      </div> 
    </form>
  </div>
  </body>
  </html>


  