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
        <h1 align="center">Teacher Feedbacks</h1>
        <a href="feedback.php" >Back</a>
		<table>
		<tr>
			<th>Name</th>
			<th>Subject</th>
			<th>Feedback</th>
		</tr>
		<?php
		// $result = mysql_query("SELECT * from feedback");
		$result = $mysqli->query("SELECT * FROM teachers");

		// if (!$result) {
		// 	die('Query Error: ' . $mysqli->error);
		// }
		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
		echo '
		<tr>
			<td>'.$row['name'].'</td>
			<td>'.$row['subject'].'</td>
			<td>'.$row['fb'].'/35</td>
		</tr>
		';
		}
		?>
		</table>
		
    </div>
</body>

</html>