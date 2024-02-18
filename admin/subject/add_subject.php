<?php
// Connect to your MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "new";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$subject_detail = null;
$subject_success = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $semester = $_POST["semester"];
    $branch = $_POST["branch"];

    // Check if the subject with the given ID already exists
    $check_sql = "SELECT * FROM subjects WHERE id = '$id'";
    $result = $conn->query($check_sql);
    if ($result->num_rows > 0) {
        // Subject with the same ID already exists
        $subject_detail = "Course with ID : ".$id." already exists";
    } else {
        // Insert data into the database
        $sql = "INSERT INTO subjects (id, name, semester, branch) VALUES ('$id', '$name', '$semester', '$branch')";
        if ($conn->query($sql) === TRUE) {
            $subject_success = "Course added successfully";
        } else {
            $subject_success = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close the connection
$conn->close();
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
        <a href="add_subject.html">Add More Courses</a>
        <a href="..\feedback.php">Back To Admin</a>
    </div>

    <?php if ($subject_success) : ?>
        <div class="course-info">
            <h2>Course Information</h2>
            <table>
                <tr>
                    <th>Course ID</th>
                    <td><?php echo $id; ?></td>
                </tr>
                <tr>
                    <th>Course Name</th>
                    <td><?php echo $name; ?></td>
                </tr>
                <tr>
                    <th>Course Branch</th>
                    <td><?php echo $branch; ?></td>
                </tr>
                <tr>
                    <th>Course Sem</th>
                    <td><?php echo $semester; ?></td>
                </tr>
            </table>
        </div>
    <?php endif; ?>

    <?php if ($subject_detail) : ?>
        <script>
            window.onload = function() {
                alert("<?php echo $subject_detail; ?>");
                window.location.href = "add_subject.html";
            };
        </script>
    <?php endif; ?>
</body>
</html>


