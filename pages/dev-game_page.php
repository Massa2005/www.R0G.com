<link rel="stylesheet" href="../mainStyle.css">
<link rel="icon" href="../sources/Logo.png">
<title>R0G</title>
<?php
    session_start();
    echo '<input type="hidden" id="result" value="'.$_POST["result"].'">';
    echo '<input type="hidden" id="in-id" value="'.$_POST["id"].'">';
    echo '<input type="hidden" id="in-dev" value="'.$_SESSION["dev"].'">';
    echo '<input type="hidden" id="in-mail" value="'.$_SESSION["mail"].'">';
    $_SESSION["game_id"] = $_POST["id"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=rogdb", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "SELECT * FROM giochi WHERE id='".$_POST["id"]."'";
        $res = $conn->query($sql)->fetchAll();

        $sql = "SELECT * FROM `keys` WHERE game_id='".$_POST["id"]."'";
        $res1 = $conn->query($sql)->fetchAll();
        echo '<input type="hidden" id="in-num" value="'.count($res1).'">';
    } catch(PDOException $e) {}   
?>
<html>
    <div id="bg_image" <?php
        if($res[0]["main_img"] != "" && $res[0]["main_img"] != "x"){
            echo ' style=\' background-image: url("../sources/'.$res[0]["main_img"].'");  
            filter: blur(5px); 
            -webkit-filter: blur(5px);
            background-repeat: no-repeat;
            top: 0px;
            left: 0px;
            width:100%;
            height:100%;
            background-size: cover;
            position: fixed;
            
            \'';
        }else{
            echo ' style=\'background-image: url("../sources/image_not_available.jpg");
             filter: blur(5px); 
            -webkit-filter: blur(5px);
            background-repeat: no-repeat;
            top: 0px;
            left: 0px;
            width:100%;
            height:100%;
            background-size: cover;
            position: fixed;
            

            \'';
        }

    ?>></div>
        
    <div id="header">
        <a href="../index.php">
            <img src="../sources/Logo.png" id="logoInPage">
        </a>
        <div class="center" style="width:fit-content; top: 100px">
            <div id="register" class="rowButtonofGamePage rightFont">
                Statistic
            </div>
            <div id="log-in" class="rowButtonofGamePage rightFont">
                Game
            </div>
            <div id="log-out" class="rowButtonofGamePage rightFont">
                Valutazioni
            </div>
        </div>
    </div>
    <div id='content' style="position:absolute; top:150px; " class="center">
        <div id="dev-game-central-div" class="center colorOfInpageElement" style="border-radius:10px;">
            
            
            <?php
                if($res[0]["main_img"] != "" && $res[0]["main_img"] != "x"){
                    echo '<img id="dev-LogoGioco" style=\'object-fit: cover;\' class ="image" src="../sources/'.$res[0]["main_img"].'">';
                }else{
                    echo '<img id="dev-LogoGioco" style=\'object-fit: cover;\' class ="image" src="../sources/image_not_available.jpg">';
                }
            ?>
            
            <div id="dev-gameName" class= "rightFont">
                <div id="nomegioco" class="rightFontMoreThicker center" style="font-size:50px;">
                <?php
                    echo $res[0]["nome"];
                ?>
                </div> 
                <div class="rightFont center" style="font-size: 60px;">
                <?php
                    echo $res[0]["prezzo"];
                ?>
                €
                </div><br><br><br><br><br><br><br>

                <form action="../phps/add-trolley.php" method="post" id="buy-form">

                    <input type="hidden" value="" id="id" name="id" class="center">
                    <button id="buy-button" class="center">Buy</button>
                </form>

            </div>
            
            <div style="height:500px"></div>
            <div class="gradient"></div>
            <div id="dev-game-info" class="rightFont">
                <br>
                <h1>DESCRIZIONE</h1><br>
                <div>
                    <?php
                        echo $res[0]["descrizione"];
                    ?>
                </div><br><br><br>
                <h1>VALUTAZIONI</h1><br>
                <div id="add-comment-div">
                <form action="../phps/add-comment.php" method="post" >
                    INSERISCI UN COMMENTO
                    <input type="hidden" name="game_id" id="game_id"><br>
                    <input type="text" name="titolo" id="titolo" placeholder="TITOLO" class="center commentThing rightFontWithoutShadow" style="padding-left:20px;"><br><br>
                    <textarea name="commento" id="commento" placeholder="COMMENTO" class="center commentThing rightFontWithoutShadow" style="padding:30px 30px 30px 30px;"></textarea><br><br>
                    <div class="center">
                    
                        <label for="valutazione">Valutazione: </label>
                        <input type="number" name="valutazione" min="0" max="10" id="valutazione" class="commentThing" value="5">
                    </div>
                    <br>
                    <input type="submit" value="publish" style="float:right;" id="bottoneAggiuntaCommenti"><br><br>
                </form>
                </div>
                
                <div id="dev-valutazione-Gioco">
                    DIV CHE CONTIENE LA SEZIONE DELLE VALUTAZIONI E DEI COMMENTI
                    
                </div>
                
            </div>

            <!--QUESTA PAGINA PROBABILMENTE SARA' UGUALE A QUELLA DEL GIOCO UTENTI APPARTE QUALCHE MODIFICA, questa é una prova per il pc di casa mia che improvvisamente ha deciso di non pullarmi piú i progetti a cazzo dui cane-->
        </div>
    </div>
