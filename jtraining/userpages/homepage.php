<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/homepageStyle.css">
	<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
	<script src="../scripts/homepage.js"></script>
	<link rel="stylesheet" href="https://unpkg.com/splitting/dist/splitting.css" />
	<link rel="stylesheet" href="https://unpkg.com/splitting/dist/splitting-cells.css" />
	<script src="https://unpkg.com/splitting/dist/splitting.min.js"></script>
</head>

<?php include '../include/navbar.php' ?>

<body>
  <div id="ncontainer">
	<div class="Notebook">
		<div id="rNotebook__Toolbar">
		<div class="Toolbar__buttons">
			<button class="Toolbar__button Toolbar__button--exit">&#10005;</button>
			<button class="Toolbar__button">&#9472;</button>
			<button class="Toolbar__button">&#9723;</button>
		</div>
		<p class="Toolbar__user">user@jtraining:~Notepad.exe</p>
		</div>
		<div class="Terminal__body">
		<div class="Notebook__text">Lista dei task rankati! <img class="status-img" src="../images/star-modified.png"></div>
		<div class="Notebook__Prompt">
			<div><span class="Prompt__comment">=========== ACCESSO ===========</span></div>
			<div><br></div>
			<div><span class="Prompt__user">user@jtraining:</span><span class="Prompt__location">~</span><span class="Prompt__dollar">$ login<span class="Prompt__comment">[user] [pass]</span></div>
			<div><span class="Prompt__comment">-- Effettua il login</span></div>
		</div>
		</div>
	</div>
  </div>
  </div>
</div>

<div id="scontainer">
	<div class="Notebook">
		<div id="sNotebook__Toolbar">
			<div class="Toolbar__buttons">
				<button class="Toolbar__button Toolbar__button--exit">&#10005;</button>
				<button class="Toolbar__button">&#9472;</button>
				<button class="Toolbar__button">&#9723;</button>
			</div>
			<p class="Toolbar__user">user@jtraining:~Notepad.exe</p>
			</div>
			<div class="Terminal__body">
			<div class="Notebook__text">Lista dei task submittati! <img class="status-img" src="../images/mail-modified.png"></div>
			<div class="Submitted_tasks"></div>
		</div>
	</div>
  </div>
  </div>
</div>

<div id="lcontainer">
	<div class="Leaderboard">
		<div id="lNotebook__Toolbar">
			<div class="Toolbar__buttons">
				<button class="Toolbar__button Toolbar__button--exit">&#10005;</button>
				<button class="Toolbar__button">&#9472;</button>
				<button class="Toolbar__button">&#9723;</button>
			</div>
			<p class="Toolbar__user">user@jtraining:~Notepad.exe</p>
			</div>
			<div class="Terminal__body">
			<div class="Notebook__text">Utenti con più punti <img class="status-img" src="../images/mail-modified.png"></div>
			<div id="leaderboard"></div>
		</div>
	</div>
  </div>
  </div>
</div>

<div id="pcontainer">
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
