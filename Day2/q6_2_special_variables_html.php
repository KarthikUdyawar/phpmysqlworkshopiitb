<html>
	<form action='q6_2_special_variables_html.php' method='POST'>
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
		<input type='text' name='s5'><br>
		<input type='submit' value='Click here'><br>
	</form>
</html>
<?php

@$name = $_POST[name];
@$s1 = $_POST[s1];
@$s2 = $_POST[s2];
@$s3 = $_POST[s3];
@$s4 = $_POST[s4];
@$s5 = $_POST[s5];

if($name&$s1&$s2&$s3&$s4&$s5)
{
	$total = $s1+$s2+$s3+$s4+$s5;
	$per = ($total/500)*100;
	
	echo "Name of Student: ".$name."<br>";
	echo "Marks in Each Subject<br>";
	echo "Subject 1: ".$s1." marks<br>";
	echo "Subject 2: ".$s2." marks<br>";
	echo "Subject 3: ".$s3." marks<br>";
	echo "Subject 4: ".$s4." marks<br>";
	echo "Subject 5: ".$s5." marks<br>";
	echo "Total Marks Obtained: ".$total." marks<br>";
	echo "Total Marks: 500 marks<br>";
	echo "Percentage: ".$per."%<br>";
	
}

else
{
	echo "Error: Invalid Input";
}

?>

