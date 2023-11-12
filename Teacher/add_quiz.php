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
				<h2>Add Quiz</h2>
				<div id="google_translate_element"></div>

  <!-- Language buttons -->
 
  <button onclick="changeLanguage('ta')">Translate to tamil</button>
  <button onclick="changeLanguage('si')">Translate to sinhala</button>
    <div class="content">
<br>
<div class="message-form">
	<ul class="nav nav-tabs">
		<li class="active">
			<a href="add_quiz_data.php"><button name="Post" type="submit" value="Upload" class="btn btn-info">
				<i class="fa fa-fw fa-plus"></i>&nbsp;Add Quiz
			</button></a>
		</li>
		<li><a href="add_quiz_to_class.php"><button name="Post" type="submit" value="Upload" class="btn btn-info">
			<i class="fa fa-fw fa-plus"></i>&nbsp;Add Quiz to class
		</button></a></li>
	</ul>
	<form id="add_downloadable" method="post" enctype="multipart/form-data">
		<!-- Form inputs go here as before -->
		<button type="submit" name="delete" class="btn btn-info">
					<i class="fa fa-fw fa-trash"></i> Delete
				</button>
	
	
		<h2>Class List</h2>
		<table id="table1">
			
				<tr>
					<th></th>
					<th>Quiz title</th>
					<th>Description</th>
					<th>Date Added</th>
					<th>Questions</th>
					<th></th>
				</tr>

				<?php
					$sql = "select * from quiz";
					$result = mysqli_query($link,$sql) or die(mysqli_error($link));
					$count = mysqli_num_rows($result);

					if($count <= 0)
					{
						echo "<b>There is no Quiz currently Available</b>";
					}
					else
					{
					while($row = mysqli_fetch_array($result))
					{
						$id = $row['quiz_id'];
				?>
			
				
				<!-- Populate this section with class and subject data -->
				<tr>
					<td><input type="checkbox" name="selector[]" value="<?php echo $id; ?>"></td>
					<td><?php echo $row['quiz_title']; ?></td>
					<td><?php echo $row['quiz_description']; ?></td>
					<td><?php echo $row['date_added']; ?></td>
					<td><a href="quiz_question.php">Questions</a></td>
					<td><a href="edit_quiz.php<?php echo '?id='.$id; ?>" class="btn btn-info"><i class="fa fa-fw fa-pencil"></i></a></td>
				</tr>
				<?php
					}
				}
				?>
				
				<!-- Repeat the above rows for each class and subject -->
			
		</table>

			</form>
	
</div>
				</div>
		</div>

			
	</body>
</html>

<?php
include '../database/db_con.php';
if (isset($_POST['delete'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($link,"DELETE FROM quiz where quiz_id='$id[$i]'");
}
?>
<script>
	window.location = "add_quiz.php";
</script>

<?php
}
?>




