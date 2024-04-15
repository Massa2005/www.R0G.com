<link rel="stylesheet" href="../mainStyle.css">
<?php
    session_start();
    echo '<input type="hidden" id="result" value="'.$_POST["result"].'">';

    $servername = "localhost";
    $username = "root";
    $password = "";
    
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=rogdb", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "SELECT * FROM giochi WHERE id='".$_POST["id"]."'";
        $res = $conn->query($sql)->fetchAll();

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
        <div class="center" style="width:fit-content; top: 110px">
            <div id="register" class="rowButton rightFont">
                Statistic
            </div>
            <div id="log-in" class="rowButton rightFont">
                Game
            </div>
            <div id="log-out" class="rowButton rightFont">
                Boh
            </div>
        </div>
    </div>
    <div id='content' style="position:absolute; top:150px" class="center">
        <div id="dev-game-central-div" class="center colorOfInpageElement">
            <?php
                if($res[0]["main_img"] != "" && $res[0]["main_img"] != "x"){
                    echo '<img id="dev-LogoGioco" style=\'object-fit: cover;\' class ="image" src="../sources/'.$res[0]["main_img"].'">';
                }else{
                    echo '<img id="dev-LogoGioco" style=\'object-fit: cover;\' class ="image" src="../sources/image_not_available.jpg">';
                }

            ?>
            
            
            <div id="dev-gameName" class= "rightFont">
                <div id="nomegioco" class="rightFontMoreThicker center" style="font-size:50px;color:black;">
                    NOMEDELGIOCO
                </div> 
            </div>
            
            <div id="dev-prezzo" class="rightFont">
                PREZZO DEL GIOCO CON LO SCONTO
            </div>
            <div id="dev-descrizione" class="rightFont">
                DESCRIZIONE GIOCO,
                CONTIENE INFORMAZIONI RELATIVE A EDITORE, DATE DI PUBB.
                
            </div>
            <div id="dev-valutazione-Gioco">
                DIV CHE CONTIENE LA SEZIONE DELLE VALUTAZIONI E DEI COMMENTI

            </div>
            <!--QUESTA PAGINA PROBABILMENTE SARA' UGUALE A QUELLA DEL GIOCO UTENTI APPARTE QUALCHE MODIFICA-->





        </div>

    </div>
    
</html>
<script>

    
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
</script>