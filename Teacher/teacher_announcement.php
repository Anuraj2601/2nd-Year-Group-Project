<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>

<?php 
	$query= mysqli_query($link,"select * from teacher where teacher_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Teacher</title>
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
			<a href="teacher_announcement.php"  class="active"><i class="fa fa-fw fa-exclamation-circle"></i>Notification</a>
			<a href="teacher_Inbox.php"><i class="fa fa-fw fa-envelope"></i> Message</a>
			<a href="add_downloadable.php"><i class="fa fa-fw fa-plus-circle"></i> Add Downloadable</a>
			<a href="add_announcement.php"><i class="fa fa-fw fa-plus-circle"></i> Add Announcement</a>
			<a href="add_assignment.php"><i class="fa fa-fw fa-plus-circle"></i> Add Assignment</a>
			<a href="add_quiz.php"><i class="fa fa-fw fa-list"></i> Quiz</a>
			<a href="shared_file.php"><i class="fa fa-fw fa-file-o"></i> Shared Files</a>
        <!--<a href="#services"><i class="fa fa-fw fa-wrench"></i> Services</a>
        
        <a href="#contact"><i class="fa fa-fw fa-envelope"></i> Contact</a>-->
        
      </div>
      <div style="margin-left:25%;padding:10px 16px;">
        <h2>Announcements</h2>

        <div id="google_translate_element"></div>

  <!-- Language buttons -->
 
  <button onclick="changeLanguage('ta')">Translate to tamil</button>
  <button onclick="changeLanguage('si')">Translate to sinhala</button>
    <div class="content">
        
        <div class="announcement">
            <h2>Important Update</h2>
            <p>We have made changes to the online classes schedule for the upcoming week. Please check the updated timetable in the "Class Schedule" section to ensure you don't miss any sessions</p>
        </div>
        <div class="announcement">
            <h2>Upcoming Event</h2>
            <p>Join us for a special webinar on Thursday, November 10th, at 3:00 PM. We will be discussing career opportunities in the technology industry and sharing valuable insights. Don't miss this informative session!.</p>
        </div>
        <div class="announcement">
            <h2>New Course Material</h2>
            <p>We are pleased to announce that new course materials, including lecture notes and reference resources, are now available in the "Resources" section. Make sure to review them to stay ahead in your studies.</p>
        </div>
        <div class="nav-links">
            <a href="javascript:void(0);" onclick="showPreviousAnnouncement()">Previous</a> 
            <a href="javascript:void(0);" onclick="showNextAnnouncement()">Next</a>
        </div>
    </div>
    


    </div>
    


    <script>
        // Sample announcements data (you can load this data dynamically)
        const announcements = [
            { title: "Reminder", content: "A friendly reminder that the deadline for submitting your assignments is approaching. Please ensure your submissions are made on time to avoid any late penalties." },
            { title: "Upcoming Event", content: "Access to digital library resources has been expanded. Explore a wide range of e-books and research materials through the 'Library' section of your VLE.." },
            { title: "New Course Material", content: "We have added new course materials for your upcoming assignments." }
        ];

        let currentAnnouncementIndex = 0;

        function showPreviousAnnouncement() {
            if (currentAnnouncementIndex > 0) {
                currentAnnouncementIndex--;
                updateAnnouncement(currentAnnouncementIndex);
            }
        }

        function showNextAnnouncement() {
            if (currentAnnouncementIndex < announcements.length - 1) {
                currentAnnouncementIndex++;
                updateAnnouncement(currentAnnouncementIndex);
            }
        }

        function updateAnnouncement(index) {
            if (index >= 0 && index < announcements.length) {
                const announcement = announcements[index];
                const announcementDiv = document.querySelector('.announcement');
                announcementDiv.querySelector('h2').textContent = announcement.title;
                announcementDiv.querySelector('p').textContent = announcement.content;
            }
        }

        updateAnnouncement(currentAnnouncementIndex);
    </script>
</body>
</html>
