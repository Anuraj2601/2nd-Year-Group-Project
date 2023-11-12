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
                <script src="../Components/ckeditor/ckeditor.js"></script>
                <!--<link rel="stylesheet" href="../Components/ckeditor/contents.css">-->
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
			<a href="subjects.php" class="active"><i class="fa fa-fw fa-list-alt"></i>Subject</a>
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
				<h2>Subjects</h2>
				<div id="google_translate_element"></div>

  <!-- Language buttons -->
				  
				<button onclick="changeLanguage('ta')">Translate to tamil</button>
				<button onclick="changeLanguage('si')">Translate to sinhala</button>
					<div class="content">
						<a href="subjects.php"><i class="fa fa-fw fa-chevron-left"></i>Back</a>
						<br>
							<form method="post">
								<div class="control-group">
								<label class="control-label" for="fileInput">Subject Code:</label>
									<div class="controls">
										<input type="text" name="subject_code" placeholder="Subject code" class="input" required>
									</div>
								</div>
								<div class="control-group">
								<label class="control-label" for="fileInput">Subject Title:</label>
									<div class="controls">
										<input type="text" name="title" placeholder="Subject Title" class="input" required>
									</div>
								</div>
								<br>
								<label class="control-label" for="fileInput">Description:</label>
									<textarea name="description" id="ckeditor_full"></textarea>
									<script>
										CKEDITOR.replace('ckeditor_full');
										
									</script>
								<br>
									
										<button type="submit" name="save" class="btn btn-info">
											<i class="fa fa-fw fa-save"></i> Save
										</button>
							</form>

					</div>
        </div>
                   
	</body>

</html>

<?php
	if(isset($_POST['save']))
	{
		$subjectcode = $_POST['subject_code'];
		$title = $_POST['title'];
		$description = $_POST['description'];

		$query = mysqli_query($link,"select * from subject where subject_code = '$subjectcode' ")or die(mysqli_error());
		$count = mysqli_num_rows($query);

		if($count > 0){ ?>
			<script>
			alert('Data Already Exist');
			</script>
		<?php
		}
		else
		{
		mysqli_query($link,"insert into subject(subject_code,subject_title,description) values('$subjectcode','$title','$description')") or die(mysqli_error());
		}
		
		?>
		<script>
			window.location = "subjects.php";
		</script>
		<?php
				}
				
										
		?>
	

					