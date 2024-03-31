<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";

    if(isset($_SESSION["searched"])){
        
        try {
            $conn = new PDO("mysql:host=$servername;dbname=rogdb", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "SELECT * FROM giochi WHERE nome LIKE '%".$_SESSION["searched"]."%'";
            $res = $conn->query($sql)->fetchAll();
            
            foreach ($res as $item) {
                echo '<div class="center gameListElement">
                    <div class="center">'.$item["nome"].'</div>
                    <div class="imageOnList">image </div>
                    <div class="descriptionOnList">'.$item["descrizione"].'</div>
                </div>';
            }            
        } catch(PDOException $e) {}
    }else{
        echo "error";
    }
?>