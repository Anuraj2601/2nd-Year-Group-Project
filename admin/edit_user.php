<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>
<?php $get_id = $_GET['id']; ?>

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
			<a href="admin_user.php"  class="active"><i class="fa fa-fw fa-user"></i> Admin Users</a>
			<a href="students.php"><i class="fa fa-fw fa-users"></i> Students</a>
			<a href="teachers.php"><i class="fa fa-fw fa-users"></i> Teachers</a>
			<a href="downloadable_material.php"><i class="fa fa-fw fa-arrow-circle-o-down"></i> Downloadable Materials</a>
			<a href="assignment.php"><i class="fa fa-fw fa-arrow-circle-o-up"></i>Uploaded Assignments</a>
			<a href="content.php"><i class="fa fa-fw fa-file-o"></i> Content</a>
			<a href="calendar_event.php"><i class="fa fa-fw fa-calendar"></i> Calendar of Events</a>
			<!--<a href="#services"><i class="fa fa-fw fa-wrench"></i> Services</a>
			
			<a href="#contact"><i class="fa fa-fw fa-envelope"></i> Contact</a>-->
			
		  </div>
      <div style="margin-left:25%;padding:10px 16px;">
        <h2>Admin users</h2>

        <div id="google_translate_element"></div>

  <!-- Language buttons -->
 
  <button onclick="changeLanguage('ta')">Translate to tamil</button>
  <button onclick="changeLanguage('si')">Translate to sinhala</button>
  <div class="container_main">
    <div class="content1">
        <br>
        <div class="message-form">
          <h3>Add User</h3>
          <?php
									$query = mysqli_query($link,"select * from users where user_id = '$get_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>
          <form id="add_downloadable" method="post" enctype="multipart/form-data">
            
            <div class="control-group">
              <div class="controls">
                <input type="text" name="firstname" placeholder="Firstname"  value="<?php echo $row['firstname']; ?>" class="input" required>
              </div>
            </div>
            <div class="control-group">
              <div class="controls">
                <input type="text" name="lastname" placeholder="lastname"  value="<?php echo $row['lastname']; ?>" class="input" required>
              </div>
            </div>
           
            <div class="control-group">
              <div class="controls">
                <input type="password" name="password" placeholder="Password"  value="<?php echo $row['password']; ?>" class="input" required>
              </div>
            </div>
            <div class="control-group">
								<div class="controls">
									<button name="update" type="submit" class="btn btn-info">
										<i class="fa fa-fw fa-plus-circle"></i>&nbsp Update
									</button>
								</div>
							</div>
          </form>
      </div>
		</div>

				<div class="content1">
					<div class="message-form">
         
          <form method="post">
		<!-- Form inputs go here as before -->
        <button type="submit" name="delete" class="btn btn-info">
					<i class="fa fa-fw fa-trash"></i> Delete
				</button>
	
	
		<h3>User List</h3>
		<table id="table1">
			
				<tr>
					<th></th>
					<th>Name</th>
					<th>Username</th>
					<th></th>
				</tr>
			
				<?php
			$user_query = mysqli_query($link,"select * from users")or die(mysqli_error());
			while($row = mysqli_fetch_array($user_query)){
			$id = $row['user_id'];
		?>
				
				<!-- Populate this section with class and subject data -->
				<tr>
					<td><input type="checkbox"  name="selector[]" value="<?php echo $id; ?>"></td>
					<td><?php echo $row['firstname'] ?></td>
					<td><?php echo $row['username'] ?></td>
					<td><a href="edit_user.php<?php echo '?id='.$id; ?>" class="btn btn-info"><i class="fa fa-fw fa-pencil"></i></a></td>
				</tr>
				<?php 
			}
			?>
				
				
				<!-- Repeat the above rows for each class and subject -->
			
		</table>

        </form>				
						
					</div>
				</div>
    </div>
    


    </div>
    
    <!--<script>
			document.addEventListener("DOMContentLoaded", function () {
    // Handle form submission (this is a simplified example, you need server-side logic)
    const addDownloadableForm = document.getElementById("add_downloadable");
    addDownloadableForm.addEventListener("submit", function (e) {
        e.preventDefault();
        const formData = new FormData(addDownloadableForm);
        // You can use AJAX to send the form data to the server for processing.
        // Example: $.ajax({ ... });
        alert("Adding user, Please Wait...");
    });
});

		</script>-->

    
</body>
</html>

<?php
	if(isset($_POST['save']))
	{
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "select * from users where username='$username' ";
		$result = mysqli_query($link,$sql);

		$count  = mysqli_num_rows($result);

		if($count > 0)
		{
			echo "Username already exist!";
		}
		else
		{
			$sql = mysqli_query($link,"insert into users(firstname,lastname,username,password) values('$firstname','$lastname','$username','$password')") or die(mysqli_error($link));
			echo "User Successfully Added";
			?>
				<script>
					window.location = "admin_user.php";
				</script>
			<?php

		}

	}

    if(isset($_POST['update']))
    {
        $firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		
		$password = $_POST['password'];

        
        mysqli_query($link,"update users set firstname = '$firstname' ,
        lastname = '$lastname',
        
        password = '$password'
        where user_id = '$get_id' ")or die(mysqli_error());
        

?>
    <script>
        window.location = "admin_user.php";
    </script>
<?php
    }
?>

<?php

if (isset($_POST['delete'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($link,"DELETE FROM users where user_id='$id[$i]'");
}
?>
<script>
	window.location = "admin_user.php";
</script>

<?php


}

?>