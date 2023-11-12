<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>

<?php 
	$query= mysqli_query($link,"select * from parent where parent_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parent</title>
    <link integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<link rel="stylesheet" href="Parent.css">
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
				<a href="MyProfile.html"><i class="fa fa-fw fa-user"></i>Profile</a>
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
			<a href="Payment.php" class="active"><i class="fa fa-fw fa-credit-card-alt"></i> Payment</a>
			<!--<a href="#services"><i class="fa fa-fw fa-wrench"></i> Services</a>
			
			<a href="#contact"><i class="fa fa-fw fa-envelope"></i> Contact</a>-->
			
		  </div>

	
		<div style="margin-left:25%;padding:10px 16px;height:1000px;">
				<h2>Payments</h2>
				<div id="google_translate_element"></div>

  <!-- Language buttons -->
 
  <button onclick="changeLanguage('ta')">Translate to tamil</button>
  <button onclick="changeLanguage('si')">Translate to sinhala</button>
  <div class="content">
				<table>
					  <tr>
						<th>Children Name</th>
						<th>Subject</th>
						<th>Fees</th>
						<th>Pay</th>
					  </tr>
					  <tr>
						<td id = "name">John</td>
						<td>Maths</td>
						<td id="price">Rs.100.00</td>
						<td><button class = "btn" onclick="buyNow();">Pay</button></td>
					  </tr>
					  <tr>
						<td id = "name">Joe</td>
						<td>Science</td>
						<td id="price">Rs.150.00</td>
						<td><button class = "btn" onclick="buyNow();">Pay</button></td>
					  </tr>
					  <tr>
						<td id = "name">Jane</td>
						<td>History</td>
						<td id="price">Rs.300.00</td>
						<td><button class = "btn" onclick="buyNow();">Pay</button></td>
					  </tr>
					  <tr>
						<td id = "name">Mike</td>
						<td>English</td>
						<td id="price">Rs.250.00</td>
						<td><button class = "btn" onclick="buyNow();">Pay</button></td>
					 </tr>
				</table>
</div>
        </div>

<script src="https://www.payhere.lk/lib/payhere.js"></script>
<script src="script.js"></script>
</body>
</html>