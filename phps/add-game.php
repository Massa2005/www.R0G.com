<form action="../pages/dev-personal-area.php" id="form" method="POST">
<?php
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
    $sql = "SELECT max(id) FROM giochi";
    $res = $conn->query($sql) ->fetchAll();
    $id = $res[0]["max(id)"]+1;
    
    $sql = "INSERT INTO `giochi`(`id`, `nome`, `descrizione`, `prezzo`, `mail_editore`, `data_pubblicazione`) VALUES (".$id.",'".$_POST["name"]."','".$_POST["description"]."','".$_POST["cost"]."','".$_SESSION["mail"]."','".$_POST["date"]."')";
    $res = $conn->query($sql);
    $_SESSION["name"]=$_POST["name"];
    $_SESSION["mail"]=$_POST["mail"];
    echo '<input type="hidden" name="result" value="ok-added">';

    
} catch(PDOException $e) {}

?>

</form>

<script>
    document.getElementById("form").submit();
</script>