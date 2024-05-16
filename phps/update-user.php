<form action="../pages/personal_area.php" id="form" method="POST">
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=rogdb", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT e_mail FROM utenti WHERE e_mail='".$_POST["mail"]."'";
    $res = $conn->query($sql) ->fetchAll();
    
    if(count($res)==0){
        $sql = "UPDATE `utenti` SET  `nome`='".$_POST["name"]."', `cognome`='".$_POST["surname"]."', `data_nascita`='".$_POST["date"]."',  `password`='".$_POST["password"]."' WHERE e_mail='".$_SESSION["mail"]."'";
        $res = $conn->query($sql);
        $_SESSION["name"]=$_POST["name"];
        echo '<input type="hidden" name="result" value="ok">';
    }else{
        echo '<input type="hidden" name="result" value="no">';
    }

    
} catch(PDOException $e) {}

?>

</form>

<script>
    document.getElementById("form").submit();
</script>