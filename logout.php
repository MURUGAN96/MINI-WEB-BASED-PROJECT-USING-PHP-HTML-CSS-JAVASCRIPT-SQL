<html>

<head>
    <title>Logout</title>
</head>

<body>
    <?php 
session_start();
$email = $_SESSION['email'];
unset($_SESSION['email']); 
session_destroy(); 
header("location: index.php"); 
exit();
if(!isset($_SESSION['email'])) 
{
echo 'You are not logged in. <a href="index.php">Click here</a> to log in.';
header("location:index.php");
}
?>
</body>

</html>