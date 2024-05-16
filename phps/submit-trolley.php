<form action="../pages/personal_area.php" id="form" method="POST">
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";


try {
    $conn = new PDO("mysql:host=$servername;dbname=rogdb", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

    foreach( explode(";", $_SESSION["trolley"]) as &$game){
        if($game != ""){
            
            $sql = "SELECT * FROM `keys` WHERE game_id=$game;";
            $res = $conn->query($sql)->fetchAll();
            $key = $res[0]["key"];
            
            
            $sql = "DELETE FROM `keys` WHERE `key`='".$key."'";

            $res = $conn->query($sql);
            
            $sql = "INSERT INTO `libreria`(`mail_utente`, `game_id`, `a_key`) VALUES ('".$_SESSION["mail"]."','$game','$key')";
            $res = $conn->query($sql);
        }

    }
    
    $_SESSION["trolley"] = "";
} catch(PDOException $e) {echo "errore";}

?>

</form>

<script>
    //document.getElementById("form").submit();
</script>