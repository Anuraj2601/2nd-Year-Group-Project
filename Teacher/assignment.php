<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>

<?php 
	$query= mysqli_query($link,"select * from teacher where teacher_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
?>

<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Teacher</title>
	<link rel="icon" type="image/x-icon" href="Components/Logo/favicon.ico">
	<link rel="stylesheet" href="Teacher.css">
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
			<a href="mystudents.php"><i class="fa fa-fw fa-users"></i> My Students</a>
			<a href="subject_overview.php"><i class="fa fa-fw fa-file-o"></i> Subject Overview</a>
			<a href="Chat.php"><i class="fa fa-fw fa-comment"></i> Inbox</a>
			<a href="createMeeting1.php"><i class="fa fa-fw fa-video-camera"></i> Meeting</a>
			<a href="download_material.php"><i class="fa fa-fw fa-arrow-circle-o-down"></i> Download Materials</a>
			<a href="assignment.php"  class="active"><i class="fa fa-fw fa-book"></i> Assignments</a>
			<a href="announcement.php"><i class="fa fa-fw fa-info-circle"></i> Announcements</a>
			<a href="calendar.php"><i class="fa fa-fw fa-calendar"></i> Class Calendar</a>
            <a href="#"><i class="fa fa-fw fa-list"></i> Quiz</a>
			<!--<a href="#services"><i class="fa fa-fw fa-wrench"></i> Services</a>
			
			<a href="#contact"><i class="fa fa-fw fa-envelope"></i> Contact</a>-->
			
		  </div>
	<div style="margin-left:25%;padding:1px 16px;">
				<h2>Assignments</h2>
        <div id="google_translate_element"></div>

  <!-- Language buttons -->
 
  <button onclick="changeLanguage('ta')">Translate to tamil</button>
  <button onclick="changeLanguage('si')">Translate to sinhala</button>
    <div class="content">
    <div class="message-form">
	<form id="add_downloadable" method="post" enctype="multipart/form-data">
		<div class="control-group">
			<label class="control-label" for="fileInput">File:</label>
			<div class="controls">
				<input name="uploaded_file" class="input-file uniform_on" id="fileInput" type="file" required>
				<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<input type="text" name="name" placeholder="File Name" class="input" required>
			</div>
		</div>
		
		<div class="control-group">
			<div class="controls">
				<textarea name="name" placeholder="Description" class="input" required cols="40" rows="15"></textarea>
			</div>
		</div>
	</form>
</div>
</div>
</div>
  
</body>
</html>