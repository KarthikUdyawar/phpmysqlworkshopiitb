<html>
<head><h1>
  Student Managment System (Admin mode)</h1>
</head>
<body>
  <a href='StudentManagment.php'>Go back</a><p>
  <form action='admin.php' method='POST'>
    <label for='options'>Choose a option: </label>
    <select id='options' name='options'>
      <option value='--'>--</option>
      <option value='insert'>Insert</option>
      <option value='update'>Update</option>
      <option value='delete'>Delete</option>
    </select><p>
    Seat No. : <input type='test' name='id'>
    Name : <input type='test' name='name'>
    e-mail :<input type='test' name='email'>
    password :<input type="test" name="password"><p>
    PHP : <input type='test' name='php' size='4'>
    MySQL : <input type='test' name='mysql' size='4'>
    HTML : <input type='test' name='html' size='4'>
    <input type='submit' value='Double click to edit'>
  </form>
</body>

<?php

@$id = $_POST['id'];
@$name = $_POST['name'];
@$email = $_POST['email'];
@$pass = md5($_POST[password]);
@$php = $_POST['php'];
@$mysql = $_POST['mysql'];
@$html = $_POST['html'];

$servername = "localhost";
$username = "root";
$password = "";
$db = "marksheet";

$conn = mysqli_connect($servername, $username, $password, $db) or die("Connection failed: " . mysqli_connect_error());

$select = "SELECT * FROM student";
$fetch = mysqli_query($conn, $select) or die("Fetch failrd: ".mysqli_connect_error());
echo "<table border = '1'>
       <tr>
          <th>Seat No.</th>
          <th>Student Name</th>
          <th>Student e-mail</th>
          <th>PHP</th>
          <th>MySQL</th>
          <th>HTML</th>
          <th>Total</th>
          <th>Out of</th>
          <th>Persentage</th>
          <th>Grade</th>
       </tr>";

if (mysqli_num_rows($fetch) > 0)
{
  for($row = 0;$row = mysqli_fetch_assoc($fetch);$row++)
  {
    $total = $row['php']+$row['mysql']+$row['html'];
    $Outof = 300;
    $per = $total/3;
    if($per>=80)
    {
      $grade = 'Distinction';
    }
    elseif ($per<80 && $per>=60)
    {
      $grade = 'First Class';
    }
    elseif ($per<60 && $per>=40)
    {
      $grade = 'Second Class';
    }
    else
    {
      $grade = 'Failed';
    }
    echo "<tr>
            <td>".$row['id']."</td>
            <td>".$row['name']."</td>
            <td>".$row['email']."</td>
            <td>".$row['php']."</td>
            <td>".$row['mysql']."</td>
            <td>".$row['html']."</td>
            <td>".$total."</td>
            <td>".$Outof."</td>
            <td>".$per."%</td>
            <td>".$grade."</td>
          </tr>";
  }
  echo "</table><p>";
}
else
{
  echo "No data";
}

@$choose = $_POST['options'];
if($choose == 'insert')
{
  echo "Insert successfully<br>";
  $insert = "INSERT INTO student VALUES ('$id','$name','$email','$pass','$php','$mysql','$html')";
  mysqli_query($conn, $insert) or die("Insert failed: " . mysqli_connect_error());
}
elseif ($choose == 'update')
{
  echo "Update successfully<br>";
  $update = "UPDATE student SET name='$name',email='$email',password='$pass',php=$php,mysql=$mysql,html=$html WHERE id=$id";
  mysqli_query($conn, $update) or die("Update failed" . mysqli_connect_error());
}
elseif ($choose == 'delete')
{
  echo "Delete successfully<br>";
  $delete = "DELETE FROM student WHERE id=$id";
  mysqli_query($conn, $delete) or die("Delete failed" . mysqli_connect_error());

}
else {
  echo "Select options";
}
?>
