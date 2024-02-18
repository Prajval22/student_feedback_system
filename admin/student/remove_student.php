<?php
include('../../dbconn.php');
session_start();
$removedStudent = null;

if (isset($_POST["remove"])) {
    // Get the roll number from the form
    $rollno = $_POST["rollno"];
    $result = $mysqli->query("SELECT id, name FROM student WHERE id = '$rollno'");
    // Performing the student removal from the database
    $sql = "DELETE FROM student WHERE id = '$rollno'";
    $removedStudent = $result->fetch_assoc();
    if (mysqli_query($mysqli, $sql)) {
        
    }
    $sql1 = "DELETE FROM store_feedback WHERE studentId = '$rollno'";
    $removedStudent1 = $result->fetch_assoc();
    if (mysqli_query($mysqli, $sql1)) {
        
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .action-links {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .action-links a {
            display: block;
            text-align: center;
            text-decoration: none;
            padding: 10px;
            margin: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .action-links a:hover {
            background-color: #0056b3;
        }


        .removed-student {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: center;
        }

        .removed-student h2 {
            color: #007BFF;
        }
    </style>
</head>
<body>
    <!-- <a href="remove.html">Remove Student</a>
    <a href="..\admin\index.php">Back To Admin</a> -->
    <div class="action-links">
        <a href="remove_student.html">Remove Student</a>
        <a href="..\feedback.php">Back To Admin</a>
    </div>
    <?php if ($removedStudent) : ?>
        <div class="removed-student">
            <h2>Student Removed Successfully</h2>
            <p>ID: <?php echo $removedStudent['id']; ?></p>
            <p>Name: <?php echo $removedStudent['name']; ?></p>
        </div>
        <?php else: ?>
        <div class="removed-student">
            <h2>Student Not Found</h2>
            <p>The provided student ID <?php echo $rollno ?> was not found in the database.</p>
        </div>
    <?php endif; ?>
</body>
</html>