</html>
<script>
    let idin = document.getElementById("in-id");
    let id = document.getElementById("id");
    let dev = document.getElementById("in-dev");
    let mail = document.getElementById("in-mail");
    let keys = document.getElementById("in-num");
    let game_id = document.getElementById("game_id");
    let commenti = document.getElementById("dev-valutazione-Gioco");
    let bottoneValutazioni= document.getElementById("log-out");
    let bottoneStatistics= document.getElementById("register");

    
    id.value = idin.value;
    game_id.value = idin.value;

    

    if(keys.value == "0"){
        document.getElementById('buy-button').innerHTML = "NO KEY";
    }
    if(mail.value == ""){
        document.getElementById("add-comment-div").innerHTML = "DEVI FARE UN LOGIN VALIDO";
        document.getElementById('buy-button').innerHTML = "NOPE";
    }else if( dev.value == "true"){ 
        fetch("../inPage/add-key-form.php").then(data => data.text()).then(
            html => {document.getElementById("add-comment-div").innerHTML = html;
                document.getElementById("game_id").value =idin.value;
            });
        try {
            if (document.getElementById("result").value == "no") {
                document.getElementById("errorekey").value = "cambia key";
            }else{
                document.getElementById("errorekey").value = "";
            }
            
        } catch (error) {
            
        }
    }
    
    fetch("../inPage/comment-list.php").then(data => data.text()).then(html => commenti.innerHTML = html);
    document.getElementById('buy-button').addEventListener('click', 
    function(event) {
        event.preventDefault();
        if(dev.value == "true" || mail.value == "" || keys.value == "0"){
            return;
        }

        document.getElementById('buy-form').submit();
    });
    /*
    let loginButton = document.getElementById("log-in");
    let logoutButton = document.getElementById("log-out");
    let registerButton = document.getElementById("register");
    let result = document.getElementById("result");

    if(result.value=="ok-added"){
        //loadPage("../inPage/dev-game-list.php");
    }

    loginButton.addEventListener("click",(event)=>{loadPage("../inPage/dev-game-list.php");});

    function goToAdd(){
        window.location.href="dev-add-game.php";
    }

    function loadPage(page){
        console.log("fatto");
        fetch(page).then(data => data.text()).then(html => document.getElementById('content').innerHTML = html);
    }*/

    bottoneValutazioni.addEventListener("click", (event)=>{
            document.documentElement.scrollTop = document.body.scrollTop=1000;
    });
    bottoneStatistics.addEventListener("click", (event)=>{
            document.documentElement.scrollTop = document.body.scrollTop=400;
    });
</script>
