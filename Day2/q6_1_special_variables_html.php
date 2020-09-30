<html>
	<form action='q6_1_special_variables_html.php' method='GET'>
		<h3>First side of triangle : </h3>
		<input type='text' name='a'><br>
		<h3>Second side of triangle : </h3>
		<input type='text' name='b'><br>
		<h3>Thitd side of triangle : </h3>
		<input type='text' name='c'><br>
		<input type='submit' value='Click here'><br>
	</form>
</html>

<?php

@$a = $_GET[a];
@$b = $_GET[b];
@$c = $_GET[c];
	
if($a&$b&$c)
{
	if($a>0&&$b>0&&$c>0)
	{
		if((hypot($a,$b)==$c)||(hypot($b,$c)==$a)||(hypot($c,$a)==$b))
			echo "It is rigth angle triangle";
		else if($a==$b && $a==$c)
			echo "It is equilateral triangle";
		else if($a==$b || $b==$c || $c==$a)
			echo "It is isosceles triangle";
		else
			echo "It is scalene triangle";
	}
	else
	{
		echo "Invalid inputs";
	}
}
?>
	
