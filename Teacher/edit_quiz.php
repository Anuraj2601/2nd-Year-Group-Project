<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>
<?php $get_id = $_GET['id']; ?>

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
			<a href="teacher_dashboard.php"><i class="fa fa-fw fa-tachometer"></i> My Class</a>
			<a href="teacher_notification.php"><i class="fa fa-fw fa-exclamation-circle"></i>Notification</a>
			<a href="teacher_Inbox.php"><i class="fa fa-fw fa-envelope"></i> Message</a>
			<a href="add_downloadable.php"><i class="fa fa-fw fa-plus-circle"></i> Add Downloadable</a>
			<a href="add_announcement.php"><i class="fa fa-fw fa-plus-circle"></i> Add Announcement</a>
			<a href="add_assignment.php"><i class="fa fa-fw fa-plus-circle"></i> Add Assignment</a>
			<a href="add_quiz.php"  class="active"><i class="fa fa-fw fa-list"></i> Quiz</a>
			<a href="shared_file.php"><i class="fa fa-fw fa-file-o"></i> Shared Files</a>
			<!--<a href="#services"><i class="fa fa-fw fa-wrench"></i> Services</a>
			
			<a href="#contact"><i class="fa fa-fw fa-envelope"></i> Contact</a>-->
			
		  </div>

		<div style="margin-left:25%;padding:10px 16px;">
				<h2>Edit Quiz</h2>
				<div id="google_translate_element"></div>

  <!-- Language buttons -->
 
  <button onclick="changeLanguage('ta')">Translate to tamil</button>
  <button onclick="changeLanguage('si')">Translate to sinhala</button>
    <div class="content">
<br>
<div class="control-group">
    <div class="controls">
        <a href="add_quiz.php">
        <button name="Upload" type="submit" value="save" class="btn btn-info" style="float: right;">
            
            <i class="fa fa-fw fa-arrow-left"></i>&nbsp;Back
            
        </button>
        </a>
    </div>
</div>
<div class="message-form">
                                    <?php
                                        $query = mysqli_query($link,"select * from quiz where quiz_id = '$get_id'")or die(mysqli_error());
                                        $row = mysqli_fetch_array($query);
									?>
	<form id="add_downloadable" method="post" enctype="multipart/form-data">
                                  
		<div class="control-group">
			<div class="controls">
				<input type="text" name="title" placeholder="Quiz Title" value="<?php echo $row['quiz_title']; ?>" class="input" required>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<input type="text" name="description" placeholder="Description" value="<?php echo $row['quiz_description']; ?>" class="input" required>
			</div>
		</div>
        <div class="control-group">
            <div class="controls">
                <button name="update" type="submit" value="update" class="btn btn-info">
                    <i class="fa fa-fw fa-save"></i>&nbsp;Save
                </button>
            </div>
        </div>
		
	</form>
</div>
				</div>
		</div>

			
	</body>
</html>

<?php
	if(isset($_POST['update']))
	{
		$title = $_POST['title'];
		$description = $_POST['description'];

		$sql = mysqli_query($link,"update quiz set quiz_title = '$title' ,
        quiz_description = '$description'
        
        
        where quiz_id = '$get_id' ")or die(mysqli_error());
        

?>
		<script>
			window.location="add_quiz.php";
		</script>

		<?php
	}
?>




