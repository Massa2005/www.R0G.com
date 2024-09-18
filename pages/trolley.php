<link rel="stylesheet" href="../mainStyle.css">
<link rel="icon" href="../sources/Logo.png">
<title>R0G</title>
<style>
    body{
        background: rgb(215,88,233);
        background: linear-gradient(117deg, rgba(215,88,233,1) 0%, rgba(72,129,242,1) 51%, rgba(14,199,204,1) 100%);
        background-repeat: repeat-y;
        background-size: 2000px 4500px;
    }
</style>
<html>
<div id="header">
        <a href="../index.php">
            <img src="../sources/Logo.png" id="logo">
        </a>
        
        <h1 class="center rightFontBlack" style="font-size:75px;"> CARRELLO</h1>
    </div>
    <div id="content" style="position:relative; top:200px; background-color:rgba(0,0,0,0.4); height:fit-content;border-top-left-radius:10px;border-bottom-left-radius:10px;">
        <?php
            session_start();
            $servername = "localhost";
            $username = "root";
            $password = "";
            
            
            try {
                $conn = new PDO("mysql:host=$servername;dbname=rogdb", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                
                

                if(isset($_SESSION["trolley"])){
                    foreach( explode(";", $_SESSION["trolley"]) as &$game){

                        $sql = "SELECT * FROM giochi WHERE id='".$game."'";
                        $res = $conn->query($sql)->fetchAll();
                        if($game != ""){
                            echo '
                            <div class="trolley-element">
                                <img src="../sources/'.$res[0]["main_img"].'" class="trolley-img" >
                                <div class="trolley-name rightFontBlack">'.$res[0]["nome"].'</div>
                                <div class="trolley-cost rightFontBlack">'.$res[0]["prezzo"].'€</div>
                                <form action="../phps/remove-trolley.php" method="post" class="trolley-delete">
                                <input type="hidden" name="id" value="'.$game.'">       
                                <button style="" id="bottonedelete" clas="rightFont">DELETE</button></form>
                            </div>
                            ';
                        }
                    }
                }
            }catch(PDOException $e){
                echo "errore";
            }
        ?>
        <button id="buttonSubmit" class="rightFontBlack" onclick="buygames()">Procedi con l'acquisto</button>
    </div>
    <input type="hidden" name="id" value="">
    
</html>
<script>
    function buygames(){
        window.location.href="../phps/submit-trolley.php";
    }
</script>