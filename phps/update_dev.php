<form action="../pages/dev-personal_area.php" id="form" method="POST">
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=rogdb", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT e_mail FROM `editori` WHERE e_mail='".$_POST["mail"]."'";
    $res = $conn->query($sql) ->fetchAll();
    
    if(count($res)==0){
        $sql = "UPDATE `editori` SET `nome`='".$_POST["name"]."',  `password`='".$_POST["password"]."', `sede`='".$_POST["sede"]."' WHERE e_mail='".$_SESSION["mail"]."'";
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