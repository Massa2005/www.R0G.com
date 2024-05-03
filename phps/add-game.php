<form action="../pages/dev-add-game.php" id="form" method="POST">
<?php
ini_set('display_errors','On');
error_reporting(E_ALL);
session_start();
$servername = "localhost";
$username = "root";
$password = "";

echo '<input type="hidden" name="name" value="'.$_POST["name"].'">';
echo '<input type="hidden" name="description" value="'.$_POST["description"].'">';
echo '<input type="hidden" name="cost" value="'.$_POST["cost"].'">';
echo '<input type="hidden" name="date" value="'.$_POST["date"].'">';



try {
    $conn = new PDO("mysql:host=$servername;dbname=rogdb", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM giochi WHERE nome='".$_POST["name"]."' AND mail_editore='".$_SESSION["mail"]."' ";
    $res = $conn->query($sql) ->fetchAll();
    if(count($res)==0){
        $query = "INSERT INTO giochi SET  nome=:nome, descrizione=:descrizione, prezzo=:prezzo, mail_editore=:mail_editore, main_img=:main_img, data_pubblicazione=:data_pubblicazione"; 
    	$stmt = $conn->prepare($query);  
    	
		$nome = htmlspecialchars(strip_tags($_POST["name"]));
		$descrizione = htmlspecialchars(strip_tags($_POST["description"]));
		$prezzo = htmlspecialchars(strip_tags($_POST["cost"]));
		$mail_editore = htmlspecialchars(strip_tags($_SESSION["mail"]));
		$main_img = htmlspecialchars(strip_tags($_POST["img"]));
		$data_pubblicazione = htmlspecialchars(strip_tags($_POST["date"]));
			
    	$stmt->bindParam(":nome",   $nome);	
    	$stmt->bindParam(":descrizione",   $descrizione);	
    	$stmt->bindParam(":prezzo",   $prezzo);	
    	$stmt->bindParam(":mail_editore",   $mail_editore);	
    	$stmt->bindParam(":main_img",   $main_img);	
    	$stmt->bindParam(":data_pubblicazione",   $data_pubblicazione);	
        
        if($stmt->execute()){
            echo '<input type="hidden" name="result" value="ok-added">';
        }else{
            echo '<input type="hidden" name="result" value="no-boh">';
        }
        
    }else{
        echo "non aggiunto";
        echo '<input type="hidden" name="result" value="no-name">';
    }

} catch(PDOException $e) {}

?>

</form>

<script>
    document.getElementById("form").submit();
</script>