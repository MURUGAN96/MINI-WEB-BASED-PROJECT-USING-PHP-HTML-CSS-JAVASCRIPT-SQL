<html>
<body>
<?php 
 include_once("dataconnect.php"); 
 session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{ 
if (empty($_POST['email']) || empty($_POST['password'])) 
 { 
 echo 
 "Incorrect mail-id or password"; 
 header("location: index.php");
 } 
 $inemail = $_POST["email"]; 
 $inpassword = $_POST["password"]; 
 $stmt= $db->prepare("SELECT email, password FROM user WHERE email = ?");
 $stmt->bind_param("s", $inemail);
 $stmt->execute();
 $stmt->bind_result($emailDB, $passwordDB);
 if ($stmt->fetch() && password_verify($inpassword, $passwordDB)) 
 {
 $_SESSION['email']=$inemail;
 header("location:view.php");
 }
 else
 {
        echo "Incorrect username or password"; 
    ?>
  <a href="index.php">Login</a>
        <?php 
  } 
  } 
        ?>
 </body> 
 </html>