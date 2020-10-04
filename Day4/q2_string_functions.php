<html>
<body>
    <form action="q2_string_functions.php" method="post">
        <h3>Enter a string: </h3>
        <input type="text" name="string"><br><br>
        <input type="submit">
    </form>
</body>
    </html>


<?php

$str  = @$_POST["string"];
$substr = substr($str,5);
if($str)
{
    echo "You have sumbitted $str as string<br>";
    echo "The number of characters in string are: ". strlen($str)."<br>";
    echo "String after converted into array: ";
    echo var_dump(str_split($str));
    echo "<br>";
    echo "String Reverse: ". strrev($str)."<br>";
    echo "The string in lower case: ". strtolower($str)."<br>";
    echo "The string in upper case: ". strtoupper($str)."<br>";
    echo "The substring from given string: $substr<br>";
    echo "The string after replacing with substring: ". str_replace($substr,"hello",$str);
}
else {
  echo "Please enter the string";
}

?>
