<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>

<?php 
	$query= mysqli_query($link,"select * from student where student_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student</title>
    <link rel="icon" type="image/x-icon" href="Components/Logo/favicon.ico">
	<link rel="stylesheet" href="Student.css">
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
        <a href="Student_home.php" class="active"><i class="fa fa-fw fa-home"></i> Home</a>
        <a href="Student_dashboard.php"><i class="fa fa-fw fa-tachometer"></i> Dashboard</a>
        <a href="Student_Announcement.php"><i class="fa fa-fw fa-bullhorn"></i>Announcements</a>
        <a href="Student_Inbox.php"><i class="fa fa-fw fa-comment"></i> Inbox</a>
        <a href="createMeeting1.php"><i class="fa fa-fw fa-video-camera"></i> Study Room</a>
        <a href="Student_selfstudy.php"><i class="fa fa-fw fa-star"></i> Self Study</a>
        <!--<a href="#services"><i class="fa fa-fw fa-wrench"></i> Services</a>
        
        <a href="#contact"><i class="fa fa-fw fa-envelope"></i> Contact</a>-->
        
      </div>
      <div style="margin-left:25%;padding:1px 16px;">

    <h2 style="color: #191970;">Calendar</h2>
    <div id="google_translate_element"></div>

    <!-- Language buttons -->
   
    <button onclick="changeLanguage('ta')">Translate to tamil</button>
    <button onclick="changeLanguage('si')">Translate to sinhala</button>
      <div class="content">
    <button onclick="prevMonth()">&#9665;</button>
    <span id="month-year"></span>
    <button onclick="nextMonth()">&#9655;</button>
    <table>
        <thead>
            <tr>
                <th style="color: white;">Sun</th>
                <th style="color: white;">Mon</th>
                <th style="color: white;">Tue</th>
                <th style="color: white;">Wed</th>
                <th style="color: white;">Thu</th>
                <th style="color: white;">Fri</th>
                <th style="color: white;">Sat</th>
            </tr>
        </thead>
        <tbody id="calendar-body">
        </tbody>
    </table>
    <button onclick="addEvent()">Add Event</button>

    <script>
        const calendarBody = document.getElementById("calendar-body");
        let currentDate = new Date();
        let selectedDate = new Date();

        function generateCalendar() {
            const daysInMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0).getDate();
            const firstDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1).getDay();

            document.getElementById("month-year").textContent = `${currentDate.toLocaleString('default', { month: 'long' })} ${currentDate.getFullYear()}`;

            while (calendarBody.firstChild) {
                calendarBody.removeChild(calendarBody.firstChild);
            }

            let day = 1;
            for (let week = 0; week < 6; week++) {
                const row = document.createElement("tr");

                for (let i = 0; i < 7; i++) {
                    if ((week === 0 && i < firstDay) || day > daysInMonth) {
                        const emptyCell = document.createElement("td");
                        row.appendChild(emptyCell);
                    } else {
                        const cell = document.createElement("td");
                        cell.textContent = day;

                        if (
                    day === selectedDate.getDate() &&
                    currentDate.getMonth() === selectedDate.getMonth() &&
                    currentDate.getFullYear() === selectedDate.getFullYear()
                ) {
                    // Apply the CSS class to highlight the current date.
                    cell.classList.add("highlighted-date");
                }

                        cell.addEventListener("click", function() {
                            selectedDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), day);
                            const eventTitle = prompt("Enter event title:");
                            if (eventTitle) {
                                const eventDiv = document.createElement("div");
                                eventDiv.textContent = eventTitle;
                                cell.appendChild(eventDiv);
                            }
                        });
                        row.appendChild(cell);
                        day++;
                    }
                }

                calendarBody.appendChild(row);
                if (day > daysInMonth) {
                    break;
                }
            }
        }

        function prevMonth() {
            currentDate.setMonth(currentDate.getMonth() - 1);
            generateCalendar();
        }

        function nextMonth() {
            currentDate.setMonth(currentDate.getMonth() + 1);
            generateCalendar();
        }

        function addEvent() {
            if (selectedDate < new Date(currentDate.getFullYear(), currentDate.getMonth(), 1)) {
                alert("You can't add events to past dates.");
                return;
            }
            const eventTitle = prompt("Enter event title:");
            if (eventTitle) {
                const eventDiv = document.createElement("div");
                eventDiv.textContent = eventTitle;
                const day = selectedDate.getDate() + (new Date(currentDate.getFullYear(), currentDate.getMonth(), 1).getDay() - 1);
                calendarBody.children[Math.floor(day / 7)].children[day % 7].appendChild(eventDiv);
            }
        }

        generateCalendar();
    </script>

    </div>
    </div>
</body>
</html>
