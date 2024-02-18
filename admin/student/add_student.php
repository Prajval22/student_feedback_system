<?php
include('../../dbconn.php');
session_start();
$studentData = null;
$errorMessage = null;
if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $rollno = $_POST['rollno'];
    $password = $_POST['password'];

    // Sanitize user input to prevent SQL injection
    $name = $mysqli->real_escape_string($name);
    $rollno = $mysqli->real_escape_string($rollno);
    $password = $mysqli->real_escape_string($password);

    $query1 = "SELECT * FROM student WHERE id = '$rollno'";
    $result = $mysqli->query($query1);

    if ($result->num_rows > 0) {
        // The row with the specified value exists
        $errorMessage = "Student is already exist with ID : $rollno";
    } else {

        $sql = "INSERT INTO student (name, id, password) VALUES ('$name', '$rollno', '$password')";

        if (mysqli_query($mysqli, $sql)) {
            $studentData = "Record updated successfully.";
        } else {
            $studentData = "Error updating record: " . mysqli_error($connection);
        }

        $sql1 = "INSERT INTO store_feedback (studentId) VALUES ('$rollno')";
        if (mysqli_query($mysqli, $sql1)) {
            $studentData .= "Record updated successfully.";
        } else {
            $studentData .= "Error updating record: " . mysqli_error($connection);
        }

        // Close the database connection
        $mysqli->close();
    }
} else {
    $studentData = "Error in the connection";
}
?>

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
            margin-bottom: 20px;
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

        .course-info {
            width: 80%;
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: left;
            display: flex;
            flex-direction: column;
            align-items: flex-start; /* Align items to start of column */
        }

        .course-info h2 {
            color: #007BFF;
            margin-top: 0;
            align-self: center; /* Center the heading within the column */
        }

        .course-info table {
            width: 100%;
            border-collapse: collapse;
        }

        .course-info th,
        .course-info td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .course-info th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    
    <div class="action-links">
        <a href="add_student.html">Add More Student</a>
        <a href="..\feedback.php">Back To Admin</a>
    </div>

    <?php if ($studentData) : ?>
        <div class="course-info">
            <h2>Student Information</h2>
            <table>
                <tr>
                    <th>Student ID</th>
                    <td><?php echo $rollno; ?></td>
                </tr>
                <tr>
                    <th>Student Name</th>
                    <td><?php echo $name; ?></td>
                </tr>
                <tr>
                    <th>Student Password</th>
                    <td><?php echo $password; ?></td>
                </tr>
            </table>
        </div>
    <?php endif; ?>

    <?php if ($errorMessage) : ?>
        <script>
            window.onload = function() {
                alert("<?php echo $errorMessage ?>");
                window.location.href = "add_student.html";
            };
        </script>
    <?php endif; ?>
</body>
</html>
