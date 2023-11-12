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
			<link rel="stylesheet" href="Student.css">
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
			<a href="Student_dashboard.php"><i class="fa fa-fw fa-chevron-left"></i> Back</a>
			<a href="classmate.php"><i class="fa fa-fw fa-users"></i> Classmates</a>
			<a href="class_progress.php" class="active"><i class="fa fa-fw fa-bar-chart-o"></i>My Progress</a>
			<a href="class_subject.php"><i class="fa fa-fw fa-file-o"></i> Subject Overview</a>
			<a href="class_assignment.php"><i class="fa fa-fw fa-book"></i> Assignment</a>
			<a href="class_announcement.php"><i class="fa fa-fw fa-info-circle"></i> Announcement</a>
            <a href="Student_quiz.php"><i class="fa fa-fw fa-bars"></i> Quiz</a>
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
				<h2>My Progress</h2>
				<div id="google_translate_element"></div>

  <!-- Language buttons -->
 
				<button onclick="changeLanguage('ta')">Translate to tamil</button>
				<button onclick="changeLanguage('si')">Translate to sinhala</button>
					<div class="content">
				<br>
				<div class="progress-table">
					<h2>Assignment Grades</h2>
					<table class="vertical">
						<tr>
							<th>Assignment</th>
							<th>Grade</th>
						</tr>
						<tr>
							<td>Assignment 1</td>
							<td>
								<div class="progress-bar" style="width: 85%;">85%</div>
							</td>
						</tr>
						<tr>
							<td>Assignment 2</td>
							<td>
								<div class="progress-bar" style="width: 92%;">92%</div>
							</td>
						</tr>
						<!-- Add more assignments here -->
					</table>
					<h2>Practice Quiz Progress</h2>
					<table class="vertical">
						<tr>
							<th>Quiz</th>
							<th>Progress</th>
						</tr>
						<tr>
							<td>Quiz 1</td>
							<td>
								<div class="progress-bar" style="width: 75%;">75%</div>
							</td>
						</tr>
						<tr>
							<td>Quiz 2</td>
							<td>
								<div class="progress-bar" style="width: 88%;">88%</div>
							</td>
						</tr>
						<!-- Add more quizzes here -->
					</table>
				</div>
					</div>

	</body>

</html>
					