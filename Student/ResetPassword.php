<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>

<?php 
	$query= mysqli_query($link,"select * from student where student_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
?>

<html>	
	<head>
		<title>Student</title>
			<link rel="icon" type="image/x-icon" href="Components/Logo/favicon.ico">
			<link rel="stylesheet" href="Student.css">
			<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
				
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
				<a href="ResetPassword.php" class="active"><i class="fa fa-fw fa-unlock-alt"></i>Change Password</a>
				<a href="../logout.php"><i class="fa fa-fw fa-sign-out"></i>Log out</a>
			  </div>
			</div> 
		  </div>
		
		<div class="sidebar">
			<a href="Student_home.php"><i class="fa fa-fw fa-home"></i> Home</a>
			<a href="Student_dashboard.php"><i class="fa fa-fw fa-tachometer"></i> Dashboard</a>
			<a href="Student_Announcement.php"><i class="fa fa-fw fa-bullhorn"></i>Announcements</a>
			<a href="Student_Inbox.php"><i class="fa fa-fw fa-comment"></i> Inbox</a>
			<a href="createMeeting1.php"><i class="fa fa-fw fa-video-camera"></i> Study Room</a>
			<a href="Student_selfstudy.php"><i class="fa fa-fw fa-star"></i> Self Study</a>
			<!--<a href="#services"><i class="fa fa-fw fa-wrench"></i> Services</a>
			
			<a href="#contact"><i class="fa fa-fw fa-envelope"></i> Contact</a>-->
			
		  </div>

		  <div style="margin-left:25%;padding:10px 16px;">
			<h2>Announcements</h2>
	
			<div id="google_translate_element"></div>
	
	  <!-- Language buttons -->
	 
	  <button onclick="changeLanguage('ta')">Translate to tamil</button>
	  <button onclick="changeLanguage('si')">Translate to sinhala</button>
		
	  <div class="content">
	<form method="POST" action="reset-password.php">

			<label id="form-label">New Password</label>
			<div>
				<input type="password" name="n-password" id="input-field" required>
			</div>
			<label id="form-label">Confirm Password</label>
			<div>
				<input type="password" name="c-password" id="input-field" required>
			</div>
			<input type="submit" value="Submit" name="reset" id="form-btn">
		</form>
		</div>
	</body>
</html>