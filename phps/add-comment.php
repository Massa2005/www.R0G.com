

<form action="../pages/dev-game_page.php" id="form" method="POST">
<?php
ini_set('display_errors','On');
error_reporting(E_ALL);
session_start();
$servername = "localhost";
$username = "root";
$password = "";


echo '<input type="hidden" name="id" value="'.$_POST["game_id"].'">';

try {
    $conn = new PDO("mysql:host=$servername;dbname=rogdb", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $query = "INSERT INTO commenti SET game_id=:game_id, mail_utente=:mail_utente, titolo=:titolo, commento=:commento, valutazione=:valutazione"; 
    $stmt = $conn->prepare($query);  
    
	$game_id = htmlspecialchars(strip_tags($_POST["game_id"]));
    $stmt->bindParam(":game_id",   $game_id);	
	$mail = htmlspecialchars(strip_tags($_SESSION["mail"]));
    $stmt->bindParam(":mail_utente",   $mail);	
	$titolo = htmlspecialchars(strip_tags($_POST["titolo"]));
    $stmt->bindParam(":titolo",   $titolo);	
	$commento = htmlspecialchars(strip_tags($_POST["commento"]));
    $stmt->bindParam(":commento",   $commento);	
	$valutazione = htmlspecialchars(strip_tags($_POST["valutazione"]));
    $stmt->bindParam(":valutazione",   $valutazione);	
    
    
    if($stmt->execute()){
        echo "si";
        echo '<input type="hidden" name="result" value="ok-added">';
    }else{
        echo "no";
        echo '<input type="hidden" name="result" value="no-boh">';
    }

} catch(PDOException $e) {
    echo "errore";
}

?>

</form>

<script>
    document.getElementById("form").submit();
</script>