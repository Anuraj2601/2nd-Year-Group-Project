<html>
    <head>
       <title> Admin</title>
        <link rel="stylesheet" href="../index.css">

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
				<input type="email" name="username" id="email" class="ip1" placeholder="Enter email address">
				<font color="#ff0000"><span id="emailmsg"></span></font>
			</div>
			
			
			<div class="cont1">
				<div class="text1">
					Password
				</div>
				<input type="password" name="password" id="password" class="ip1" placeholder="Enter Password">
				<font color="#ff0000"><span id="passmsg"></span></font>
			</div>

			
			
			
			<!--<a href=""><span id="ip2">Forgot password?</span></a><br><br>-->
			
			<div class="cont1">
				<input type ="submit" name="login" value="login" class="btn1">
			</div>	
		 
		</form>
		
	</div>

	<div class="column">
		
			<div class="column">
				<img src="../Components/admin.jpeg" />
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
		include('../database/db_con.php');

        if(isset($_POST['login']))
        {
		session_start();
		$username = $_POST['username'];
		$password = $_POST['password'];

		$query = mysqli_query($link,"SELECT * FROM users WHERE username='$username' AND password='$password'")or die(mysqli_error());
		$count = mysqli_num_rows($query);
		$row = mysqli_fetch_array($query);


		if ($count > 0){
		
		$_SESSION['id']=$row['user_id'];
		
		echo 'Login Successful';
		?>

		<script>
        	window.location ="dashboard.php";
        </script>
		

		<?php
		//mysqli_query($conn,"insert into user_log (username,login_date,user_id)values('$username',NOW(),".$row['user_id'].")")or die(mysqli_error());
		 }else{ 
		echo 'false';
		}	
    }
    else
        echo mysqli_error($link);
				
		?>