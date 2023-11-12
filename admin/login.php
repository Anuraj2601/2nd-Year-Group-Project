<?php
		include('../database/db_con.php');
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
		echo 'Login Failed!';
		}	
				
		?>

        