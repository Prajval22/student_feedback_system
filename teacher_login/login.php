<?php
session_start();
include('../dbconn.php');
if(isset($_POST["Login"])){
	$id = $_POST["username"];
	$pass = $_POST["password"];	
	// $sql = mysql_query("SELECT * FROM student WHERE id ='$id' and password='$pass'");
	$temp = "SELECT * FROM teacher_detail WHERE teacher_id = '$id' AND teacher_password = '$pass'";
	$sql = $mysqli->query($temp);
	$rows = $sql->num_rows;
	// $rows = mysql_num_rows($sql);
	if($rows==1) {
		$user = $sql->fetch_assoc();

		// $user = mysql_fetch_array($sql);
		$_SESSION["id"] = $user['teacher_id'];
		$_SESSION["Name"] = $user['teacher_name'];
		$var = $user['teacher_id'];
		$_SESSION["id"] = $var;
		// echo $var;
		header("Location: home.php");
		}
	else{
		echo "<script>alert('Password does not Match !!!');</script>";
		}
}
?>	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Login</title>
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

        .admin {
            position: absolute;
            top: 0;
            right: 0;
            padding: 10px;
            border-top: 5px solid #000;
            background-color: #333;
        }

        .admin a {
            background-color: #333;
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            margin-left: 10px;
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
</head>
<body>
    <div class="admin">
        <a href="../index.php">Student Login</a>
        <a href="../admin/index.php">Admin Login</a>
    </div>
    <form method="post">
        <h2>Teacher Login</h2>
        <label for="username">Teacher ID:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit" name="Login">Login</button>
    </form>
</body>
</html>
