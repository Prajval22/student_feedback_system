<?php
session_start();
include('dbconn.php');
if(isset($_POST["Login"])){
	$id = $_POST["id"];
	$pass = $_POST["pass"];	
	// $sql = mysql_query("SELECT * FROM student WHERE id ='$id' and password='$pass'");
	$temp = "SELECT * FROM student WHERE id = '$id' AND password = '$pass'";
	$sql = $mysqli->query($temp);
	$rows = $sql->num_rows;
	// $rows = mysql_num_rows($sql);
	if($rows==1) {
		$user = $sql->fetch_assoc();

		// $user = mysql_fetch_array($sql);
		$_SESSION["id"] = $user['id'];
		$_SESSION["Name"] = $user['name'];
		$var = $user['id'];
		$_SESSION["id"] = $var;
		// echo $var;
		header("Location: student_login/feedback.php");
		}
	else{
		echo "<script>alert('Password does not Match !!!');</script>";
		}
}

?>	

<html>
<head>
    <title>Login</title>
	<link rel="stylesheet" href="index.css">
</head>

<body>
	<div class="admin">
		<a href="admin\index.php" style="float:right;display:block;text-align:center;text-decoration:none;width:200px">Admin Login</a>
		<a href="teacher_login\login.php" style="float:right;display:block;text-align:center;text-decoration:none;width:200px">Faculty Login</a>
	</div>
    <div class="login" style="width:360px;">
        <h1 align="center">Student Login</h1>
        <form method="post" style="text-align:center;">
            <input placeholder="Roll No." type="text" name="id">
            <br>
            <br>
            <input placeholder="Password" type="password" name="pass">
            <br>
            <br>
            <input type="submit" value="Login" name="Login"><span></span></form>
    </div>
</body>

</html>