<html>

<head>
    <title>Management Records</title>
    <link type="text/css" rel="stylesheet" href="view.css">
</head>

<body align="center">
    <h1>View Records</h1>
  <div><input id="logout" type="button" onclick="location.href='logout.php';" value="Logout" /></div>
    <br>
    <?php
include('connect-db.php');
if ($result = $mysqli->query("SELECT * FROM collegue ORDER BY id"))
{
if ($result->num_rows > 0)
{
echo "<table border='1'align='center' cellpadding='10'>";
echo "<tr>
    <th>Collegue ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Stationary item</th>
    <th>Manage</th><th>Manage</th></tr>";
while ($row = $result->fetch_object())
{
echo "<tr>";
echo "<td>" . $row->id . "</td>";
echo "<td>" . $row->firstname . "</td>";
echo "<td>" . $row->lastname . "</td>";
echo "<td>" . $row->stationary_item . "</td>";
echo "<td><a  href='records.php?id=" . $row->id . "'>Edit</a></td>";
echo "<td><a style=color:red href='delete.php?id=" . $row->id . "'>Delete</a></td>";
echo "</tr>";
}
echo "</table>";
}
else
{
echo "No results to display!";
}
}
else
{
echo "Error: " . $mysqli->error;
}
$mysqli->close();
?>
        <br>
        <input id="new" type="button" onclick="location.href='records.php';" value="Add New Record" />
</body>

</html>