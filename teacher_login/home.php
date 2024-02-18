<?php

session_start();
include('../dbconn.php');
// Check if the teacher is logged in
if (!isset($_SESSION["id"])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Fetch teacher information
$teacherId = $_SESSION['id'];
// echo $teacherId;
$query = "SELECT * FROM teacher_detail WHERE teacher_id = '$teacherId'";
// $result = $mysqli->query($query);
    $getId = mysqli_query($mysqli,$query);
    $row = mysqli_fetch_assoc($getId);
    $final = $row['teacher_name'];
    // echo $final;
    echo "<script>alert('prajval');</script>";
    
// Check if a subject is selected

    if (isset($_POST["post"])) {
        $selectedSubject = $_POST["subject"];
        $query1 = "SELECT id FROM teachers WHERE teacher_id = '$teacherId' and subject='$selectedSubject'";
        $getId1 = mysqli_query($mysqli,$query1);
        $row1 = mysqli_fetch_assoc($getId1);
        $final2 = $row1['id'];
        // Redirect to process_feedbacks.php with the teacher_id parameter
        $_SESSION['final_id'] = $final2;
        $_SESSION['subject'] = $subject;
        $_SESSION['teacher_name'] = $final;
        echo "<script>alert('prajval');</script>";
        header("Location: feedback.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome, <?php echo $teacher['teacher_name']; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
    <script>
    
            function updateSubjects() {
            const teacherId = "<?php echo $teacherId; ?>";
            const subjectSelect = document.getElementById('subject');

            // Clear existing options
            subjectSelect.innerHTML = '';

            // Fetch subjects using AJAX
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    console.log(xhr.responseText); // Log the response to the console
                    if (xhr.status === 200) {
                        const subjects = JSON.parse(xhr.responseText);
                        subjects.forEach(subject => {
                            const option = document.createElement('option');
                            option.value = subject;
                            option.text = subject;
                            subjectSelect.appendChild(option);
                        });
                    }
                }
            };
            xhr.open('GET', 'get_teacher_subjects.php?teacher_id=' + teacherId, true);
            xhr.send();
        }
    </script>
</head>
<body>
    <form  method="post">
        <h2>Welcome, <?php echo $final; ?>!</h2>
        
        <label for='subject'>Select Subject:</label>
            <select id='subject' name='subject'>
            
             </select>

         <button type='submit' name='post'>Select Subject</button>
    </form>
    <script>
        // Call the updateSubjects function on page load
        window.onload = function() {
            updateSubjects();
        };
    </script>
</body>
</html>
