<?php
include("connect-db.php");
function renderForm($first = '', $last ='',$stationary ='', $error = '', $id = '')
{ ?>
    <html>
    <head>
        <title>
            <?php if ($id != '') { echo "Edit Record"; } else { echo "New Record"; } ?>
        </title>
        <link type="text/css" rel="stylesheet" href="records.css">
    </head>
    <body align="center">
        <h1 id='heading'>
            <?php if ($id != '') { echo "Edit Record"; } else { echo "New Record"; } ?>
        </h1>
        <?php if ($error != '') {
echo "<div id='error'>" . $error
. "</div>";
} ?>
        <form action="#" method="post">
            <div>
                <?php if ($id != '') { ?>
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <p>Collegue ID:
                    <?php echo $id; ?>
                </p>
                <?php } ?>
                <strong>First Name: *</strong>
                <input id="fname" type="text" name="firstname" value="<?php echo $first; ?>" required>
                <br>
                <strong>Last Name: *</strong>
                <input id="lname" type="text" name="lastname" value="<?php echo $last; ?>" required>
                <br>
                <strong>Stationary item: *</strong>
                <input id="sitem" type="text" name="stationary_item" value="<?php echo $stationary; ?>"
                required>
                <br>
                <br>
            </div>
            <input id="sub" type="submit" name="submit" value="Save" />
            <br>
            <input id="back" type="button" onclick="location.href='view.php';" value="Back" />
            <p>
                <b>Stationary items available are Notebooks And Pen</b>
            </p>

        </form>
    </body>

    </html>

    <?php }
if (isset($_GET['id']))
{
if (isset($_POST['submit']))
{
if (is_numeric($_POST['id']))
{
$id = $_POST['id'];
$firstname = htmlentities($_POST['firstname'], ENT_QUOTES);
$lastname = htmlentities($_POST['lastname'], ENT_QUOTES);
$stationary_item = htmlentities($_POST['stationary_item'], ENT_QUOTES);
if ($firstname == '' || $lastname == '')
{
$error = 'ERROR: Please fill in all required fields!';
renderForm($firstname, $lastname, $error, $id);
}
else
{
if ($stmt = $mysqli->prepare("UPDATE collegue SET firstname = ?, lastname = ?, stationary_item = ?
WHERE id=?"))
{
$stmt->bind_param("sssi", $firstname, $lastname, $stationary_item, $id);
$stmt->execute();
$stmt->close();
}
else
{
echo "ERROR: could not prepare SQL statement.";
}
header("Location: view.php");
}
}
else
{
echo "Error!";
}
}
else
{
if (is_numeric($_GET['id']) && $_GET['id'] > 0)
{
$id = $_GET['id'];
if($stmt = $mysqli->prepare("SELECT * FROM collegue WHERE id=?"))
{
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($id, $firstname, $lastname, $stationary_item);
$stmt->fetch();
renderForm($firstname, $lastname, $stationary_item, NULL, $id);
$stmt->close();
}
else
{
echo "Error: could not prepare SQL statement";
}
}
else
{
header("Location: view.php");
}
}
}
else
{
if (isset($_POST['submit']))
{
$firstname = htmlentities($_POST['firstname'], ENT_QUOTES);
$lastname = htmlentities($_POST['lastname'], ENT_QUOTES);
$stationary_item = htmlentities($_POST['stationary_item'], ENT_QUOTES);
if ($firstname == '' || $lastname == '' )
{
$error = 'ERROR: Please fill in all required fields!';
renderForm($firstname, $lastname, $error);
}
else
{
if ($stmt = $mysqli->prepare("INSERT collegue (firstname, lastname, stationary_item) VALUES (?, ?, ?)"))
{
$stmt->bind_param("sss", $firstname, $lastname, $stationary_item);
$stmt->execute();
$stmt->close();
}
else
{
echo "ERROR: Could not prepare SQL statement.";
}
header("Location: view.php");
}
}
else
{
renderForm();
}
}
$mysqli->close();
?>