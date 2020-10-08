<html>
<h1>Login</h1>
<form action='q1_md5.php' method='POST'>
  <h3>Username : </h3>
  <input type='text' name='name'>
  <h3>Password : </h3>
  <input type='password' name='password'>
  <input type='submit' value='Submit'><br>
</form>

<?php

require("connect.php");

@$name =  $_POST[name];
@$pass = md5($_POST[password]);

//echo $name."<br>";
//echo $pass."<br><br>";

if($name && $pass)
{
  $select = "SELECT * FROM password1";
  $fetch = mysqli_query($conn, $select) or die("Fetch failed: " . mysqli_connect_error());
  $flag = 0;

  if(mysqli_num_rows($fetch) > 0)
  {
    for ($row = 0;$row = mysqli_fetch_assoc($fetch);$row++)
    {
      if($name == $row['name'] && $pass == $row['password'])
      {
        $flag = 1;
      }
      elseif ($name == $row['name'] && $pass != $row['password'])
      {
        $flag = 2;
      }
    }
  }
  else
  {
  	$flag = 0;
  }

  if($flag==2)
  {
    echo "Incorrect password";
  }

  elseif($flag==1)
  {
    echo "Login success! Welcome ".$name."<br>";
  }

  else {
    $insert = "INSERT INTO password1 VALUES ('','$name','$pass')";
    mysqli_query($conn, $insert) or die("Insert failed: " . mysqli_connect_error());
    echo "New user account has been created";
  }

  mysqli_close($conn);
}
else {
  echo "Please enter the Username and password";
}

?>
