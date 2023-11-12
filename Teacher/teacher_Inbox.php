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
			<script defer src="https://widget-js.cometchat.io/v3/cometchatwidget.js"></script>
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
			<a href="<div class="navbar">
		<a href="#home"><img src = "../Components/Logo/Logo3.png" /></a>Logo</a>
		
		<div class="dropdown" style="float:right;">
		  <button class="dropbtn"><?php echo $row['firstname']; ?>
			<i class="fa fa-caret-down"></i>
		  </button>
		  <div class="dropdown-content">
			<a href="MyProfile.php" class="active"><i class="fa fa-fw fa-user"></i>Profile</a>
			<a href="ResetPassword.php"><i class="fa fa-fw fa-unlock-alt"></i>Change Password</a>
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
		<a href="teacher_dashboard.php"><i class="fa fa-fw fa-tachometer"></i> My Class</a>
			<a href="teacher_notification.php"><i class="fa fa-fw fa-exclamation-circle"></i>Notification</a>
			<a href="teacher_Inbox.php" ><i class="fa fa-fw fa-envelope"></i> Message</a>
			<a href="add_downloadable.php"><i class="fa fa-fw fa-plus-circle"></i> Add Downloadable</a>
			<a href="add_announcement.php"><i class="fa fa-fw fa-plus-circle"></i> Add Announcement</a>
			<a href="add_assignment.php"><i class="fa fa-fw fa-plus-circle"></i> Add Assignment</a>
			<a href="add_quiz.php"><i class="fa fa-fw fa-list"></i> Quiz</a>
			<a href="shared_file.php"><i class="fa fa-fw fa-file-o"></i> Shared Files</a>
		<!--<a href="#services"><i class="fa fa-fw fa-wrench"></i> Services</a>
		
		<a href="#contact"><i class="fa fa-fw fa-envelope"></i> Contact</a>-->
		
	  </div>"><i class="fa fa-fw fa-exclamation-circle"></i>Notification</a>
			<a href="teacher_Inbox.php"  class="active"><i class="fa fa-fw fa-envelope"></i> Message</a>
			<a href="add_downloadable.php"><i class="fa fa-fw fa-plus-circle"></i> Add Downloadable</a>
			<a href="add_announcement.php"><i class="fa fa-fw fa-plus-circle"></i> Add Announcement</a>
			<a href="add_assignment.php"><i class="fa fa-fw fa-plus-circle"></i> Add Assignment</a>
			<a href="add_quiz.php"><i class="fa fa-fw fa-list"></i> Quiz</a>
			<a href="shared_file.php"><i class="fa fa-fw fa-file-o"></i> Shared Files</a>
			<!--<a href="#services"><i class="fa fa-fw fa-wrench"></i> Services</a>
			
			<a href="#contact"><i class="fa fa-fw fa-envelope"></i> Contact</a>-->
			
		  </div>

		<div style="margin-left:25%;padding:10px 16px;">
				<h2>My Inbox</h2>
				<div id="google_translate_element"></div>

  <!-- Language buttons -->
 
  <button onclick="changeLanguage('ta')">Translate to tamil</button>
  <button onclick="changeLanguage('si')">Translate to sinhala</button>
    <!--<div class="content">
				
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
				"uid": "john_doe"
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
	</script>-->
	<div class="container_main">
    <div class="content1">
<br>

		<div class="message-list">
			<ul id="inbox-list">
				<!-- Inbox messages will be displayed here using JavaScript -->
			</ul>
		</div>
				
				
		</div>

		<div class="content1">
			<div class="message-form">
				<h3><i class="fa fa-fw fa-pencil"></i>Create Message</h3>
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="teacher_message.php">For Teacher</a>
					</li>
					<li><a href="teacher_message_teacher.php">For Student</a></li>
				</ul>
				<form id="send_message_form">
					<div class="control-group">
						<label for="teacher">To:</label>
						<div class="controls">
							<select id="teacher" class="chzn-select" required>
								<option></option>
								<!-- Options will be dynamically loaded with JavaScript -->
							</select>
						</div>
					</div>
					<div class="control-group">
						<label for="message">Content:</label>
						<div class="controls">
							<textarea id="message" class="my_message" required></textarea>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<button id="send_button" class="btn btn-info"><i class="fa fa-fw fa-envelope"></i> Send</button>
						</div>
					</div>
				</form>
			</div>
						
	
				
				</div>
		
	
	</div>
				
</div>

