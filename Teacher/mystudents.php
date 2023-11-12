<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>

<?php 
	$query= mysqli_query($link,"select * from teacher where teacher_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Teacher</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="stylesheet" href="Teacher.css">
			<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
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
			<a href="teacher_dashboard.php"><i class="fa fa-fw fa-chevron-left"></i> Back</a>
			<a href="mystudents.php" class="active"><i class="fa fa-fw fa-users"></i> My Students</a>
			<a href="subject_overview.php"><i class="fa fa-fw fa-file-o"></i> Subject Overview</a>
			<a href="Chat.php"><i class="fa fa-fw fa-comment"></i> Inbox</a>
			<a href="createMeeting1.php"><i class="fa fa-fw fa-video-camera"></i> Meeting</a>
			<a href="download_material.php"><i class="fa fa-fw fa-arrow-circle-o-down"></i> Download Materials</a>
			<a href="assignment.php"><i class="fa fa-fw fa-book"></i> Assignments</a>
			<a href="announcement.php"><i class="fa fa-fw fa-info-circle"></i> Announcements</a>
			<a href="#"><i class="fa fa-fw fa-calendar"></i> Class Calendar</a>
            <a href="#"><i class="fa fa-fw fa-list"></i> Quiz</a>
			<!--<a href="#services"><i class="fa fa-fw fa-wrench"></i> Services</a>
			
			<a href="#contact"><i class="fa fa-fw fa-envelope"></i> Contact</a>-->
			
		  </div>
		<!--<ul>
			<li><img src = "../Components/Logo/Logo3.png" /></li>
			<li><a href="home.html" class="btn">Home</a></li>
		  <li><a id="id1" href="#dashboard" class="btn">Dashboard</a></li>
		  <li><a href="Announcement.html" class="btn">Announcement</a></li>
		  <li><a href="Stud_Notification.html" class="btn">Notifications</a></li>
		  <li><a href="Student_Inbox.html" class="btn">My Inbox</a></li>
		  <li><a href="createMeeting1.html" class="btn">Study Room</a></li>
		  <li><a href="Student_selfstudy.html" class="btn">Self Study</a></li>
    </ul>-->

		<div style="margin-left:25%;padding:10px 16px;">
				<h2>My Students</h2>
				<div id="google_translate_element"></div>

  <!-- Language buttons -->
 
				<button onclick="changeLanguage('ta')">Translate to tamil</button>
				<button onclick="changeLanguage('si')">Translate to sinhala</button>
					<div class="content">
				<br>
				<div class="classmate-list">
					<div class="classmate">
						<img src="../Components/Avatar/avatar1.png" alt="Classmate 1">
						John Doe
						
					</div>
					<div class="classmate">
						<img src="../Components/Avatar/avatar2.png" alt="Classmate 2">
						Robert
						
					</div>
					<div class="classmate">
						<img src="../Components/Avatar/avatar6.png" alt="Classmate 3">
						Jane
						
					</div>
					<div class="classmate">
						<img src="../Components/Avatar/avatar7.png" alt="Classmate 4">
						James
						
					</div>
					<div class="classmate">
						<img src="../Components/Avatar/avatar5.png" alt="Classmate 5">
						David
						
					</div>
					<!-- Add more classmates as needed -->
				</div>

				</div>
			</div>
				
	</body>

</html>
					