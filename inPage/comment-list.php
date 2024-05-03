<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=rogdb", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        
        $sql = "SELECT * FROM commenti WHERE game_id='".$_SESSION["game_id"]."'";
        
        
        $res = $conn->query($sql)->fetchAll();
        

        //riordina in ordine di ricerca l array res
        for ($i = count($res)-1; $i>=0;$i--) {
            $item = $res[$i];
            /*devo mettere una scritta 'Lista dei giochi' sopra al div della lista dei giochi */
            echo '
            
            <input type="hidden" name="id" value="'.$item["id"].'">
            
            <div >
            <div class="center">'.$item["titolo"].'</div>
            ';
            echo '
            <div >'.$item["valutazione"].'</div>
            </div>';
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