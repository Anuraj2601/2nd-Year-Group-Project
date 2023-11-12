<!DOCTYPE html>
<html>
<head>
<title>Teacher Sign Up</title>
    <link rel="stylesheet" type="text/css" href="signup1.css">
</head>
<body>
    <div class="login">
        Teacher Sign Up
    </div>
    <div class="row">
        <div class="column">
            <img src="../Components/teacher.png" alt="Teacher Image">
        </div>
        <div class="column">
            <form method="post">
                <div class="text1">First Name</div>
                <input type="text" id="first_name" name="firstname" class="input-field">
                <div class="text1">Last Name</div>
                <input type="text" id="last_name" name="lastname" class="input-field">
                <div class="text1">Username (Email)</div>
                <input type="email" id="email" name="username" class="input-field">
                <div class="text1">Password</div>
                <input type="password" id="password" name="password" class="input-field">
                <div class="text1">Subject</div>
                <input type="text" id="subject" name="subject" class="input-field">
                <div>
                    <label for="language" class="text1">Language:</label>
                    <select id="language" name="language" class="select">
                        <option value="english">English</option>
                        <option value="sinhala">Sinhala</option>
                        <option value="tamil">Tamil</option>
                    </select>
                </div>
                <input type="submit" name="signup" value="signup" class="btn">
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
        $subject = $_POST['subject'];
        $language = $_POST['language'];

        $sql = "select * from teacher where username = '$username'";

        $result = mysqli_query($link,$sql) or die(mysqli_error($link));
        $count = mysqli_num_rows($result);

        if($count > 0)
        {
            echo "username already exist";
        }
        else
        {
            $status = 'unregistered';
            $sql = mysqli_query($link,"insert into teacher(firstname,lastname,username,password,subject,language,status) values('$firstname','$lastname','$username','$password','$subject','$language','$status')") or die(mysqli_error($link));

            echo "Waitng for the admin permission";
            ?>

            <script>
                window.location="../index.php";
            </script>
            <?php
        }

    }
    
?>