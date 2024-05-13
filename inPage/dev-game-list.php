



<style>
    body{
        background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(118,86,200,1) 0%, rgba(0,194,255,1) 100%);
    }
</style>


<div style="font-size:40px; position: absolute;top:-100px ; color:white;" class="center rightFont">
    Lista dei giochi
</div>


<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=rogdb", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        if(isset($_SESSION["searched"])){
            $sql = "SELECT * FROM giochi WHERE mail_editore='".$_SESSION["mail"]."' AND nome LIKE '%".$_SESSION["searched"]."%'";
        }else{
            $sql = "SELECT * FROM giochi WHERE mail_editore='".$_SESSION["mail"]."'";
        }
        
        $res = $conn->query($sql)->fetchAll();
        

        //riordina in ordine di ricerca l array res
        for ($i = count($res)-1; $i>=0;$i--) {
            $item = $res[$i];
            /*devo mettere una scritta 'Lista dei giochi' sopra al div della lista dei giochi */
            echo '<form action="dev-game_page.php" method="post">
            
            <input type="hidden" name="id" value="'.$item["id"].'">
            <button id="ciao" class="center">
            <div class="gameListElement colorOfInpageElement">
            <div class="center nameofthegameongamelist rightFont">'.$item["nome"].'</div>
            ';

            if($item["main_img"] != "x" && $item["main_img"] != ""){
                echo'<img style=\'object-fit: cover;\' src="../sources/'.$item["main_img"].'" class="imageOnList">';
            }else{
                echo'<img style=\'object-fit: cover;\' src="../sources/image_not_available.jpg" class="imageOnList">';
            }

            echo '
            <div class="descriptionOnList rightFont">'.$item["descrizione"].'</div>
            </div></button>
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
<button onclick="goToAdd()" id="addGameButt">
    ADD GAME
</button>