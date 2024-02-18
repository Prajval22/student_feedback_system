<?php
// Assuming you have a MySQL connection
$mysqli = new mysqli('localhost', 'root', '', 'new');
// $connetion = mysqli->connect_error;
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
// Assuming you have a MySQL connection
$subject = $_GET['subject'];

// Perform a query to get the list of teachers based on the selected subject
// Adjust this query based on your database structure
$query = "SELECT DISTINCT name FROM teachers WHERE subject = '$subject'";
$result = mysqli_query($mysqli, $query);

$teachers = [];
while ($row = mysqli_fetch_assoc($result)) {
    $teachers[] = $row['name'];
}
header('Content-Type: application/json');
// Return the list of teachers in JSON format
echo json_encode($teachers);
?>
