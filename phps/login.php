<form action="../pages/pre-login.php" id="form" method="POST">
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=rogdb", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT e_mail,name,password, FROM utenti WHERE e_mail='".$_POST["mail"]."'";
    $res = $conn->query($sql) ->fetchAll();
    
    if(count($res)>0){
        if($_POST["password"] == $res[0]["password"]){

            $_SESSION["name"]=$res[0]["name"];
            $_SESSION["mail"]=$res[0]["e_mail"];
            echo '<input type="hidden" name="result" value="ok">';
        }else{
            echo '<input type="hidden" name="result" value="no1">';
        }
    }else{
        echo '<input type="hidden" name="result" value="no2">';
    }

    
} catch(PDOException $e) {}

?>

</form>

<script>
    document.getElementById("form").submit();
</script>