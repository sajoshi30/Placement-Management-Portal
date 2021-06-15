<?php

 
//Include required PHPMailer files
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';
	include'config.php';
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	if($_SERVER["REQUEST_METHOD"] == "POST"){

	 $enr = $_POST['enr'];
	 $getemail = "select * from `studentuser` where `enr`='$enr'";
	 
               $result = $link -> query($getemail);
                if($result->num_rows >0)
                {
                  $row = $result->fetch_assoc();
                   
                       if(!empty($row['email']))
                       {
                           $receieveremail = $row['email'];
                           $studentenr = $row['enr'];
                           $studentpass = $row['pass'];
                       }
                       else{
                           echo "<div align='center'style='background-color: #d6403594;'><h2 style='color: #b9160a'>Something Went Wrong!</h2></div>";
                           header("refresh:2; url=student_log_in.php");
                           exit();
                       }
                   }
               

                       	
//Define name spaces
	
//Create instance of PHPMailer
	$mail = new PHPMailer();
//Set mailer to use smtp
	$mail->isSMTP();
//Define smtp host
	$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
	$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "tls";
//Port to connect smtp
	$mail->Port = "587";
//Set gmail username
	$mail->Username = "gecdplacementcommittee@gmail.com";
//Set gmail password
	$mail->Password = "gecd@389151";
//Email subject
	$mail->Subject = "GECD Placement Portal";
//Set sender email
	$mail->setFrom('gecdplacementcommittee@gmail.com');
//Enable HTML
	$mail->isHTML(true);
//Attachment
//	$mail->addAttachment('img/attachment.png');
//Email body
	$mail->Body = "Hello,<br><br> We have recieved a password recovery request from you.<br><br> Your login details are :-<br><br> Username : ".$studentenr."<br>Password : ".$studentpass;
//Add recipient
	$mail->addAddress($receieveremail);
//Finally send email
	if ( $mail->send() ) {
		echo "<div align='center'style='background-color: #42e00e80;'><h2 style='color: #4caf50'>Password sent to your email!</h2></div>";
        header("refresh:2; url=student_log_in.php");
	}else{
		echo "<div align='center'style='background-color: #d6403594;'><h2 style='color: #b9160a'>Something Went Wrong!</h2></div>";
        header("refresh:2; url=student_log_in.php");
	}
//Closing smtp connection
	$mail->smtpClose();
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
    margin-top: 12px;
    padding-left: 13px;
    padding-right: 13px;
    padding-top: 2px;
    padding-bottom: 2px;

  }
  
    </style>
  <div id="maindivlogin">
    <form method="POST" action="forgotPassword.php">   
      <div align="center" id="logindiv1">    
      <h2 style="padding: 8px;">Forgot Password</h2>
      </div>
        <div id = "logindiv" align="center" style="padding: 5px;" >
      <input  class="inputs" type="text" name="enr" placeholder="Enrolment No." required="" autofocus="" /><br>
      <button class="button" style="padding-top : 7px;padding-bottom : 7px;padding-right : 10px;padding-left : 10px;" name="changepass" type="submit"><span style="text-decoration : bold;">SEND</span></button> 
      <p style="margin-top: 28px;">Note : Your password will be sent to your registered email.</p>
      </div> 
    </form>
  </div>
  </body>
  </html>