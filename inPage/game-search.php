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
                echo '<form action="pages/dev-game_page.php" method="post">
            <input type="hidden" name="id" value="'.$item["id"].'">
            
            <div class="center gameListElement colorOfInpageElement">
            <div class="center nameofthegameongamelist rightFont">'.$item["nome"].'</div>
            <button id="ciao">';

            if($item["main_img"] != "x" && $item["main_img"] != ""){
                echo'<img style=\'object-fit: cover;\' src="sources/'.$item["main_img"].'" class="imageOnList">';
            }else{
                echo'<img style=\'object-fit: cover;\' src="sources/image_not_available.jpg" class="imageOnList">';
            }

            echo '</button>
            <div class="descriptionOnList">'.$item["descrizione"].'</div>
            </div>
        </form>';
            }            
        } catch(PDOException $e) {}
    }else{
        echo "error";
    }
?>