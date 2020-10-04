<html>
	<h1>Update Student</h1>
	<form action='q2.php' method='POST'>
		<h3>Name of Student : </h3>
		<input type='text' name='name'>
		<h3>Marks in Each Subject </h3>
		<h3>Subject 1: </h3>
		<input type='text' name='s1'><br>
		<h3>Subject 2: </h3>
		<input type='text' name='s2'><br>
		<h3>Subject 3: </h3>
		<input type='text' name='s3'><br>
		<h3>Subject 4: </h3>
		<input type='text' name='s4'><br>
		<h3>Subject 5: </h3>
		<input type='text' name='s5'><br><br>
		<input type='submit' value='Submit'><br>
	</form>
</html>
<?php

require("connect.php");

@$name = $_POST[name];
@$s1 = $_POST[s1];
@$s2 = $_POST[s2];
@$s3 = $_POST[s3];
@$s4 = $_POST[s4];
@$s5 = $_POST[s5];

if($name && $s1 && $s2 && $s3 && $s4 && $s5)
{
	$total = $s1+$s2+$s3+$s4+$s5;
	$MaxTotal = 500;
	$per = ($total/$MaxTotal)*100;

	$update = "UPDATE class1 SET sub1=$s1,sub2=$s2,sub3=$s3,sub4=$s4,sub5=$s5,total_obtained=$total,percent=$per WHERE name='$name'";
  mysqli_query($conn, $update) or die("Update failed" . mysqli_connect_error());
	//mysqli_close($conn);

}

else
{
	echo " ";
}

$select = "SELECT * FROM class1";
$fetch = mysqli_query($conn, $select) or die("Fetch failed " . mysqli_connect_error());

if(mysqli_num_rows($fetch) > 0)
{
	while ($row = mysqli_fetch_assoc($fetch)) {
		echo "id: ".$row["id"]." - Name of Student: ".$row['name']." - Subject 1: ".$row['sub1']." - Subject 2: ".$row['sub2']." - Subject 3: ".$row['sub3']." - Subject 4: ".$row['sub4']." - Subject 5: ".$row['sub5'];
		echo " - Total Marks Obtained: ".$row['total_obtained']." - Total Marks: ".$row['total_marks']." - Percentage: ".$row['percent']."<br>";
		}
}
else {
	echo "No result";
}
mysqli_close($conn);

?>
