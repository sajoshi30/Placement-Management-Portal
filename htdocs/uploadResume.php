<?php 

include 'config.php';
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: student_log_in.php");
    exit;
}

$enr = $_SESSION['username'];
$sendenr = $enr*3-293922;
if (!file_exists("uploads/".$sendenr))
mkdir("uploads/".$sendenr);






// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
  $folder_path = "uploads/".$sendenr;
      $files = glob($folder_path.'/*'); 

       foreach($files as $file) {
   
      if(is_file($file)) 
         unlink($file); 

        }

    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'uploads/'.$sendenr.'/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['pdf'])) {
        echo "<div align='center'style='background-color: #d6403594;'><h2 style='color: #b9160a'>File extension must be .pdf</h2></div>";
    } elseif ($_FILES['myfile']['size'] > 5000000) {
        echo  "<div align='center'style='background-color: #d6403594;'><h2 style='color: #b9160a'>FILE TOO LARGE!</h2></div>";
    } else {
      
    
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
           // $sql = "INSERT INTO files (name, size, downloads) VALUES ('$filename', $size, '0')";
            $query = "UPDATE `studententries` SET `resume`= 'http://placementcomp.byethost33.com/uploads/$sendenr/$filename' WHERE `COL 3` = '$enr'";
            if (mysqli_query($link, $query)) {
                echo "<div align='center'style='background-color: #42e00e80;'><h2 style='color: #4caf50'>RESUME UPLOADED SUCCESSFULLY!</h2></div>";
                header( "refresh:2; url=student_home_page.php" );
            }
        } else {
            echo "<div align='center'style='background-color: #d6403594;'><h2 style='color: #b9160a'>FAILED TO UPLOAD!</h2></div>";
        }
    }
}



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" type="text/css" href="loginstyle.css">
    <link rel="stylesheet" type="text/css" href="buttonstyle.css">
    <title>Resume</title>
  </head>
  <body>
    <style>
     button{
      color: white;
    margin-top: 5px;
    padding-right: 30px;
    padding-left: 30px;
    padding-top: 3px;
    padding-bottom: 3px;
    margin-top: 8px;
    background-color: blue;
     }
    </style>
    <div id="maindivlogin">
      <div class="row">
        <form action="uploadResume.php" method="post" enctype="multipart/form-data" >
          
          <div align="center" id="logindiv1">    
      <h2 style="padding: 11px;">UPLOAD RESUME</h2>
      </div>
      <div align="center" style="margin-top: 50px;">
          
          <input  class="inputs" type="file" name="myfile" style="margin-left: 50px;"> <br>
          <button  class="button" type="submit" name="save"><span>UPLOAD</span></button>

      </div> 
        </form>
      </div>
    </div>
  </body>
</html>





