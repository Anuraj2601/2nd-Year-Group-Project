
<html>

		<head>
    
			<title>Teacher</title>
			<link rel="icon" type="image/x-icon" href="Components/Logo/favicon.ico">
			<link rel="stylesheet" href="Teacher.css">
				
		</head>
	<body>

		
			
			 
			 
  <script>
  var script = document.createElement("script");
  script.type = "text/javascript";

  script.addEventListener("load", function (event) {
  
	const url = new URLSearchParams(window.location.search);
  
    const config = {
      name: "Demo User",
      meetingId: url.get("meetingId"),
      apiKey: "76a90951-4cba-4092-94fa-1fe34d95b138",

      containerId: null,

      micEnabled: true,
      webcamEnabled: true,
      participantCanToggleSelfWebcam: true,
      participantCanToggleSelfMic: true,

      chatEnabled: true,
      screenShareEnabled: true,

      /*

     Other Feature Properties
      
      */
    };

    const meeting = new VideoSDKMeeting();
    meeting.init(config);
  });

  script.src =
    "https://sdk.videosdk.live/rtc-js-prebuilt/0.3.31/rtc-js-prebuilt.js";
  document.getElementsByTagName("head")[0].appendChild(script);
</script>

		</div>
	</body>
	
</html>

<?php
?>