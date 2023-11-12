<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>

<?php 
	$query= mysqli_query($link,"select * from users where user_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
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
			
			<a href="dashboard.php"><i class="fa fa-fw fa-home"></i> Dashboard</a>
			<a href="subjects.php"><i class="fa fa-fw fa-list-alt"></i>Subject</a>
			<a href="admin_user.php"><i class="fa fa-fw fa-user"></i> Admin Users</a>
			<a href="students.php"  class="active"><i class="fa fa-fw fa-users"></i> Students</a>
			<a href="teachers.php"><i class="fa fa-fw fa-users"></i> Teachers</a>
			<a href="downloadable_material.php"><i class="fa fa-fw fa-arrow-circle-o-down"></i> Downloadable Materials</a>
			<a href="assignment.php"><i class="fa fa-fw fa-arrow-circle-o-up"></i>Uploaded Assignments</a>
			<a href="content.php"><i class="fa fa-fw fa-file-o"></i> Content</a>
			<a href="calendar_event.php"><i class="fa fa-fw fa-calendar"></i> Calendar of Events</a>
			<!--<a href="#services"><i class="fa fa-fw fa-wrench"></i> Services</a>
			
			<a href="#contact"><i class="fa fa-fw fa-envelope"></i> Contact</a>-->
			
		  </div>
      <div style="margin-left:25%;padding:10px 16px;">
        <h2>Students</h2>

        <div id="google_translate_element"></div>

  <!-- Language buttons -->
 
  <button onclick="changeLanguage('ta')">Translate to tamil</button>
  <button onclick="changeLanguage('si')">Translate to sinhala</button>
  <div class="container_main">
    <div class="content1">
        <br>
        <div class="message-form">
          <h3>Add Student</h3>
          <form id="add_downloadable" method="post" enctype="multipart/form-data">
            
            <div class="control-group">
              <div class="controls">
                <input type="text" name="firstname" placeholder="Firstname" class="input" required>
              </div>
            </div>
            <div class="control-group">
              <div class="controls">
                <input type="text" name="lastname" placeholder="lastname" class="input" required>
              </div>
            </div>
            <div class="control-group">
              <div class="controls">
                <input type="text" name="username" placeholder="Username" class="input" required>
              </div>
            </div>
            <div class="control-group">
              <div class="controls">
                <input type="password" name="password" placeholder="Password" class="input" required>
              </div>
            </div>
            <div class="control-group">
								<div class="controls">
									<button name="Upload" type="submit" value="Upload" class="btn btn-info">
										<i class="fa fa-fw fa-plus-circle"></i>
									</button>
								</div>
							</div>
          </form>
      </div>
		</div>

				<div class="content1">
					<div class="message-form">
					<button name="Post" type="submit" class="btn btn-info">All</button>
          <button name="Post" type="submit" class="btn btn-info">Registered</button>
          <button name="Post" type="submit" class="btn btn-info">Unregistered</button>
          <form id="add_downloadable" method="post" enctype="multipart/form-data">
		<!-- Form inputs go here as before -->
	</form>
	
	<h3>Student List</h3>
		<table id="table1">
			
				<tr>
					<th></th>
					<th>Name</th>
					<th>Language</th>
					<th>Grade</th>
					<th></th>
				</tr>
			
				
				<!-- Populate this section with class and subject data -->
				<tr>
					<td><input type="checkbox"></td>
					<td>Mark</td>
					<td>English</td>
					<td>Grade 10</td>
					<td><button name="Post" type="submit" class="btn btn-info"><i class="fa fa-fw fa-pencil"></i></button></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Mary</td>
					<td>English</td>
					<td>Grade 11</td>
					<td><button name="Post" type="submit" class="btn btn-info"><i class="fa fa-fw fa-pencil"></i></button></td>
				</tr>
				<tr>
					<td><input type="checkbox"></td>
					<td>Raj</td>
					<td>Tamil</td>
					<td>Grade 11</td>
					<td><button name="Post" type="submit" class="btn btn-info"><i class="fa fa-fw fa-pencil"></i></button></td>
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
        alert("Adding student, Please Wait...");
    });
});

		</script>

    
</body>
</html>
