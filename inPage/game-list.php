<style>
    body{
        background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(118,86,200,1) 0%, rgba(0,194,255,1) 100%);
    }
</style>


<div style="font-size:40px; position: absolute;top:-100px ; color:white;" class="center rightFont">
    Lista dei giochi acquistati
</div>


<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=rogdb", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        
        $sql = "SELECT * FROM libreria WHERE mail_utente='".$_SESSION["mail"]."'";
        
        
        $resa = $conn->query($sql)->fetchAll();
        

        //riordina in ordine di ricerca l array res
        for ($i = 0; $i<count($resa);$i++) {

            $item = $resa[$i];

            $sql = "SELECT * FROM giochi WHERE id='".$item["game_id"]."'";
            $res = $conn->query($sql)->fetchAll();

            
            echo '<form action="dev-game_page.php" method="post">
            
            <input type="hidden" name="id" value="'.$res[0]["id"].'">
            <button id="ciao" class="center">
            <div class="gameListElement colorOfInpageElement">
            <div class="center nameofthegameongamelist rightFont">'.$res[0]["nome"].'</div>
            ';

            if($res[0]["main_img"] != "x" && $res[0]["main_img"] != ""){
                echo'<img style=\'object-fit: cover;\' src="../sources/'.$res[0]["main_img"].'" class="imageOnList">';
            }else{
                echo'<img style=\'object-fit: cover;\' src="../sources/image_not_available.jpg" class="imageOnList">';
            }

            echo '
            <div class="descriptionOnList rightFont">'.$item["a_key"].'<br>'.$item["data_acquisto"].' </div>
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