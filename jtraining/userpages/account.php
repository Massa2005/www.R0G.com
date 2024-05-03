<?php
require_once('../include/DBHandler.php');

$userId = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$_SESSION['id'] = $_GET['id'];
if ($userId <= 0) {
    echo "ID utente non valido.";
    exit;
}

$query = "SELECT picture, banner, effect, prefix, nickname FROM coder WHERE coderid = :userId";
$sth = DBHandler::getPDO()->prepare($query);
$sth->bindParam(':userId', $userId, PDO::PARAM_INT);
$sth->execute();
$user = $sth->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo "Utente non trovato.";
    exit; 
}

// Qui puoi continuare a generare la tua pagina HTML con i dati dell'utente
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <link rel="stylesheet" href="../css/account.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
	<script src="../scripts/account.js"></script>
	<link rel="stylesheet" href="https://unpkg.com/splitting/dist/splitting.css" />
	<link rel="stylesheet" href="https://unpkg.com/splitting/dist/splitting-cells.css" />
	<script src="https://unpkg.com/splitting/dist/splitting.min.js"></script>
</head>
<?php include '../include/navbar.php' ?>
<body>
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
        <div class="profile-info-container">
            <img id="profile-picture" src="<?php echo $user['picture']; ?>" alt="Profile Picture">
            <span class="Profile__nick <?php if($user['effect'] == "rainbow-1" || $user['effect'] == "rainbow-2"){ echo 'rainbow-text animated'; } ?>" <?php if($user['effect'] == "rainbow-1"){ echo 'data-splitting'; } ?>>
                <?php echo $user['nickname']; ?>
            </span>
        </div>
        <div class="globe-container">
            <img id="globe" src="../images/globe-modified.png" alt="Globe">
            <p id="global-rank"></p>
        </div>
        <img id="banner-image" src="<?php echo $user['banner']; ?>">
        </div>
	</div>
	</div>
  </div>
  </div>


</body>
</html>