<?php
$n1 = 10;
$n2 = 20;
$ch = "div";

switch($ch)
{
	case "add":
		$add = $n1+$n2;
		echo "Addition = $add";
		break;
		
	case "sub":
		$sub = $n1-$n2;
		echo "Subtraction = $sub";
		break;
		
	case "mul":
		$mul = $n1*$n2;
		echo "Multiplication = $mul";
		break;
	
	case "div":
		if($n2!=0)
			$div = $n1/$n2;
		else
			$div = "INF";
		echo "Division = $div";
		break;
		
	default:
		echo "Error: Invalid operator";
}
?>