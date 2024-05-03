<link rel="stylesheet" href="../css/navbar.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="../scripts/navbar.js"></script>
<div class="navbar">
	<div class="Terminal__Toolbar">
		<div class="Toolbar__buttons">
			<button class="Toolbar__button Toolbar__button--exit">&#10005;</button>
			<button class="Toolbar__button">&#9472;</button>
			<button class="Toolbar__button">&#9723;</button>
		</div>
	    <p class="Toolbar__user">@jtraining:~Navbar.exe</p>
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