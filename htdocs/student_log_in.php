<?php
//header("Location: https://placement.rf.gd/student_log_in.php");

$login = false;
$showError = false;
echo $showError;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'config.php';
    $username = $_POST["enr"];
    $password = $_POST["pass"]; 

   
    if ($username == "admin" && $password == "123") {
    	echo "admin";
    	header("location: adminpage.php");
    	exit();
    }
    

    

    $sql = "select * from studentuser where enr='$username' and pass = '$password'";
    $result = mysqli_query($link, $sql);
    $num = mysqli_num_rows($result);
    
    if ($num == 1){
        
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
              /*  $showError = "Login Successful!";
                echo "<div align='center'style='background-color: #d6403594;'><h2 style='color: #b9160a'>$showError</h2></div>";
                $checkresumeuploded = "select resume from `studententries` where `COL 3`='$username'";
                $resultofcheck = $link -> query($checkresumeuploded);
                if($resultofcheck->num_rows >0)
                {
                  $row = $resultofcheck->fetch_assoc();
                   
                       if(empty($row['resume']))
                            {
                            header("location: uploadResume.php");
                           }
                       else{*/
                            $checkdetails = "select `currentloc` from `studententries` where `COL 3`='$username'";
                            $resultofcheckdet = $link -> query($checkdetails);
                            $row1 = $resultofcheckdet->fetch_assoc();
                            if(empty($row1['currentloc']))
                            {
                               header("location: student_updatedetails.php");  
                            }
                            else{
                              header("location: student_home_page.php");
                            }


                           
                      // }
      
                //}
                     
                
              }
            else{
                $showError = "Invalid Details!";
                echo "<div align='center'style='background-color: #d6403594;'><h2 style='color: #b9160a'>$showError</h2></div>";
                header("location: student_log_in.php");
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
      <h2 style="padding: 11px;">LOGIN</h2>
      </div>
      <div align="center">
      <input class="inputs" type="text" name="enr" maxlength="12" placeholder="Enrolment No" required="" autofocus="" /><br>
      <input type="password" class="inputs" name="pass" placeholder="password" />  <br>
      <button class="button" style="padding-top : 7px;padding-bottom : 7px;padding-right : 10px;padding-left : 10px;" id="loginbutton" type="submit"><span>Login</span></button> 
      <p><a href="forgotPassword.php">Forgot Password ?</a></p>
      </div> 
    </form>
  </div>
  </body>
  </html>


  