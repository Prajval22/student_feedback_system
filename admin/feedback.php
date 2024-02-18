<?php
include('../dbconn.php');
?>	

<html>
<head>
    <title>Feedback</title>
	<link rel="stylesheet" href="feedback.css">
</head>

<body>
    <div class="login" style="width:600px;">
        <h1 align="center">Admin Mode</h1>
		<a href="load_feedback.php" style="display:block;text-align:center;text-decoration:none;">View Feedback</a>
		<a href="student/add_student.html" style="display:block;text-align:center;text-decoration:none;">Add Student</a>
		<a href="teacher/add_teacher.html" style="display:block;text-align:center;text-decoration:none;">Add Faculty</a>
		<a href="subject/add_subject.html" style="display:block;text-align:center;text-decoration:none;">Add Subject</a>
		<a href="student/remove_student.html" style="display:block;text-align:center;text-decoration:none;">Remove Student</a>
		<a href="student/list_student.php" style="display:block;text-align:center;text-decoration:none;">List Students</a>
		<a href="../../student_login.php" style="display:block;text-align:center;text-decoration:none;">Go To Home</a>
		
    </div>
</body>

</html>