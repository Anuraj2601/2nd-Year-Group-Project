<!DOCTYPE html>
<html>
<head>
<title>Student Sign Up</title>
    <link rel="stylesheet" type="text/css" href="signup1.css">
</head>
<body>
    <div class="login">
        Student Sign Up
    </div>
    <div class="row">
        <div class="column">
            <img src="../Components/student.png" alt="Teacher Image">
        </div>
        <div class="column">
            <form method="post">
                <div class="text1">First Name</div>
                <input type="text" id="first_name" name="firstname" class="input-field">
                <div class="text1">Last Name</div>
                <input type="text" id="last_name" name="lastname" class="input-field">
                <div class="form-group">
                    <label class="text1">Gender:</label>
                    <label class="radio-label">
                        <input type="radio" name="gender" value="male"> Male
                    </label>
                    <label class="radio-label">
                        <input type="radio" name="gender" value="female"> Female
                    </label>
                </div>
                <div class="text1">Username (Email)</div>
                <input type="email" id="email" name="username" class="input-field">
                <div class="text1">Password</div>
                <input type="password" id="password" name="password" class="input-field">
                <div>
                    <label for="language" class="text1">Language:</label>
                    <select id="language" name="language" class="select">
                        <option value="english">English</option>
                        <option value="sinhala">Sinhala</option>
                        <option value="Tamil">Tamil</option>
                    </select>
                </div>
                <div  >
                    <label for="grade" class="text1">Grade:</label>
                    <select id="grade" name="grade" class="select">
                        <option value="10">Grade 10</option>
                        <option value="11">Grade 11</option>
                    </select>
                </div>
                <input type="submit" value="signup" name="signup" class="btn">
            </form>
            <a href="../index.php">Back</a>
        </div>
    </div>
</body>
</html>

<?php
    include '../database/db_con.php';

    if(isset($_POST['signup']))
    {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $grade = $_POST['grade'];
        $language = $_POST['language'];
        $gender = $_POST['gender'];

        $sql = "select * from student where username = '$username'";

        $result = mysqli_query($link,$sql) or die(mysqli_error($link));
        $count = mysqli_num_rows($result);

        if($count > 0)
        {
            echo "username already exist";
        }
        else
        {
            $status = 'unregistered';
            $sql = mysqli_query($link,"insert into student(firstname,lastname,username,password,grade,language,status,gender) values('$firstname','$lastname','$username','$password','$grade','$language','$status','$gender')") or die(mysqli_error($link));

            echo "Waitng for the admin permission";
            ?>

            <script>
                window.location="../index.php";
            </script>
            <?php
        }

    }
    
?>

