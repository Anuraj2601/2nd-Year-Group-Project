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
			
			<a href="teacher_dashboard.php" class="active"><i class="fa fa-fw fa-tachometer"></i> My Class</a>
			<a href="teacher_notification.php"><i class="fa fa-fw fa-exclamation-circle"></i>Notification</a>
			<a href="teacher_Inbox.php"><i class="fa fa-fw fa-envelope"></i> Message</a>
			<a href="add_downloadable.php"><i class="fa fa-fw fa-plus-circle"></i> Add Downloadable</a>
			<a href="add_announcement.php"><i class="fa fa-fw fa-plus-circle"></i> Add Announcement</a>
			<a href="add_assignment.php"><i class="fa fa-fw fa-plus-circle"></i> Add Assignment</a>
			<a href="add_quiz.php"><i class="fa fa-fw fa-list"></i> Quiz</a>
			<a href="shared_file.php"><i class="fa fa-fw fa-file-o"></i> Shared Files</a>
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
				<h2>Dashboard</h2>
				<div id="google_translate_element"></div>

  <!-- Language buttons -->
 
  <button onclick="changeLanguage('ta')">Translate to tamil</button>
  <button onclick="changeLanguage('si')">Translate to sinhala</button>

  <div class="container_main">
    <div class="content">
<br>

				<div class="row">
				  <div class="column">
					<div class="card1">
					  <img src="../Components/Course_img/class.jpg" alt="class1" style="width:100%">
					  <div class="container">
						<a href="mystudents.php"><h3>Class 1</h3></a>
						
						
					  </div>
					  <h4>Participants :  15</h4>
					</div>
				  </div>

				  <div class="column">
					<div class="card1">
					  <img src="../Components/Course_img/class.jpg" alt="class2" style="width:100%">
					  <div class="container">
						<a href="classmate.html"><h3>Class 2</h3></a>
						

					  </div>
					  <h4>Participants :  18</h4>
					</div>
				  </div>
				  
				  <div class="column">
					<div class="card1">
					  <img src="../Components/Course_img/class.jpg" alt="class3" style="width:100%">
					  <div class="container">
						<a href="classmate.html"><h3>Class 3</h3s></a>
						

					  </div>
					  <h4>Participants :  10</h4>
					</div>
				  </div>
				</div>
				
				
		</div>

		<div class="content">
			
						<i class="fa fa-fw fa-plus-circle"></i> Add Class
					  <form method="post">
						<div class="cont1">
							<div class="text1">
								<label>Class Name</label>
								<input type="text" name="class" placeholder="Class Name">
							</div>
						</div>

						<div class="cont1">
							<div class="text1">
								<label>No of Students</label>
								<input type="number" name="no of students" min="10" max="50">
							</div>
						</div>

						<div class="button">
							<i class="fa fa-fw fa-save"></i> Save
						</div>
					  </form>
	
				
				</div>
		</div>

			</div>

			
	</body>
</html>




