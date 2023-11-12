<!DOCTYPE html>
<html>
<head>
    <title>Parent Sign Up</title>
    <link rel="stylesheet" type="text/css" href="signup1.css">
</head>
<body>
    <div class="login">
        Parent Sign Up
    </div>
    <div class="row">
        <div class="column">
            <img src="../Components/login.png" alt="Teacher Image">
        </div>
        <div class="column">
            <form method="post">
                <div class="text1">First Name</div>
                <input type="text" id="firstname" name="firstname" class="input-field">
                <div class="text1">Last Name</div>
                <input type="text" id="lastname" name="lastname" class="input-field">
                <div class="text1">City</div>
                <input type="text" id="city" name="city" class="input-field">
                <div class="text1">No of Children</div>
                <input type="number" id="Numofchildren" name="noofchildren"class="input-field">
                <div class="text1">Name of Children</div>
                <input type="text" id="childrenname" name="childrenname" class="input-field">
                <div class="text1">Username (Email)</div>
                <input type="email" id="username" name="username" class="input-field">
                <div class="text1">Password</div>
                <input type="password" id="password" name="password" class="input-field">
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
        $city = $_POST['city'];
        $noofchildren = $_POST['noofchildren'];
        $childrenname = $_POST['childrenname'];

        $sql = "select * from parent where username = '$username'";

        $result = mysqli_query($link,$sql) or die(mysqli_error($link));
        $count = mysqli_num_rows($result);

        if($count > 0)
        {
            echo "username already exist";
        }
        else
        {
            $status = 'unregistered';
            $sql = mysqli_query($link,"insert into parent(firstname,lastname,username,password,city,noofchildren,status,childrenname) values('$firstname','$lastname','$username','$password','$city','$noofchildren','$status','$childrenname')") or die(mysqli_error($link));

            echo "Waitng for the admin permission";
            ?>

            <script>
                window.location="../index.php";
            </script>
            <?php
        }

    }
    
?>