<script>
	document.addEventListener("DOMContentLoaded", function () {
// Sample inbox messages (replace with real data)
		const inboxMessages = [
			{
				id: 1,
				content: "Hello, I hope you are doing well. I'd like to request a meeting to discuss on parent meeting",
				sender_name: "Mathew",
				date_sended: "2023-10-30",
			},
			{
				id: 2,
				content: "I just wanted to express my gratitude for your hard work and dedication in teaching maths.",
				sender_name: "Aladin",
				date_sended: "2023-10-29",
			},
			{
				id: 3,
				content: "I wanted to inform you that I won't be able to attend class on 2023-08-23 due to fever.",
				sender_name: "Anuraj",
				date_sended: "2023-10-29",
			},
			// Add more messages here
		];

		const inboxList = document.getElementById("inbox-list");

		// Display inbox messages
		inboxMessages.forEach((message) => {
			const listItem = document.createElement("li");
			listItem.innerHTML = `
				<div class="message-content">${message.content}</div>
				<hr>
				Sent by: <strong>${message.sender_name}</strong>
				<i class="fa fa-fw fa-calendar"></i> ${message.date_sended}
				<div class="pull-right">
					<a class="btn btn-link reply" data-id="${message.id}" href="#"><i class="fa fa-fw fa-reply"></i> Reply</a>
				</div>
				<div class="pull-right">
					<a class="btn btn-link remove" data-id="${message.id}" href="#"><i class="icon-times"></i> Remove</a>
				</div>
			`;

			inboxList.appendChild(listItem);
		});

		// Handle message removal (this is a simplified example, you need server-side logic)
		const removeButtons = document.querySelectorAll(".remove");
		removeButtons.forEach((button) => {
			button.addEventListener("click", function (e) {
				const messageId = e.target.getAttribute("data-id");
				// You can send an AJAX request to remove the message.
				alert(`Message ID ${messageId} is removed.`);
			});
		});

		// Handle message reply (this is a simplified example, you need server-side logic)
		const replyButtons = document.querySelectorAll(".reply");
		replyButtons.forEach((button) => {
			button.addEventListener("click", function (e) {
				const messageId = e.target.getAttribute("data-id");
				// You can open a reply form or take other actions.
				alert(`Reply to Message ID ${messageId}`);
			});
		});
		});

</script>

<script>
	document.addEventListener("DOMContentLoaded", function () {
    // Sample teacher data (replace with real data)
    const teachers = [
        { id: 1, name: "Ruby" },
        { id: 2, name: "John doe" },
        // Add more teachers here
    ];

    // Load teachers into the select dropdown
    const teacherSelect = document.getElementById("teacher");
    teachers.forEach((teacher) => {
        const option = document.createElement("option");
        option.value = teacher.id;
        option.text = teacher.name;
        teacherSelect.appendChild(option);
    });

    // Handle form submission
    const sendMessageForm = document.getElementById("send_message_form");
    sendMessageForm.addEventListener("submit", function (e) {
        e.preventDefault();
        const selectedTeacherId = teacherSelect.value;
        const messageContent = document.getElementById("message").value;

        // You can use selectedTeacherId and messageContent to send the message (AJAX or other methods).
        // For this example, we'll show an alert.
        alert(`Message sent to Teacher ${selectedTeacherId}: ${messageContent}`);

        // Optionally, redirect to the main message page after a delay
        const delay = 2000;
        setTimeout(function () {
            window.location = 'teacher_message.php';
        }, delay);
    });

	const students = [
        { id: 1, name: "Ruby" },
        { id: 2, name: "John doe" },
        // Add more teachers here
    ];

    // Load teachers into the select dropdown
    const studentSelect = document.getElementById("student");
    students.forEach((student) => {
        const option = document.createElement("option");
        option.value = student.id;
        option.text = student.name;
        studentSelect.appendChild(option);
    });

    // Handle form submission
    const sendMessageForm1 = document.getElementById("send_message_form");
    sendMessageForm1.addEventListener("submit", function (e) {
        e.preventDefault();
        const selectedStudentId = studentSelect.value;
        const messageContent = document.getElementById("message").value;

        // You can use selectedTeacherId and messageContent to send the message (AJAX or other methods).
        // For this example, we'll show an alert.
        alert(`Message sent to Teacher ${selectedStudentId}: ${messageContent}`);

        // Optionally, redirect to the main message page after a delay
        const delay = 2000;
        setTimeout(function () {
            window.location = 'teacher_message.php';
        }, delay);
    });
});

</script>

	</body>
</html>




