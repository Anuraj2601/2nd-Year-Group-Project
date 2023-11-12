<?php include '../database/db_con.php'; ?>
<?php include '../session.php'; ?>

<?php 
	$query= mysqli_query($link,"select * from student where student_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Student</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="stylesheet" href="Student.css">
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
        <a href="Student_home.php"><i class="fa fa-fw fa-home"></i> Home</a>
        <a href="Student_dashboard.php"><i class="fa fa-fw fa-tachometer"></i> Dashboard</a>
        <a href="Student_Announcement.php"><i class="fa fa-fw fa-bullhorn"></i>Announcements</a>
        <a href="Student_Inbox.php"><i class="fa fa-fw fa-comment"></i> Inbox</a>
        <a href="createMeeting1.php"><i class="fa fa-fw fa-video-camera"></i> Study Room</a>
        <a href="Student_selfstudy.php" class="active"><i class="fa fa-fw fa-star"></i> Self Study</a>
        <!--<a href="#services"><i class="fa fa-fw fa-wrench"></i> Services</a>
        
        <a href="#contact"><i class="fa fa-fw fa-envelope"></i> Contact</a>-->
        
      </div>

		<div style="margin-left:25%;padding:10px 16px;">
            <br><br>
            <div id="google_translate_element"></div>

  <!-- Language buttons -->
 
  <button onclick="changeLanguage('ta')">Translate to tamil</button>
  <button onclick="changeLanguage('si')">Translate to sinhala</button>
    <div class="content">
				<a href = "Student_selfstudy.php">Back</a>
<br>
    <h2>Flashcard</h2>
    
    <!-- Deck and card management -->
    <div>
        <h2>Create Deck</h2>
        <input type="text" id="deckName" placeholder="Deck Name">
        <button onclick="createDeck()">Create Deck</button>
    </div>

    <div>
        <h2>Create Card</h2>
        <input type="text" id="frontContent" placeholder="Front Content">
        <input type="text" id="backContent" placeholder="Back Content">
        <select id="deckSelect"></select>
		<button onclick="createCard(); displayCardsByDeck();">Create Card</button>

    </div>

    <div>
        <h2>Edit Card</h2>
        <input type="text" id="editFrontContent" placeholder="Front Content">
        <input type="text" id="editBackContent" placeholder="Back Content">
        <select id="editDeckSelect"></select>
        <select id="editCardSelect"></select>
        <button onclick="editCard()">Edit Card</button>
    </div>

    <div>
        <h2>Decks</h2>
        <ol id="deckList"></ol>
    </div>

    <div>
        <h2>Cards</h2>
        <div id="cardList"></div>
    </div>
	
	</div>

    <script>
        // Data structure for decks and cards
        const data = {
            decks: [],
        };

        // Function to create a new deck
        function createDeck() {
            const deckName = document.getElementById('deckName').value;
            if (deckName) {
                data.decks.push({ name: deckName, cards: [] });
                displayDecks();
                document.getElementById('deckName').value = '';
                populateDeckSelect();
            }
        }
		
		function ajax(action, data, successCallback) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'flashcard.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    successCallback(xhr.responseText);
                }
            };
            xhr.send(`action=${action}&${data}`);
        }

        // Function to create a new card
        function createCard() {
            const frontContent = document.getElementById('frontContent').value;
            const backContent = document.getElementById('backContent').value;
            const selectedDeckIndex = document.getElementById('deckSelect').value;
            
            if (frontContent && backContent && selectedDeckIndex !== "") {
                data.decks[selectedDeckIndex].cards.push({ front: frontContent, back: backContent });
                displayCards(selectedDeckIndex);
                document.getElementById('frontContent').value = '';
                document.getElementById('backContent').value = '';
            }
        }

        // Function to edit a card
        function editCard() {
            const editFrontContent = document.getElementById('editFrontContent').value;
            const editBackContent = document.getElementById('editBackContent').value;
            const selectedEditDeckIndex = document.getElementById('editDeckSelect').value;
            const selectedEditCardIndex = document.getElementById('editCardSelect').value;

            if (editFrontContent && editBackContent && selectedEditDeckIndex !== "" && selectedEditCardIndex !== "") {
                data.decks[selectedEditDeckIndex].cards[selectedEditCardIndex].front = editFrontContent;
                data.decks[selectedEditDeckIndex].cards[selectedEditCardIndex].back = editBackContent;
                displayCards(selectedEditDeckIndex);
                document.getElementById('editFrontContent').value = '';
                document.getElementById('editBackContent').value = '';
            }
        }

        // Function to delete a deck
        function deleteDeck(deckIndex) {
            data.decks.splice(deckIndex, 1);
            displayDecks();
            populateDeckSelect();
            displayCards();
        }

        // Function to delete a card
        function deleteCard(deckIndex, cardIndex) {
            data.decks[deckIndex].cards.splice(cardIndex, 1);
            displayCards(deckIndex);
        }

        // Helper function to populate the deck dropdown
        function populateDeckSelect() {
            const deckSelect = document.getElementById('deckSelect');
            deckSelect.innerHTML = '<option value="">Select a Deck</option>';
            data.decks.forEach((deck, index) => {
                const option = document.createElement('option');
                option.value = index;
                option.text = deck.name;
                deckSelect.appendChild(option);
            });

            const editDeckSelect = document.getElementById('editDeckSelect');
            editDeckSelect.innerHTML = '<option value="">Select a Deck</option>';
            data.decks.forEach((deck, index) => {
                const option = document.createElement('option');
                option.value = index;
                option.text = deck.name;
                editDeckSelect.appendChild(option);
            });
        }

        // Helper function to populate the card dropdown for editing
        function populateCardSelect(deckIndex) {
            const editCardSelect = document.getElementById('editCardSelect');
            editCardSelect.innerHTML = '<option value="">Select a Card</option>';
            data.decks[deckIndex].cards.forEach((card, index) => {
                const option = document.createElement('option');
                option.value = index;
                option.text = `${card.front} - ${card.back}`;
                editCardSelect.appendChild(option);
            });
        }

        // Function to display decks
        // Function to display a deck's cards when the "View Cards" button is clicked
		function viewDeckCards(deckIndex) {
			displayCards(deckIndex);
			document.getElementById('deckSelect').value = deckIndex;
		}

		// Modify the displayDecks function to include a "View Cards" button
		// Modify the displayDecks function to include a "Share" button
		function displayDecks() {
			const deckList = document.getElementById('deckList');
			deckList.innerHTML = '';
			data.decks.forEach((deck, deckIndex) => {
				const li = document.createElement('li');
				li.textContent = deck.name;

				const viewCardsButton = document.createElement('button');
				viewCardsButton.textContent = 'View Cards';
				viewCardsButton.onclick = () => viewDeckCards(deckIndex);

				const shareButton = document.createElement('button');
				shareButton.textContent = 'Share';
				shareButton.onclick = () => {
					const shareableURL = generateShareableURL(deckIndex);
					alert(`Share this URL: ${shareableURL}`);
				};

				const deleteButton = document.createElement('button');
				deleteButton.textContent = 'Delete';
				deleteButton.onclick = () => deleteDeck(deckIndex);

				li.appendChild(viewCardsButton);
				li.appendChild(shareButton);
				li.appendChild(deleteButton);
				deckList.appendChild(li);
			});
			populateDeckSelect();
		}



        // Function to display cards
        function displayCards(deckIndex) {
            const cardList = document.getElementById('cardList');
            cardList.innerHTML = '';
            data.decks[deckIndex].cards.forEach((card, cardIndex) => {
                const cardContainer = document.createElement('div');
                cardContainer.className = 'card-container';

                const cardElement = document.createElement('div');
                cardElement.className = 'card';
                cardElement.onclick = () => flipCard(cardIndex);

                const front = document.createElement('div');
                front.className = 'card-face';
                front.textContent = card.front;

                const back = document.createElement('div');
                back.className = 'card-face card-back';
                back.textContent = card.back;

                cardElement.appendChild(front);
                cardElement.appendChild(back);
                cardContainer.appendChild(cardElement);

                const deleteButton = document.createElement('button');
                deleteButton.textContent = 'Delete';
                deleteButton.onclick = () => deleteCard(deckIndex, cardIndex);

                cardContainer.appendChild(deleteButton);
                cardList.appendChild(cardContainer);
            });

            // Populate the card selection dropdown for editing
            populateCardSelect(deckIndex);
        }

        // Function to flip a card
        function flipCard(cardIndex) {
            const card = document.querySelectorAll('.card')[cardIndex];
            card.classList.toggle('flipped');
        }
		
		// Function to display cards based on the selected deck
		function displayCardsByDeck() {
			const selectedDeckIndex = document.getElementById('deckSelect').value;
			if (selectedDeckIndex !== "") {
				displayCards(selectedDeckIndex);
			}
		}
		
		// Function to generate a shareable URL for a specific deck
		function generateShareableURL(deckIndex) {
			const baseUrl = window.location.href.split('?')[0];
			const params = new URLSearchParams();
			params.append('deck', deckIndex);
			return `${baseUrl}?${params.toString()}`;
		}

		
		


        // Initial display
        displayDecks();
        populateDeckSelect();
    </script>
</body>
</html>
