<form action="../pages/pre-register.php" id="form" method="POST">
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
        $sql = "INSERT INTO `utenti`(`e_mail`, `nome`, `cognome`, `data_nascita`,  `password`) VALUES ('".$_POST["mail"]."','".$_POST["name"]."','".$_POST["surname"]."','".$_POST["date"]."','".$_POST["password"]."')";
        $res = $conn->query($sql);
        $_SESSION["name"]=$_POST["name"];
        $_SESSION["mail"]=$_POST["mail"];
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