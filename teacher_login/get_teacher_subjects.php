<?php
include('../dbconn.php');

// Check if the teacher_id parameter is set in the request

if(isset($_GET['teacher_id'])) {
    $teacherId = $_GET['teacher_id'];

    // Fetch subjects for the given teacher ID
    $query = "SELECT subject FROM teachers WHERE teacher_id = '$teacherId'";
    // $result = $mysqli->query($query);

    // // Create an array to store the subjects
    // $subjects = array();

    // while ($row = $result->fetch_assoc()) {
    //     // Add each subject to the array
    //     $subjects[] = $row['subject'];
    // }
    $result = mysqli_query($mysqli, $query);

    $subjects = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $subjects[] = $row['subject'];
    }

    // Return the subjects as JSON
    header('Content-Type: application/json');
    echo json_encode($subjects);
} else {
    // If teacher_id parameter is not set, return an empty array
    echo json_encode(array());
}
?>
