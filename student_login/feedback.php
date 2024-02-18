
<?php
session_start();
if(isset($_SESSION['id'])){
    $username = $_SESSION['id'];
} else {
    // Handle the case where the username is not set in the session
        header("Location: ..\index.php");
        // exit();
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Option List from MySQL</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 150vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 300px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        input[type="text"]{
            width: 100%;
            height: 50px;
        }

        textarea {
            width: 100%;
            padding: 8px;
            height: 150px; /* Set the initial height */
            resize: vertical; /*Allow vertical resizing only */
            box-sizing: border-box;
        }
        
    </style>
    <script>
        function confirmSubmit() {
            return confirm("Are you sure you want to submit the form?");
        }
        function updateSubjects() {
            // Get the selected semester
            const selectedSemester = document.getElementById('semester').value;
            
            const selectedBranch = document.getElementById('branch').value;
            console.log(selectedBranch);
            // Get the subject select element
            const subjectSelect = document.getElementById('subject');

            // Clear existing options
            subjectSelect.innerHTML = '';

            var notSelectedOption = document.createElement("option");
            notSelectedOption.value = "NaN";
            notSelectedOption.text = "Not selected";
            subjectSelect.add(notSelectedOption);

            // Fetch subjects from the server using AJAX
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const subjects = JSON.parse(xhr.responseText);
                    subjects.forEach(subject => {
                        const option = document.createElement('option');
                        option.value = subject;
                        option.text = subject;
                        subjectSelect.appendChild(option);
                    });
                }
            };
            xhr.open('GET', 'get_subjects.php?semester=' + selectedSemester + '&branch=' + selectedBranch, true);
            xhr.send();
        }

        function updateTeachers() {
            // Get the selected subject
            const selectedSubject = document.getElementById('subject').value;

            // Get the teacher select element
            const teacherSelect = document.getElementById('teacher');

            // Clear existing options
            teacherSelect.innerHTML = '';

            var notSelectedOption = document.createElement("option");
            notSelectedOption.value = "NaN";
            notSelectedOption.text = "Not selected";
            teacherSelect.add(notSelectedOption);

            // Fetch teachers from the server using AJAX
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const teachers = JSON.parse(xhr.responseText);
                    teachers.forEach(teacher => {
                        const option = document.createElement('option');
                        option.value = teacher;
                        option.text = teacher;
                        teacherSelect.appendChild(option);
                    });
                }
            };
            xhr.open('GET', 'get_teachers.php?subject=' + selectedSubject, true);
            xhr.send();
        }
    </script>
</head>
<body>
    <div class="login" style="width:500px;">
        <h1 align="center">Student Feedback</h1> 
        <h5 align="center">Please provide your feedback below:</h5>
    <form method="post" action="feedback_submit.php" onsubmit="return confirmSubmit()">
    
    
    <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
    
    
    
    <p align="center">MANIT CSE semester-7th </p>
    <hr><br><br>
        <label for="branch">Branch:</label>
            <select id="branch" oninput="updateSubjects()">
                <option value="NaN">Not selected</option>
                <option value="CSE">Computer Science and Engineering</option>
                <option value="ECE">Electronics and Communication Engineering</option>
                <option value="ME">Mechanical Engineering</option>
                <!-- Add more semesters as needed -->
            </select>
    
        <label for="semester">Semester:</label>
            <select id="semester" oninput="updateSubjects()">
                <option value="NaN">Not selected</option>
                <option value="1">Semester 1</option>
                <option value="2">Semester 2</option>
                <option value="3">Semester 3</option>
                <option value="4">Semester 4</option>
                <option value="5">Semester 5</option>
                <option value="6">Semester 6</option>
                <option value="7">Semester 7</option>
                <option value="8">Semester 8</option>
                <!-- Add more semesters as needed -->
            </select>
        
        <label for="subject">Subject:</label>
            <select id="subject" name="subject" oninput="updateTeachers()">
                <option value="NaN">Not selected</option>
                <!-- Options will be dynamically populated here -->
            </select>

        <label for="teacher">Teacher:</label>
            <select name="teacher" id="teacher">
                <option value="NaN">Not selected</option>
                <!-- Options will be dynamically populated here -->
            </select>
    
    <b>Personality</b>
    <br>
        <input type="radio" name="f1" value="5" checked>Excellent 
        <input type="radio" name="f1" value="4">Very Good 
        <input type="radio" name="f1" value="3">Good 
        <input type="radio" name="f1" value="2">Average 
        <input type="radio" name="f1" value="1">Bad
    <br><br>
    
    <b>Subjective Knowledge</b>
    <br>
    <input type="radio" name="f2" value="5" checked>Excellent 
    <input type="radio" name="f2" value="4">Very Good 
    <input type="radio" name="f2" value="3">Good 
    <input type="radio" name="f2" value="2">Average 
    <input type="radio" name="f2" value="1">Bad
    <br><br> 
    
    <b>Attitute towards college property</b>
    <br>
    <input type="radio" name="f3" value="5" checked>Excellent 
    <input type="radio" name="f3" value="4">Very Good 
    <input type="radio" name="f3" value="3">Good 
    <input type="radio" name="f3" value="2">Average 
    <input type="radio" name="f3" value="1">Bad
    <br><br>
    
    <b>Amount of knowledge you get</b>
    <br>
    <input type="radio" name="f4" value="5" checked>Excellent 
    <input type="radio" name="f4" value="4">Very Good 
    <input type="radio" name="f4" value="3">Good 
    <input type="radio" name="f4" value="2">Average 
    <input type="radio" name="f4" value="1">Bad
    <br><br>
    
    <b>Puntuality in coming class</b>
    <br>
    <input type="radio" name="f5" value="5" checked>Excellent 
    <input type="radio" name="f5" value="4">Very Good 
    <input type="radio" name="f5" value="3">Good 
    <input type="radio" name="f5" value="2">Average 
    <input type="radio" name="f5" value="1">Bad
    <br><br>
    
    <b>His/Her capability of controlling Mass</b>
    <br>
    <input type="radio" name="f6" value="5" checked>Excellent 
    <input type="radio" name="f6" value="4">Very Good 
    <input type="radio" name="f6" value="3">Good 
    <input type="radio" name="f6" value="2">Average 
    <input type="radio" name="f6" value="1">Bad
    <br><br>
    
    <b> Way of Teaching</b>
    <br>
    <input type="radio" name="f7" value="5" checked>Excellent 
    <input type="radio" name="f7" value="4">Very Good 
    <input type="radio" name="f7" value="3">Good 
    <input type="radio" name="f7" value="2">Average 
    <input type="radio" name="f7" value="1">Bad
    <br><br><br>

    <label for="text_feedback">Provide Feedback:</label>
    <br>
    <!-- <input type="text" name="text_feedback" id="text_feedback"> -->
    <textarea id="description" name="description" required></textarea>
    <br><br>
    <input type="submit" name="Submit" value="Submit" maxlength="50"/>

    
    </form>
    </div>

</body>
</html>
