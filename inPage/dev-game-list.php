
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
            /*devo mettere una scritta 'Lista dei giochi' sopra al div della lista dei giochi */
            echo '<form action="dev-game_page.php" method="post">
            
            <input type="hidden" name="id" value="'.$item["id"].'">
            
            <div class="center gameListElement">
            <div class="center nameofthegameongamelist">'.$item["nome"].'</div>
            <button id="ciao">';

            if($item["main_img"] != "x" && $item["main_img"] != ""){
                echo'<img src="../sources/'.$item["main_img"].'" class="imageOnList">';
            }else{
                echo'<img src="../sources/image_not_available.jpg" class="imageOnList">';
            }

            echo '</button>
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