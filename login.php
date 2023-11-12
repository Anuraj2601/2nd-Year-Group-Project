<html>
<head>
	<title>Login</title>
	
	<link rel="stylesheet" href="index.css">
		<link rel="icon" type="image/x-icon" href="Components/Logo/favicon.ico">

		<script type="text/javascript">
			function testLogin(){

				var flag = 0;
				if(document.userform.email.value==""){
					document.getElementById('emailmsg').innerHTML = "Please Enter email.";
					flag = 1;
				}else{
					document.getElementById('emailmsg').innerHTML = "";
				}
				if(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/.test(document.userform.email.value)){
					document.getElementById('emailmsg').innerHTML = "";
				}else{
					document.getElementById('emailmsg').innerHTML = "Please Enter valide email.";
					flag = 1;
				}
				if(document.userform.password.value==""){
					document.getElementById('passmsg').innerHTML = "Please Enter Password.";
					flag = 1;
				}else{
					document.getElementById('passmsg').innerHTML = "";
				}
				if(flag == 1){
					
					return false;
				}else{
					return true;
				}
			}

		</script>
</head>
<body>

<div class="login">Login</div>
<div class = "row">
	<div class = "column">
		<form method = "post" onSubmit="return testLogin()" enctype="multipart/form-data">
			<div class = "cont1">
				<div class="text1">
					User Name
				</div>
				<input type="email" name="email" id="email" class="ip1" placeholder="Enter email address">
				<font color="#ff0000"><span id="emailmsg"></span></font>
			</div>
			
			
			<div class="cont1">
				<div class="text1">
					Password
				</div>
				<input type="password" name="password" id="password" class="ip1" placeholder="Enter Password">
				<font color="#ff0000"><span id="passmsg"></span></font>
			</div>

			<div class="cont1">
				<div class="text1">
					Role
				</div>
				<select name="role" class="ip1">
						<option value="Teacher">Teacher</option>
						<option value="Student">Student</option>
						<option value="Parent">Parent</option>
					</select>
				<font color="#ff0000"><span id="passmsg"></span></font>
			</div>
			
			
			<a href=""><span id="ip2">Forgot password?</span></a><br><br>
			
			<div class="cont1">
				<input type ="submit" name="login" value="login" class="btn1">
			</div>	
		 
		</form>
		<div id="id1">Don't have account? <a href="signup.php" id="ip3">Sign up</a></div> 
	</div>

	<div class="column">
		
			<div class="column">
				<img src="Components/login.jpg" />
			</div>
		
	</div>
	
	
<!--<h2><b><a id=signup>Sign Up</a></b></h2>
<form name="form1" method=post action="form.php">

	E-Mail<input type="email" name="email">

	User Name<input type="text" name="username">
		Password<th><input type="password" name="password">
			Re-Type Password<input type="password" name="rpassword">
			<input type=button name=submit value="Submit" onClick="valid()"><input type=reset value=reset>
				<th><input type=submit> -->

</div>


</body>
</html>

<?php
	include 'database/db_con.php';

	if(isset($_POST['login']))
	{
		$username = $_POST['email'];
		$password = $_POST['password'];
		$role = $_POST['role'];

		$sql = "select * from `$role` where username='$username'";

		if($result = mysqli_query($link,$sql))
		{
			if($row = mysqli_fetch_array($result))
			{
				$hashpassword = $row['password'];
				$fname = $row['firstname'];

				if($password == $hashpassword)
				{
					//if($row['status'] != 'unregistered')
					//{
						if($role == 'Parent')
						{
							session_start();
							$_SESSION['id']=$row['parent_id'];
							echo "Login Successful. Welcome, $fname!";
							header("refresh:3;url=Parent/Parent_dashboard.php");
						}
						else if($role == 'Teacher')
						{
							session_start();
							$_SESSION['id']=$row['teacher_id'];
							echo "Login Successful. Welcome, $fname!";
							header("refresh:3;url=Teacher/teacher_dashboard.php");
						}
						else if($role == 'Student')
						{
							session_start();
							$_SESSION['id']=$row['student_id'];
							echo "Login Successful. Welcome, $fname!";
							header("refresh:3;url=Student/Student_dashboard.php");
						}
					//}
					/*else
					{
						echo "You're not Registered, Wait for the Permission";
						header("refresh:3;url=index.php");
						exit();
					}*/
				}
				else
					echo "Login failed.Please check your username and password.";
			}
			else
			{
				echo "Login failed.User not found";
			}
		}
		else
		{
			echo mysqli_error($link);
		}

	}
?>