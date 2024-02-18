<?php
// Assuming you have a MySQL connection
$mysqli = new mysqli('localhost', 'root', '', 'new');
// $connetion = mysqli->connect_error;
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Assuming you have a MySQL connection
$semester = $_GET['semester'];
$branch = $_GET['branch'];

// Perform a query to get the list of subjects based on the selected semester
// Adjust this query based on your database structure
$query = "SELECT DISTINCT name FROM subjects WHERE semester = '$semester' AND branch = '$branch'";
$result = mysqli_query($mysqli, $query);

$subjects = [];
while ($row = mysqli_fetch_assoc($result)) {
    $subjects[] = $row['name'];
}
header('Content-Type: application/json');
// Return the list of subjects in JSON format
echo json_encode($subjects);
?>

