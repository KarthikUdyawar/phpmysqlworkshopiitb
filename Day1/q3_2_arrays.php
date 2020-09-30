<?php
    $a=array(array(6,2),array(11,3));
    $b=array(array(5,3),array(4,3));

	echo "Matrix A  <br>";
	
	for($i=0;$i<2;$i++)
    {
        for($j=0;$j<2;$j++)
        {
            echo $a[$i][$j]." ";
        }
        echo "<br>";
    }
	
	echo "Matrix B  <br>";
	
	for($i=0;$i<2;$i++)
    {
        for($j=0;$j<2;$j++)
        {
            echo $b[$i][$j]." ";
        }
        echo "<br>";
    }

    echo "Matrix Addition <br>";

    for($i=0;$i<2;$i++)
    {
        for($j=0;$j<2;$j++)
        {
            echo $a[$i][$j]+$b[$i][$j]." ";
        }
        echo "<br>";
    }
?>