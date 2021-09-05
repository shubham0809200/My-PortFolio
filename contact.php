<?php

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Database connection
$conn = new mysqli("localhost","root","","test1");
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Something went wrong, Try Again!: ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration1(name, email, subject, message) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss",$name, $email, $subject, $message);
		$execval = $stmt->execute();
		echo $execval;
		echo "Your message has been sent. Thank you!";
		$stmt->close();
		$conn->close();
	}

?>
