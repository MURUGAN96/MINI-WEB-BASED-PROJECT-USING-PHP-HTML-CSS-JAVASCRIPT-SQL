<html>
    <head>
        <title>REGISTER</title>
    </head>
<body>
<?php
include("dataconnect.php"); 
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{ 
$inname = $_POST["name"];
$inemail = $_POST["email"];
$inpassword = $_POST["password"];
$encryptPassword = password_hash($inpassword, PASSWORD_DEFAULT);
$stmt = $db->prepare("INSERT INTO user(name, email, password) VALUES(?, ?, ?)");
$stmt->bind_param("sss", $inname, $inemail, $encryptPassword);
$stmt->execute();
$result = $stmt->affected_rows;
$stmt -> close();
$db -> close(); 
if($result > 0)
{
header("location: index.php");
}
else
{
echo "Oops. Something went wrong. Please try again"; 
?>
<a href="register.php">Try Login</a>
<?php 
}
}
?>
</body> 
</html>