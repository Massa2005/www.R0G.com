<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/testing.css">
	<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
	<script src="scripts/testing.js"></script>
	<link rel="stylesheet" href="https://unpkg.com/splitting/dist/splitting.css" />
	<link rel="stylesheet" href="https://unpkg.com/splitting/dist/splitting-cells.css" />
	<script src="https://unpkg.com/splitting/dist/splitting.min.js"></script>
</head>

<?php 
session_start(); 
?>

<body>
<div class="loading-text" id="loading">Inizializzazione sistema... 

Per favore attendi.</div>

	<div id="container" class="draggable">
		<div id="Terminal">
			<div id="Terminal__Toolbar">
				<div class="Toolbar__buttons">
					<button class="Toolbar__button Toolbar__button--exit">&#10005;</button>
					<button class="Toolbar__button">&#9472;</button>
					<button class="Toolbar__button">&#9723;</button>
				</div>
				<p class="Toolbar__user">user@jtraining:~Terminal.exe</p>
			</div>
			<div class="Terminal__body">
				<div class="Terminal__text">Benvenuto su JTraining!</div>
				<div class="Terminal__Prompt">
					<span class="Prompt__user">user@jtraining:</span><span class="Prompt__location">~</span><span class="Prompt__dollar">$</span>
					<input spellcheck="false" type="text" id="Prompt__line" autocomplete="off"></input>
					<span class="Prompt__cursor"></span>
				</div>
				<div class="Terminal__Feedback">
					<span class="Prompt__error"></span>
					<span class="Prompt__success"></span>
				</div>
			</div>
		</div>
	</div>
  </div>

  <div id="ncontainer" class="draggable">
	<div class="Notebook">
		<div id="Notebook__Toolbar">
		<div class="Toolbar__buttons">
			<button class="Toolbar__button Toolbar__button--exit">&#10005;</button>
			<button class="Toolbar__button">&#9472;</button>
			<button class="Toolbar__button">&#9723;</button>
		</div>
		<p class="Toolbar__user">user@jtraining:~Notepad.exe</p>
		</div>
		<div class="Terminal__body">
		<div class="Terminal__text">Lista di comandi utili!</div>
		<div class="Notebook__Prompt">
			<div><span class="Prompt__comment">=========== ACCESSO ===========</span></div>
			<div><br></div>
			<div><span class="Prompt__user">user@jtraining:</span><span class="Prompt__location">~</span><span class="Prompt__dollar">$ login<span class="Prompt__comment">[user] [pass]</span></div>
			<div><span class="Prompt__comment">-- Effettua il login</span></div>
			<div><br></div>
			<div><span class="Prompt__user">user@jtraining:</span><span class="Prompt__location">~</span><span class="Prompt__dollar">$ register</span><span class="Prompt__comment">[user] [pass]</span></div>
			<div><span class="Prompt__comment">-- Effettua la registrazione</span></div>
			<div><br></div>
			<div><span class="Prompt__user">user@jtraining:</span><span class="Prompt__location">~</span><span class="Prompt__dollar">$ logout</span></div>
			<div><span class="Prompt__comment">-- Effettua il logout</span></div>
			<div><br></div>
			<div><span class="Prompt__comment">=========== PERSONALIZZAZIONE ===========</span></div>
			<div><br></div>
			<div><span class="Prompt__user">user@jtraining:</span><span class="Prompt__location">~</span><span class="Prompt__dollar">$ changepass</span><span class="Prompt__comment">[oldPass] [newPass]</span></div>
			<div><span class="Prompt__comment">-- Cambia la tua password</span></div>
			<div><br></div>
			<div><span class="Prompt__user">user@jtraining:</span><span class="Prompt__location">~</span><span class="Prompt__dollar">$ setpropic</span><span class="Prompt__comment">[link]</span></div>
			<div><span class="Prompt__comment">-- Imposta la tua foto profilo</span></div>
			<div><br></div>
			<div><span class="Prompt__user">user@jtraining:</span><span class="Prompt__location">~</span><span class="Prompt__dollar">$ setbanner</span><span class="Prompt__comment">[link]</span></div>
			<div><span class="Prompt__comment">-- Imposta il tuo banner</span></div>
			<div><br></div>
			<div><span class="Prompt__comment">=========== NAVIGAZIONE ===========</span></div>
			<div><br></div>
			<div><span class="Prompt__user">user@jtraining:</span><span class="Prompt__location">~</span><span class="Prompt__dollar">$ sandbox</span></div>
			<div><span class="Prompt__comment">-- Acceddi alla sandbox</span></div>
			<div><br></div>
			<div><span class="Prompt__user">user@jtraining:</span><span class="Prompt__location">~</span><span class="Prompt__dollar">$ taskcreator</span></div>
			<div><span class="Prompt__comment">-- Acceddi alla creazione dei task</span></div>
			<div><br></div>
			<div><span class="Prompt__user">user@jtraining:</span><span class="Prompt__location">~</span><span class="Prompt__dollar">$ homepage</span></div>
			<div><span class="Prompt__comment">-- Acceddi alla homepage</span></div>
		</div>
		</div>
	</div>
  </div>
  </div>
</div>

<div id="pcontainer" class="draggable">
	<div class="Profile">
		<div id="Profile__Toolbar">
		<div class="Toolbar__buttons">
			<button class="Toolbar__button Toolbar__button--exit">&#10005;</button>
			<button class="Toolbar__button">&#9472;</button>
			<button class="Toolbar__button">&#9723;</button>
		</div>
		<p class="Toolbar__user">user@jtraining:~ProfileHolder.exe</p>
		</div>
		<div class="Terminal__body">
		<div class="Profile__text">Non sei loggato.</div>
		<div class="profile-banner-container">
			<img id="banner-image" src="<?php if($_SESSION['bannerImage']!=null){echo $_SESSION['bannerImage'];}else{echo 'not logged';} ?>" alt="Banner">
			<img id="profile-picture" src="<?php if($_SESSION['profileImage']!=null){echo $_SESSION['profileImage'];}else{echo 'not logged';} ?>" alt="Profile">
			<p class="Profile__nick"><?php echo $_SESSION['nickname']; ?></p>
		</div>
		</div>
	</div>
  </div>
  </div>
</div>
</body>

</html>
