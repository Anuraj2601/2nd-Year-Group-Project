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
			
			<a href="dashboard.php"><i class="fa fa-fw fa-home"></i> Dashboard</a>
			<a href="subjects.php"><i class="fa fa-fw fa-list-alt"></i>Subject</a>
			<a href="admin_user.php"><i class="fa fa-fw fa-user"></i> Admin Users</a>
			<a href="students.php"><i class="fa fa-fw fa-users"></i> Students</a>
			<a href="teachers.php"><i class="fa fa-fw fa-users"></i> Teachers</a>
			<a href="downloadable_material.php"  class="active"><i class="fa fa-fw fa-arrow-circle-o-down"></i> Downloadable Materials</a>
			<a href="assignment.php"><i class="fa fa-fw fa-arrow-circle-o-up"></i>Uploaded Assignments</a>
			<a href="content.php"><i class="fa fa-fw fa-file-o"></i> Content</a>
			<a href="calendar_event.php"><i class="fa fa-fw fa-calendar"></i> Calendar of Events</a>
			<!--<a href="#services"><i class="fa fa-fw fa-wrench"></i> Services</a>
			
			<a href="#contact"><i class="fa fa-fw fa-envelope"></i> Contact</a>-->
			
		  </div>

		<div style="margin-left:25%;padding:10px 16px;">
				<h2>Downloadable Materials</h2>
				<div id="google_translate_element"></div>

  <!-- Language buttons -->
 
  <button onclick="changeLanguage('ta')">Translate to tamil</button>
  <button onclick="changeLanguage('si')">Translate to sinhala</button>
    <div class="content">
<br>
<div class="message-form">
	
	<form id="add_downloadable" method="post" enctype="multipart/form-data">
		<!-- Form inputs go here as before -->
	</form>
	
		<h3>Downloadable files uploaded list</h3>
		<table id="table1">
			
				<tr>
					<th>Date upload</th>
					<th>File Name</th>
					<th>Decription</th>
					<th>Uploaded By</th>
					<th>Class</th>
					
				</tr>
			
				
				<!-- Populate this section with class and subject data -->
				<tr>
					<td>2023-09-17 10:18</td>
					<td>test</td>
					<td>test</td>
					<td>Ruby</td>
					<td>M1002</td>
					
				</tr>
				<tr>
				<td>2023-10-01 12:19</td>
					<td>Sample</td>
					<td>Sample</td>
					<td>Mary</td>
					<td>SC1002</td>
					
				</tr>
				
				<tr>
				<td>2023-08-14 09:38</td>
					<td>Introduction</td>
					<td>Introduction</td>
					<td>John</td>
					<td>R1002</td>
					
				</tr>
				
				
				<!-- Repeat the above rows for each class and subject -->
			
		</table>

		
	
</div>
				</div>
		</div>

			
	</body>
</html>




