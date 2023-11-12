<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>

<?php 
	$query= mysqli_query($link,"select * from teacher where teacher_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
?>

<html>

<head>
	<title>Parent</title>
	<link rel="icon" type="image/x-icon" href="Components/Logo/favicon.ico">
			<link rel="stylesheet" href="Teacher.css">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script defer src="https://widget-js.cometchat.io/v3/cometchatwidget.js"></script>
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
			<a href="Chat.php"  class="active"><i class="fa fa-fw fa-comment"></i> Inbox</a>
			<a href="createMeeting1.php"><i class="fa fa-fw fa-video-camera"></i> Meeting</a>
			<a href="download_material.php"><i class="fa fa-fw fa-arrow-circle-o-down"></i> Download Materials</a>
			<a href="assignment.php"><i class="fa fa-fw fa-book"></i> Assignments</a>
			<a href="announcement.php"><i class="fa fa-fw fa-info-circle"></i> Announcements</a>
			<a href="#"><i class="fa fa-fw fa-calendar"></i> Class Calendar</a>
            <a href="#"><i class="fa fa-fw fa-list"></i> Quiz</a>
			<!--<a href="#services"><i class="fa fa-fw fa-wrench"></i> Services</a>
			
			<a href="#contact"><i class="fa fa-fw fa-envelope"></i> Contact</a>-->
			
		  </div>
	<div style="margin-left:25%;padding:10px 16px;">
		<h2>My Inbox</h2>
		<div id="google_translate_element"></div>

  <!-- Language buttons -->
 
  <button onclick="changeLanguage('ta')">Translate to tamil</button>
  <button onclick="changeLanguage('si')">Translate to sinhala</button>

  <div class="content">
	<br>
	<div id="cometchat"></div>
	<script>
	window.addEventListener('DOMContentLoaded', (event) => {
		CometChatWidget.init({
			"appID": "2446382463d97217",
			"appRegion": "us",
			"authKey": "92db77889fabeac2e6bce0c885af481bcc1ec8b0"
		}).then(response => {
			console.log("Initialization completed successfully");
			//You can now call login function.
			CometChatWidget.login({
				"uid": "anu2601"
			}).then(response => {
				CometChatWidget.launch({
					"widgetID": "ba6deb25-85a1-4834-8031-19a93649f004",
					"target": "#cometchat",
					"roundedCorners": "true",
					"height": "450px",
					"width": "800px",
					"defaultID": 'superhero1', //default UID (user) or GUID (group) to show,
					"defaultType": 'user' //user or group
				});
			}, error => {
				console.log("User login failed with error:", error);
				//Check the reason for error and take appropriate action.
			});
		}, error => {
			console.log("Initialization failed with error:", error);
			//Check the reason for error and take appropriate action.
		});
	});
	</script>
	
	</div>
</div>
</body>

</html>