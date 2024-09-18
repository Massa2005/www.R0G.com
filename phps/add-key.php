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

    $sql = "SELECT * FROM `keys` WHERE `key`='".$_POST["key"]."'";
    $res = $conn->query($sql) ->fetchAll();
    if(count($res)==0){
        $query = "INSERT INTO `keys` SET  game_id=:game_id, `key`=:key"; 
    	$stmt = $conn->prepare($query);
    	
		$key = htmlspecialchars(strip_tags($_POST["key"]));
		$game_id = htmlspecialchars(strip_tags($_POST["game_id"]));
			
    	$stmt->bindParam(":key",   $key);
    	$stmt->bindParam(":game_id",   $game_id);
        
        if($stmt->execute()){
            echo '<input type="hidden" name="result" value="ok-added">';
        }else{
            echo '<input type="hidden" name="result" value="no-boh">';
        }
        
    }else{
        echo "non aggiunto";
        echo '<input type="hidden" name="result" value="no">';
    }

} catch(PDOException $e) {}

?>

</form>

<script>
    document.getElementById("form").submit();
</script>