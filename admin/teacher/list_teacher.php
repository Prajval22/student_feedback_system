<?php
// Database connection information
include('../../dbconn.php');
session_start();

// Query to fetch data from the "student" table
$sql = "SELECT teacher_id, teacher_name FROM teacher_detail";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>List Students</title>
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

        h1 {
            text-align: center;
            background-color: grey;
            color: #fff;
            padding: 20px 0;
            width: 50%;
        }

        table {
            width: 50%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #007BFF;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>List of Faculty</h1>
    <table>
        <tr>
            <th>Serial No.</th>
            <th>Faculty ID</th>
            <th>Faculty Name</th>
        </tr>
        <?php
     
        $serial = 1; // Initialize serial number
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td class='serial-number'>" . $serial . "</td><td>" . $row["teacher_id"] . "</td><td>" . $row["teacher_name"] . "</td></tr>";
                $serial++; // Increment serial number
            }
        } else {
            echo "<tr><td colspan='3'>No Faculty Found</td></tr>";
        }
        ?>
    </table>
</body>
</html>
