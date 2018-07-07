<?php
include('connect-db.php');
if (isset($_GET['id']) && is_numeric($_GET['id']))
{
$id = $_GET['id'];
if ($stmt = $mysqli->prepare("DELETE FROM collegue WHERE id = ? LIMIT 1"))
{
$stmt->bind_param("i",$id);
$stmt->execute();
$stmt->close();
}
else
{
echo "ERROR";
}
$mysqli->close();
header("Location: view.php");
}
else
{
header("Location: view.php");
}
?>
