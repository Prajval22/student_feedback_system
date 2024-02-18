<?php
// Assuming you have a MySQL connection
    $mysqli = new mysqli('localhost', 'root', '', 'new');
    // $connetion = mysqli->connect_error;
    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }
    // include("index.php");
    session_start();	
    if(!isset($_SESSION['id'])) {
        header("Location: ..\index.php");
    }

    if(isset($_POST["Submit"])){
        $teacher=$_POST["teacher"];
        $subject=$_POST["subject"];
        $feedback=$_POST["description"];
        $value=$_POST["f1"]+$_POST["f2"]+$_POST["f3"]+$_POST["f4"]+$_POST["f5"]+$_POST["f6"]+$_POST["f7"];
    }

    $id = $_POST["id"];
    // echo "Scholar : ".$id."\nsub : ".$subject."\nteacher : ".$teacher." ";
    echo '<div style="background-color: #f2f2f2; padding: 20px; margin: 20px; border-radius: 5px; text-align: center;">';

    $getIdquery = "select id from teachers where name='$teacher' and subject='$subject'";
    $getId = mysqli_query($mysqli,$getIdquery);
    $row = mysqli_fetch_assoc($getId);
    $final = $row['id'];
    //checking the feedback given or not

    $checkQuery = "select `$final` from store_feedback where studentId='$id'";
    $checkQueryResult = mysqli_query($mysqli,$checkQuery);
    $row1 = mysqli_fetch_assoc($checkQueryResult);
    $final1 = $row1[$final];
    if($final1=="NAN"){
        $sql = "UPDATE teachers SET fb = ((fb*count + $value) / (count+1)) WHERE name = '$teacher' and subject = '$subject'";
        $sql1 = "UPDATE teachers SET count = (count+1) WHERE name  = '$teacher' and subject = '$subject'";
        $sql2 = "UPDATE store_feedback SET `$final` = '$feedback' WHERE studentId = '$id'";
        // Execute the query
        if (mysqli_query($mysqli, $sql)) {
            echo '<p style="font-size: 18px; color: #333; margin-bottom: 10px;">Feedback Submitted Successfully!</p>';
            // echo "Record updated successfully.";
        } else {
            echo '<p style="font-size: 18px; color: #333; margin-bottom: 10px;">Error updating record: </p>';
            echo mysqli_error($connection);
        }
        mysqli_query($mysqli, $sql1);
        mysqli_query($mysqli, $sql2);
    }
    else{
        echo '<p style="font-size: 18px; color: #333; margin-bottom: 10px;">You have already given feedback</p>';
        // echo "You have already given feedback";
    }
    echo '<p style="font-size: 16px; color: #555;">';
    echo 'Scholar: ' . $id . '<br>';
    echo 'Subject: ' . $subject . '<br>';
    echo 'Teacher: ' . $teacher . '<br>';
    echo '</p>';
    echo '</div>';
?>

<html>
<head>
    <title>feedback</title>
	<link rel="stylesheet" href="feedback_submit.css">
</head>

<body>
    <div class="login" style="width:360px;">
        <h1 align="center">Thanks For your Feedback</h1>
            <a href="feedback.php" style="display: block;text-align:center;text-decoration:none;">Fill Another</a>
            <a href="logout_student.php" style="display: block;text-align:center;text-decoration:none;">Logout</a>
            <a href="changePassword.php" style="display: block;text-align:center;text-decoration:none;">Change Password</a>
            
    </div>
    <script>
    <?php
    // Check if the "success" query parameter is set to 1
    if (isset($_GET['success']) && $_GET['success'] == 1) {
        echo "alert('Password changed successfully!');";
        header("Location: ..\index.php");
    }
    ?>
    </script>
</body>


</html>