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
$errorMessage = null;
$teacher_data=null;
// Process form data when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $teacher_id = $_POST["teacher_id"];
    $teacher_name = $_POST["teacher_name"];
    $subject = $_POST["subject"];

    // Check if the teacher with the given ID already exists
    $check_sql = "SELECT * FROM teachers WHERE id = '$teacher_id'";
    $result = $conn->query($check_sql);
    if ($result->num_rows > 0) { 
        $errorMessage= 'Faculty with ID '. $teacher_id.' already exists';          
    } else {
        // Insert data into the database
        $sql = "INSERT INTO teachers (id, name, subject) VALUES ('$teacher_id', '$teacher_name', '$subject')";
        if ($conn->query($sql) === TRUE) {
            // Display details of the newly added teacher
            $teacher_data = "Details added successfully!";
            
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
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
        <a href="add_teacher.html">Add More Faculty</a>
        <a href="..\feedback.php">Back To Admin</a>
    </div>

    <?php if ($teacher_data) : ?>
        <div class="course-info">
            <h2>Faculty Information</h2>
            <table>
                <tr>
                    <th>Faculty ID</th>
                    <td><?php echo $teacher_id; ?></td>
                </tr>
                <tr>
                    <th>Faculty Name</th>
                    <td><?php echo $teacher_name; ?></td>
                </tr>
                <tr>
                    <th>Faculty Subject</th>
                    <td><?php echo $subject; ?></td>
                </tr>
            </table>
        </div>
    <?php endif; ?>

    <?php if ($errorMessage) : ?>
        <script>
            window.onload = function() {
                alert("<?php echo $errorMessage ?>");
                window.location.href = "add_teacher.html";
            };
        </script>
    <?php endif; ?>
</body>
</html>


