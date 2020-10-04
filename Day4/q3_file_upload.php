<html>
<h3>Upload a file!</h3>
<form action="q3_file_upload.php" method="POST" enctype="multipart/form-data">
  <input type="file" name="file"><p>
  <input type="submit" value="Upload">
</form>
</html>

<?php

@$name= $_FILES["file"]["name"];
@$type= $_FILES["file"]["type"];
@$size= $_FILES["file"]["size"];
@$temp= $_FILES["file"]["tmp_name"];
@$error= $_FILES["file"]["error"];
@$upload = "Uploaded/".$name;

if(!$error)
{
  move_uploaded_file($temp,$upload);
	echo "Upload Complete!<br>";
	echo "Name of file: ".$name."<br>";
	echo "Type of file: ".$type."<br>";
  echo "Size of file: ".$size."<br>";
}
else
{
  die("Error while uploading file! $error.");
}

?>
