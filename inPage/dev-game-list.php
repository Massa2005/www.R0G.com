
<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=rogdb", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "SELECT * FROM giochi WHERE mail_editore='".$_SESSION["mail"]."'";
        $res = $conn->query($sql)->fetchAll();
        
        foreach ($res as $item) {
            echo '<form action="dev-game_page.php" method="post">
            <input type="hidden" name="id" value="'.$item["id"].'">
            <div class="center gameListElement">
            <div class="center">'.$item["nome"].'</div>
            <button id="ciao"><img src="../sources/bobr curva.jpg" class="imageOnList"></button>
            <div class="descriptionOnList">'.$item["descrizione"].'</div>
            </div>
        </form>';
        }
    
        
    } catch(PDOException $e) {}






?>
        
        
<!--
<div class="center gameListElement">
    <div class="center">Nome</div>
    <div class="imageOnList">image</div>
    <div class="descriptionOnList" >description</div>
</div>
-->
<button onclick="goToAdd()">
    add game
</button>