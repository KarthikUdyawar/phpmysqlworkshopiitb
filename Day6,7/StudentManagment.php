<html>
<head><h1>
  Student Managment System</h1>
</head>
<body>
  <form action="StudentManagment.php" method="POST">
    <h3>Enter the student seat No. :</h3>
    <input type="test" name="id"><br>
    <h3>Password :</h3>
    <input type="password" name="password"><p>
    <input type="submit" value="Submit">
  </form>
</body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "marksheet";

$conn = mysqli_connect($servername, $username, $password, $db) or die("Connection failed: " . mysqli_connect_error());

@$id = $_POST[id];
@$pass = md5($_POST[password]);
$flag = 0;

if($id && $pass)
{
  if($id == '10102020' && $pass == '0192023a7bbd73250516f069df18b500')
  {
    echo "<footer>
           Click here for <a href='admin.php'>Admin</a><p>
          </footer>";
  }
  else
  {
    $select = "SELECT * FROM student WHERE id=$id";
    $fetch = mysqli_query($conn, $select) or die("Fetch failrd: ".mysqli_connect_error());

    if (mysqli_num_rows($fetch) > 0)
    {
      for($row = 0;$row = mysqli_fetch_assoc($fetch);$row++)
      {
        if($pass == $row['password'])
        {
          $total = $row['php']+$row['mysql']+$row['html'];
          $Outof = 300;
          $per = $total/3;
          if($per>=80)
          {
            $grade = 'Distinction';
            echo "Congratulation ".$row['name']."! You got ".$grade;

          }
          elseif ($per<80 && $per>=60)
          {
            $grade = 'First Class';
            echo "Congratulation ".$row['name']."! You got ".$grade;

          }
          elseif ($per<60 && $per>=40)
          {
            $grade = 'Second Class';
            echo "You got ".$grade;
          }
          else
          {
            $grade = 'Failed';
            echo "You failed :(";
          }

          $table = "<table border = '1'>
               <tr>
                  <th>Seat No.</th>
                  <td>".$row['id']."</td>
               </tr>
               <tr>
                  <th>Student Name</th>
                  <td>".$row['name']."</td>
               </tr>
               <tr>
                  <th>Student e-mail</th>
                  <td>".$row['email']."</td>
               </tr>
               <tr>
                  <th>PHP</th>
                  <td>".$row['php']."</td>
               </tr>
               <tr>
                  <th>MySQL</th>
                  <td>".$row['mysql']."</td>
               </tr>
               <tr>
                  <th>HTML</th>
                  <td>".$row['html']."</td>
               </tr>
               <tr>
                  <th>Total</th>
                  <td>".$total."</td>
               </tr>
               <tr>
                  <th>Out of</th>
                  <td>".$Outof."</td>
               </tr>
               <tr>
                  <th>Persentage</th>
                  <td>".$per."%</td>
               </tr>
               <tr>
                  <th>Grade</th>
                  <td>".$grade."</td>
               </tr>
            </table><p>";

            echo $table;

            $subject = "Student Marksheet";
            $body = $table."<p>Congratulation ".$row['name']."! You got ".$grade;
            $header = "From: karthikajitudy@gmail.com";

            if(mail($row['email'], $subject, $body, $header))
            {
              echo "Email successfully sent to ".$row['email'];
            }
            else {
              echo "Email sending failed...";
            }
        }
        else
        {
          echo "Incorrect password<br>";
        }
      }
    }
    else
    {
      echo "Invalid id<br>";
    }
    mysqli_close($conn);
  }
}
else
{
  echo "Please enter the details<br>";
}
 ?>
</html>
