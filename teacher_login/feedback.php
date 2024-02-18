

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Process Feedbacks</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 5px;
            /* padding: 10px; */
            display: flex;
            /* justify-content: center; */
            align-items: center;
            flex-direction: column;
        }
        .body1 {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: auto;
            flex-direction: column;
        }

        .feedback-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 500px;
            margin-top: 50px;
        }

        .feedback-details {
            margin-bottom: 16px;
        }
        /* <style>*/
        .feedback-container1 {
            margin: 20px;
            padding: 10px;
            background-color: #f4f4f4;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        } 

        .feedback-details {
            margin-bottom: 10px;
            padding: 8px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .feedback_score{
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 500px;
        }
        .links a {
            width: 100%;
            background-color: #168DA0;
            color: #fff;
            padding: 12px;
            font-size: 20px;
            cursor: pointer;
            border-radius: 5px;
            margin-bottom: 15px;
            margin: 5px;
        }
        .links{
            /* border: 10px black solid; */
            height: 100px;
            width: 100%;
        }
    </style>
    <script>
        function logout(){
            
            alert("cache is clear now!");
        }
    </script>

</head>
<body>
    <div class="links">
        <a href="home.php" style="float:right;display:block;text-align:center;text-decoration:none;width:200px" >Change Subject</a>
        <a href="logout.php" style="float:right;display:block;text-align:center;text-decoration:none;width:200px" >Log out</a>
    </div>
    <div class="body1">
    <div class="feedback_score">
        <h2>Given Feedbacks</h2>
        <?php
            session_start();
            include('../dbconn.php');
            if (!isset($_SESSION["id"])) {
                header("Location: login.php"); // Redirect to login page if not logged in
                exit();
            }
            $teacher_name = $_SESSION['final_id'];
            $sql = "select * from teachers where id = '$teacher_name'";
            $result = $mysqli->query($sql);
            // $row = mysqli_fetch($result);
                echo "<div class='feedback-container1'>";
                $feedback = $result->fetch_assoc();
                $textscore = $feedback['fb'];
                $count = $feedback['count'];
                $subject = $feedback['subject'];
                $name = $_SESSION['teacher_name'];
            
                echo "<h1>Hi! $name</h1>";
                echo "<h1>For Course : $subject</h1>";
                echo "<p>Your average feedback score is : $textscore</p>";
                echo "<p>Total number of students who given feedback is : $count</p>";

            echo "</div>";
        ?>

    </div>
    <div class="feedback-container">
        <h2>Processed Textual Feedbacks</h2>
        
        <?php
        
        include('../dbconn.php');

        if (isset($_SESSION['final_id'])) {
            $teacherId = $_SESSION['final_id'];

            // Fetch feedbacks for the given teacher ID
            $feedbackQuery = "SELECT * FROM store_feedback";
            $feedbackResult = $mysqli->query($feedbackQuery);

            // Check if the query was successful
            if ($feedbackResult) {
                // Start displaying feedbacks
                echo "<div class='feedback-container1'>";

                // Process feedbacks
                while ($feedback = $feedbackResult->fetch_assoc()) {
                    $textFeedback = $feedback[$teacherId];

                    // Check if feedback is not "NAN"
                    if ($textFeedback != "NAN") {
                        echo "<div class='feedback-details'>$textFeedback</div>";
                    }
                }

                // End feedback container
                echo "</div>";

                // Free the result set
                mysqli_free_result($feedbackResult);
            } else {
                // If the query was not successful, print an error message
                echo "<p>Error executing the query: " . $mysqli->error . "</p>";
            }
        } else {
            echo "<p>Teacher ID not provided.</p>";
        }

        ?>
    </div>
    </div>
</body>
</html>
