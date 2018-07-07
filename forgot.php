<html>

<head>
	<title>FORGOT PASSWORD</title>
</head>

<body align="center" style="background: url(pen.jpg);margin-top: 25%;color: white;font-size: 0.5in">
	<?php
$connection=mysqli_connect("localhost","root","","test");
if(isset($_POST) & !empty($_POST)){
	$email = mysqli_real_escape_string($connection, $_POST['email']);
    $sql = "SELECT * FROM user WHERE email = '$email'";
  $res = mysqli_query($connection, $sql);  
    $count = mysqli_num_rows($res);
	if($count == 1){
		$r = mysqli_fetch_assoc($res);
		$password = $r['password'];
		$to = $r['email'];
		$subject = "Your Recovered Password";
		$message = "Please use this password to login " . $password;
		$headers = "From : 1murugan23@gmail.com";
		if(mail($to, $subject, $message, $headers)){
			echo "Your Password has been sent to your email id";
		}else{
			echo "Failed to Recover your password, try again";
		}
	}else{
		echo "User name does not exist in database";
	}
}
?>
<br>
<a style="text-decoration: none" href="index.php" class="btn">Go back to login</a>
</body>

</html>