<!DOCTYPE html>
<html>
<head>
	<title>Feedback form</title>
</head>
<body>
<form action="q2_send_mail.php" method="POST">
	<p>
		Name:
		<input type="text" name="name"><br>
	</p>
	<p>
		Email:
		<input type="text" name="email"><br>
	</p>
	<p>Feedback: </p>
	<textarea name="feedback"></textarea><br>

	<input type="submit" name="submit"><br>


</form>
</body>
</html>

<?php
//iti_set("SMTP","karthikajitudy@gmail.com");

if($_POST['submit']){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$feedback=$_POST['feedback'];
	if ($name&&$email) {
		$from= "karthikajitudy@gmail.com"; //use your email id
		$subject="Feedback form";
		$headers="From:".$from;
		$message="thank you for your feedback";

		$send = mail($email, $subject, $message);
		$admin= "karthikajitudy@gmail.com"; //use your email id
		$subjectadmin="$name Details";
    $headersadmin="From : $name ,$email";
    $bodyadmin="Name : ".$name."\n Email : ".$email."\n Feedback : ".$feedback;
    $feedbackmail = mail($admin,$subjectadmin,$bodyadmin,$headersadmin);
		if( $send == true && $feedbackmail == true) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
	}
	else
		echo "error";
}


?>
