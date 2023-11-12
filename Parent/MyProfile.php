<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>

<?php 
	$query= mysqli_query($link,"select * from parent where parent_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
?>

<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Parent</title>
	<link rel="stylesheet" href="Parent.css">
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
			<a href="MyProfile.php" class="active"><i class="fa fa-fw fa-user"></i>Profile</a>
			<a href="ResetPassword.html"><i class="fa fa-fw fa-unlock-alt"></i>Change Password</a>
			<a href="../logout.php"><i class="fa fa-fw fa-sign-out"></i>Log out</a>
		  </div>
		</div> 
	  </div>
	<!--<ul>
		<li><img src = "Components/Logo/Logo3.png" /></li>
	  <li><a id="id1" href="#dashboard" class="btn">Dashboard</a></li>
	  <li><a href="MyProfile.html" class="btn">My Profile</a></li>
	  <li><a href="Parent_Notification.html" class="btn">Notifications</a></li>
	  <li><a href="Chat.html" class="btn">My Inbox</a></li>
	  <li><a href="createMeeting.html" class="btn">Meeting</a></li>
	  <li><a href="Payment.php" class="btn">Payments</a></li>
	  <li><a href="#signout" class="btn">Sign Out</a></li>
	
	</ul>-->
	<div class="sidebar">
		<a href="home.php"><i class="fa fa-fw fa-home"></i> Home</a>
		<a href="Parent_dashboard.php"><i class="fa fa-fw fa-tachometer"></i> Dashboard</a>
		<a href="Chat.php"><i class="fa fa-fw fa-comment"></i> Inbox</a>
		<a href="createMeeting.php"><i class="fa fa-fw fa-video-camera"></i> Meeting</a>
		<a href="Payment.php"><i class="fa fa-fw fa-credit-card-alt"></i> Payment</a>
		<!--<a href="#services"><i class="fa fa-fw fa-wrench"></i> Services</a>
		
		<a href="#contact"><i class="fa fa-fw fa-envelope"></i> Contact</a>-->
		
	  </div>
	<div style="margin-left:25%;padding:1px 16px;">
				<h2>My Profile</h2>
				<div id="google_translate_element"></div>

  <!-- Language buttons -->
 
  <button onclick="changeLanguage('ta')">Translate to tamil</button>
  <button onclick="changeLanguage('si')">Translate to sinhala</button>
  <div class="content">
		<div class="row">
				  
					  <div class="container1">
							<img src="../Components/Avatar/img_avatar2.png" width=150 height=150 />
							
							<form action = "Login.php" method = "post">
								<div class = "cont1">
									<div class="text1">
										<label for="firstname">
											First Name
										</label>
									</div>
									<input type="text" name="fname" id="ip1" placeholder="">
								</div>
								
								<div class = "cont1">
									<div class="text1">
										<label for="lastname">
											Last Name
										</label>
									</div>
									<input type="text" name="lname" id="ip1" placeholder="">
								</div>
								
								<div class = "cont1">
									<div class="text1">
										<label for="address">
											Address
										</label>
									</div>
									<input type="text" name="address" id="ip1" placeholder="">
								</div>
								
								<div class = "cont1">
									<div class="text1">
										<label for="numInput">
											No.of Children
										</label>
									</div>
									<input type="number" name="noofchildren" id="numInput" placeholder="" min=1 max= 5 onchange="updateTextFields()">
								</div>
								
								
									<div class="text1" id="textFieldsContainer">
										<label for="children name">
											Children Name
										</label><br>
									
									<input type="text" name="textField1" placeholder="">
									
									</div>
								
							
								<div class = "cont1">
									<div class="text1">
										<label for="username">
											Username
										</label>
									</div>
									<input type="email" name="user" id="ip1" placeholder="">
								</div>
			
								<div class="cont1">
									<div class="text1">
										<label for="password">
											Password
										</label>
									</div>
									<input type="password" name="password" id="ip1" placeholder="">
								</div>
								
								<div class="cont1">
									<div class="text1">
									</div>
										<input type="submit" name="update" id="ip1" placeholder="" value="Update">
								</div>
								
								
							</form>
						</div>
					
					
					
			
		</div>
		</div>

	</div>

	<script>
        function updateTextFields() {
            const numInput = document.getElementById("numInput");
            const textFieldsContainer = document.getElementById("textFieldsContainer");
            const num = parseInt(numInput.value);

            // Clear existing text input fields
            textFieldsContainer.innerHTML = "";

            // Create new text input fields based on the entered number
            for (let i = 1; i <= num; i++) {
                const textField = document.createElement("input");
                textField.type = "text";
                textField.name = "textField" + i;
                textFieldsContainer.appendChild(textField);
                textFieldsContainer.appendChild(document.createElement("br")); // Add a line break
            }
        }
    </script>
</body>
</html>