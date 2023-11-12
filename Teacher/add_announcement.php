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
                <script src="../Components/ckeditor/ckeditor.js"></script>
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
			<a href="teacher_dashboard.php"><i class="fa fa-fw fa-tachometer"></i> My Class</a>
			<a href="teacher_notification.php"><i class="fa fa-fw fa-exclamation-circle"></i>Notification</a>
			<a href="teacher_Inbox.php"><i class="fa fa-fw fa-envelope"></i> Message</a>
			<a href="add_downloadable.php"><i class="fa fa-fw fa-plus-circle"></i> Add Downloadable</a>
			<a href="add_announcement.php"  class="active"><i class="fa fa-fw fa-plus-circle"></i> Add Announcement</a>
			<a href="add_assignment.php"><i class="fa fa-fw fa-plus-circle"></i> Add Assignment</a>
			<a href="add_quiz.php"><i class="fa fa-fw fa-list"></i> Quiz</a>
			<a href="shared_file.php"><i class="fa fa-fw fa-file-o"></i> Shared Files</a>
			<!--<a href="#services"><i class="fa fa-fw fa-wrench"></i> Services</a>
			
			<a href="#contact"><i class="fa fa-fw fa-envelope"></i> Contact</a>-->
			
		  </div>

		<div style="margin-left:25%;padding:10px 16px;">
				<h2>Add Announcements</h2>
				<div id="google_translate_element"></div>

  <!-- Language buttons -->
 
  <button onclick="changeLanguage('ta')">Translate to tamil</button>
  <button onclick="changeLanguage('si')">Translate to sinhala</button>
  <div class="container_main">
    <div class="content1">
<br>

<div class="message-form">
	<textarea id="content" name="ckeditor_full"></textarea>
							<script>
								CKEDITOR.replace('content');
								
							</script>
						<br>

                        <div class="control-group">
                            <div class="controls">
                                <button name="Post" type="submit" value="Upload" class="btn btn-info">
                                    <i class="fa fa-fw fa-check"></i>&nbsp;Post
                                </button>
                            </div>
                        </div>
							
</div>
				
				
				</div>

				<div class="content1">
					<div class="message-form">
						<form id="add_downloadable" method="post" enctype="multipart/form-data">
							<!-- Form inputs go here as before -->
						</form>
						
							<h2>Announcement</h2>
							<table id="table1">
								
									<tr>
										<th></th>
										<th>Class Name</th>
										<th>Subject Code</th>
									</tr>
								
									
									<!-- Populate this section with class and subject data -->
									<tr>
										<td><input type="checkbox"></td>
										<td>M001</td>
										<td>1001</td>
									</tr>
									<tr>
										<td><input type="checkbox"></td>
										<td>M006</td>
										<td>1001</td>
									</tr>
									<tr>
										<td><input type="checkbox"></td>
										<td>M004</td>
										<td>1001</td>
									</tr>
									<tr>
										<td><input type="checkbox"></td>
										<td>M007</td>
										<td>1001</td>
									</tr>
									<tr>
										<td><input type="checkbox"></td>
										<td>M010</td>
										<td>1001</td>
									</tr>
									<tr>
										<td><input type="checkbox"></td>
										<td>M002</td>
										<td>1001</td>
									</tr>
									<!-- Repeat the above rows for each class and subject -->
								
							</table>

							
						
					</div>
				</div>
		</div>

		</div>	

		<script>
			document.addEventListener("DOMContentLoaded", function () {
    // Handle form submission (this is a simplified example, you need server-side logic)
    const addDownloadableForm = document.getElementById("add_downloadable");
    addDownloadableForm.addEventListener("submit", function (e) {
        e.preventDefault();
        const formData = new FormData(addDownloadableForm);
        // You can use AJAX to send the form data to the server for processing.
        // Example: $.ajax({ ... });
        alert("Posting Announcement, Please Wait...");
    });
});

		</script>
	</body>
</html>




