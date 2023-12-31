<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>

<?php 
	$query= mysqli_query($link,"select * from student where student_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Student</title>
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
			<a href="Student_home.php"><i class="fa fa-fw fa-home"></i> Home</a>
			<a href="Student_dashboard.php" class="active"><i class="fa fa-fw fa-tachometer"></i> Dashboard</a>
			<a href="Student_Announcement.php"><i class="fa fa-fw fa-bullhorn"></i>Announcements</a>
			<a href="Student_Inbox.php"><i class="fa fa-fw fa-comment"></i> Inbox</a>
			<a href="createMeeting1.php"><i class="fa fa-fw fa-video-camera"></i> Study Room</a>
			<a href="Student_selfstudy.php"><i class="fa fa-fw fa-star"></i> Self Study</a>
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
    <div class="content">
<br>

				<div class="row">
				  <div class="column">
					<div class="card1">
					  <img src="../Components/Course_img/English.jpg" alt="English" style="width:100%">
					  <div class="container">
						<a href="classmate.php"><h2>English</h2></a>
						
						
					  </div>
					</div>
				  </div>

				  <div class="column">
					<div class="card1">
					  <img src="../Components/Course_img/History.jpg" alt="History" style="width:100%">
					  <div class="container">
						<a href="classmate.php"><h2>History</h2></a>
				

					  </div>
					</div>
				  </div>
				  
				  <div class="column">
					<div class="card1">
					  <img src="../Components/Course_img/math.jpg" alt="Maths" style="width:100%">
					  <div class="container">
						<a href="classmate.php"><h2>Maths</h2></a>
						

					  </div>
					</div>
				  </div>
				</div>
				
				<div class="row">
				  <div class="column">
					<div class="card1">
					  <img src="../Components/Course_img/Science.jpg" alt="Science" style="width:100%">
					  <div class="container">
						<a href="classmate.php"><h2>Science</h2></a>
						
						
					  </div>
					</div>
				  </div>

				  <div class="column">
					<div class="card1">
					  <img src="../Components/Course_img/Religion.jpg" alt="Religion" style="width:100%">
					  <div class="container">
						<a href="classmate.php"><h2>Religion</h2></a>
				

					  </div>
					</div>
				  </div>
				  
				  <div class="column">
					<div class="card1">
					  <img src="../Components/Course_img/Sinhala.jpg" alt="Sinhala" style="width:100%">
					  <div class="container">
						<a href="classmate.php"><h2>Sinhala</h2></a>
						

					  </div>
					</div>
				  </div>
				</div>
		</div>

			
	</body>
</html>




