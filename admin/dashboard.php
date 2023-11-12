<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>

<?php 
	$query= mysqli_query($link,"select * from users where user_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="stylesheet" href="admin.css">
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
			
			<a href="dashboard.php" class="active"><i class="fa fa-fw fa-home"></i> Dashboard</a>
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

<div class="classmate-list">
        <div class="classmate">
            <div class="count" id="parentsCount">0</div>
            <div class="label">Parents</div>
        </div>
        <div class="classmate">
            <div class="count" id="studentsCount">0</div>
            <div class="label">Students</div>
        </div>
        <div class="classmate">
            <div class="count" id="registerstudentCount">0</div>
            <div class="label">Registered Students</div>
        </div>
        <div class="classmate">
            <div class="count" id="teachersCount">0</div>
            <div class="label">Teachers</div>
        </div>
        <div class="classmate">
            <div class="count" id="registerteacherCount">0</div>
            <div class="label">Registered Teachers</div>
        </div>
        <div class="classmate">
            <div class="count" id="subjectsCount">0</div>
            <div class="label">Subjects</div>
        </div>
        <div class="classmate">
            <div class="count" id="classesCount">0</div>
            <div class="label">Classes</div>
        </div>
    </div>
				
				
		</div>

		<!--<div class="content">
			
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
	
				
				</div>-->
		</div>

			</div>

			<script>
							function animateCounts() {
				const parentsCount = document.getElementById('parentsCount');
				const studentsCount = document.getElementById('studentsCount');
				const teachersCount = document.getElementById('teachersCount');
				const subjectsCount = document.getElementById('subjectsCount');
				const classesCount = document.getElementById('classesCount');
				const registerteachrCount = document.getElementById('registerteacherCount');
				const registerstudentCount = document.getElementById('registerstudentCount');

				const totalCounts = [21, 50, 37, 6, 30, 15, 23];

				const increment = 1; // The amount by which counts increase in each step
				const interval = 50; // The interval between count updates in milliseconds

				const updateCounts = () => {
					if (+parentsCount.textContent < totalCounts[0]) {
						parentsCount.textContent = Math.min(+parentsCount.textContent + increment, totalCounts[0]);
					}
					if (+studentsCount.textContent < totalCounts[1]) {
						studentsCount.textContent = Math.min(+studentsCount.textContent + increment, totalCounts[1]);
					}
					if (+teachersCount.textContent < totalCounts[2]) {
						teachersCount.textContent = Math.min(+teachersCount.textContent + increment, totalCounts[2]);
					}
					if (+subjectsCount.textContent < totalCounts[3]) {
						subjectsCount.textContent = Math.min(+subjectsCount.textContent + increment, totalCounts[3]);
					}
					if (+classesCount.textContent < totalCounts[4]) {
						classesCount.textContent = Math.min(+classesCount.textContent + increment, totalCounts[4]);
					}
					if (+registerteachrCount.textContent < totalCounts[5]) {
						registerteacherCount.textContent = Math.min(+registerteachrCount.textContent + increment, totalCounts[5]);
					}
					if (+registerstudentCount.textContent < totalCounts[6]) {
						registerstudentCount.textContent = Math.min(+registerstudentCount.textContent + increment, totalCounts[6]);
					}
				};

				setInterval(updateCounts, interval);
			}

			animateCounts();

			</script>
	</body>
</html>




