<?php
include("..\dbconn.php");	
session_start();

if (isset($_POST['change_password'])) {
    // Your database connection code here (e.g., $mysqli)

    // Get user ID (you need to have this information, often stored in a session)
    $userId = $_SESSION['id'];

    // Get user's current (old) password from the form
    $oldPassword = $_POST['old_password'];
    // $oldPassword = password_hash($oldPassword, PASSWORD_DEFAULT);
    // echo $oldPassword;
    // Get user's new password from the form
    $newPassword = $_POST['new_password'];
    $confirmNewPassword = $_POST['confirm_new_password'];

    // Verify the old password
    $query = "SELECT password FROM student WHERE id = $userId";
    // echo $userId;
    $result = $mysqli->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
        $storedPassword = $row['password'];
        if ($oldPassword === $storedPassword) {
            // Old password is correct, update the password
            if ($newPassword === $confirmNewPassword) {
                // Hash the new password
                // $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $hashedPassword = $newPassword;
                // Update the password in the database
                $updateQuery = "UPDATE student SET password = '$hashedPassword' WHERE id = $userId";
                $updateResult = $mysqli->query($updateQuery);

                if ($updateResult) {
                    // Redirect to action.php with a query parameter indicating success
                    header("Location: ..\index.php");
                    // header('Location: action.php?success=1');
                    exit();
                } else {
                    echo "Failed to update the password. Please try again.";
                }
            } else {
                echo "New password and confirm password do not match.";
            }
        } else {
            echo "Old password is incorrect. Please try again.";
        }
    } else {
        echo "Error: " . $mysqli->error;
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
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

        .login {
            width: 360px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            margin: 10px 0;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>

</head>
<body>
    <div class="login">
        <h1>Change Password</h1>
        <form method="post" >
            <label for="old_password">Old Password:</label>
            <input type="password" name="old_password" required>

            <label for="new_password">New Password:</label>
            <input type="password" name="new_password" required>

            <label for="confirm_new_password">Confirm New Password:</label>
            <input type="password" name="confirm_new_password" required>

            <input type="submit" name="change_password" value="Change Password">
        </form>
    </div>
    
</body>

</html>
