
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
            echo '<div class="center commento" style="background-color:gray;">
            <div class="com-sinistra" style="">
                <h1 class="center" style="width:100%; text-align:center;"> '.$item["titolo"].'</h1>
                <div class="center">'.$item["commento"].'</div>
            </div>
            <div class="com-destra" style="">
                <div >'.$item["mail_utente"].'</div>
                <h2 class="center">'.$item["valutazione"].'</h2>
            </div>
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