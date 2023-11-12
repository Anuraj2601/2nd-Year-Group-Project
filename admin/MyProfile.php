<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>

<?php 
	$query= mysqli_query($link,"select * from users where user_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
?>

<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
	<link rel="stylesheet" href="admin.css">
	 	<link rel="icon" type="image/x-icon" href="Components/Logo/favicon.ico">
		 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		 <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

		 <script type="text/javascript">
		   function googleTranslateElementInit() {
			 new google.translate.TranslateElement({ pageLanguage: 'en' }, 'google_translate_element');
		   }
	   
		   function changeLanguage(langCode) {
			 var select = document.querySelector('.goog-te-combo');
			 select.value = langCode;
			 select.dispatchEvent(new Event('change'));
		   }
		 </script>
  </head>
  
  
  <body>
  <div class="navbar">
			<a href="#home"><img src = "../Components/Logo/Logo3.png" /></a>
			
			<div class="dropdown" style="float:right;">
			  <button class="dropbtn"><?php echo $row['firstname']; ?>
				<i class="fa fa-caret-down"></i>
			  </button>
			  <div class="dropdown-content">
				<a href="MyProfile.php"><i class="fa fa-fw fa-user"></i>Profile</a>
				<a href="ResetPassword.php"><i class="fa fa-fw fa-unlock-alt"></i>Change Password</a>
				<a href="../logout.php"><i class="fa fa-fw fa-sign-out"></i>Log out</a>
			  </div>
			</div> 
		  </div>
		
		<div class="sidebar">
			
			<a href="dashboard.php"><i class="fa fa-fw fa-home"></i> Dashboard</a>
			<a href="subjects.php"><i class="fa fa-fw fa-list-alt"></i>Subject</a>
			<a href="admin_user.php"><i class="fa fa-fw fa-user"></i> Admin Users</a>
			<a href="students.php"><i class="fa fa-fw fa-users"></i> Students</a>
			<a href="teachers.php"><i class="fa fa-fw fa-users"></i> Teachers</a>
			<a href="downloadable_material.php"><i class="fa fa-fw fa-arrow-circle-o-down"></i> Downloadable Materials</a>
			<a href="assignment.php"><i class="fa fa-fw fa-arrow-circle-o-up"></i>Uploaded Assignments</a>
			<a href="content.php"><i class="fa fa-fw fa-file-o"></i> Content</a>
			<a href="calendar_event.php"><i class="fa fa-fw fa-calendar"></i> Calendar of Events</a>
			<!--<a href="#services"><i class="fa fa-fw fa-wrench"></i> Services</a>
			
			<a href="#contact"><i class="fa fa-fw fa-envelope"></i> Contact</a>-->
			
		  </div>
	<div style="margin-left:25%;padding:1px 16px;">
				<h2>My Profile</h2>
				<div id="google_translate_element"></div>

  <!-- Language buttons -->
 
  <button onclick="changeLanguage('ta')">Translate to tamil</button>
  <button onclick="changeLanguage('si')">Translate to sinhala</button>
    <div class="content">
		<div class="row">
				  <div class="column1">
					  <div class="container1">
							<img src="../Components/Avatar/img_avatar2.png" width=150 height=150 />
							
							<form action = "Login.php" method = "post">
								<div class = "cont1">
									<div class="text1">
										<label for="firstname">
											First Name
										</label>
									</div>
									<input type="text" name="fname" id="ip1" placeholder="">
								</div>
								
								<div class = "cont1">
									<div class="text1">
										<label for="lastname">
											Last Name
										</label>
									</div>
									<input type="text" name="lname" id="ip1" placeholder="">
								</div>
								
							
								
								
						</div>
					</div>
					
					<div class="column1">
						<div class="container1">
								
                           
								
							
								<div class = "cont1">
									<div class="text1">
										<label for="username">
											Username
										</label>
									</div>
									<input type="email" name="user" id="ip1" placeholder="">
								</div>
			
								<div class="cont1">
									<div class="text1">
										<label for="password">
											Password
										</label>
									</div>
									<input type="password" name="password" id="ip1" placeholder="">
								</div>
								
								<div class="cont1">
									<div class="text1">
									</div>
										<input type="submit" name="update" id="ip1" placeholder="" value="Update">
								</div>
								
								
			
					  </div>
					
				  </div>
			
		</div>

	</div>


</body>
</html>