<!doctype html>
<html>
  <head>

    
    
      <link rel="shortcut icon" href="z/o.png" type="image/x-icon">

    
    
    
<style>
      
body
{
     
 background-color: #5F5AFF;    
     
     
} 
 </style>
    
    
  <?php
    include("config.php");
 
    if(isset($_POST['upload'])){
       $maxsize = 100242880; // 100MB
 
       $name = $_FILES['file']['name'];
       $target_dir = "videos/";
       $target_file = $target_dir . $_FILES["file"]["name"];

       // Select file type
       $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       // Valid file extensions
       $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

       // Check extension
       if( in_array($videoFileType,$extensions_arr) ){
 
          // Check file size
          if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
            echo "File too large. File must be less than 5MB.";
          }else{
            // Upload
            if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
              // Insert record
              $query = "INSERT INTO video(name,location) VALUES('".$name."','".$target_file."')";

              $query = mysqli_query($con,$query);
              if($query)
              {
              echo "Upload successfully.";
              }
            }
          }

       }else{
          echo "Invalid file extension.";
       }
 
     } 
     ?>
    
  </head>
  <body>
    <form method="post" action="" enctype='multipart/form-data'>
      <input type='file' name='file' />
      <input type='submit' value='Upload' name='upload'>
    </form>

  

  </body>
</html>