<link rel="stylesheet" href="mainStyle.css">
<style>
    body{
        background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(118,86,200,1) 0%, rgba(0,194,255,1) 100%);
    }
</style>
<html>
    <?php
        ini_set('display_errors','Off');
        session_start();
        echo '<input type="hidden" id="in-mail" value="'.$_SESSION["mail"].'">';
        echo '<input type="hidden" id="in-dev" value="'.$_SESSION["dev"].'">';
        echo '<input type="hidden" id="in-search" value="'.$_GET["search"].'">';
        $_SESSION["searched"] = $_GET["search"];
    ?>
    <div id="header">
        <a href="index.php">
            <img src="sources/Logo.png" id="logo">
        </a>
        
    
        <div class="center" id="searchdiv">
            
            <input type="text" id="searchbar" placeholder="search"  >
            <button onclick="search()" id="searchbutt">&nbsp;</button>
        </div>
        
        <div class="center" style="width:fit-content; top: 110px">
            <div id="register" class="rowButton rightFont">
                register
            </div>
            <div id="log-in" class="rowButton rightFont">
                log-in
            </div>
            <div id="log-out" class="rowButton rightFont">
                log-out
            </div>
        </div>
    </div>
    <div id="content" style="position:relative; top:250px">
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            
            
            try {
                $conn = new PDO("mysql:host=$servername;dbname=rogdb", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                
                $sql = "SELECT * FROM giochi ORDER BY id DESC LIMIT 36";
                
                
                $res = $conn->query($sql)->fetchAll();
                

                //riordina in ordine di ricerca l array res
                for ($i = count($res)-1; $i>=0;$i--) {
                    $item = $res[$i];
                    /*devo mettere una scritta 'Lista dei giochi' sopra al div della lista dei giochi */
                    echo '
                    <form action="pages/dev-game_page.php" method="post">
                    <input type="hidden" name="id" value="'.$item["id"].'">
                    <button class="main-list-element">
                    <div >
                        <img src="sources/'. $item["main_img"].'"  class="main-list-img" style="">
                        <div class="center main-list-name rightFontBlack">'.$item["nome"].'</div>';
                    if($item["sconto"] != 0){
                        $scontato = $item["prezzo"] - ($item["prezzo"] * $item["sconto"] / 100);

                        echo '<div style="background-color:rgb(39, 207, 39);padding: 0px 7px 0px 7px" class="center">
                            <div class="center rightFontBlack" style="font-size:40;">'.$scontato.'€</div>
                            <div style="text-decoration: line-through;"> '.$item["prezzo"].'€</div>
                        </div>';
                    }else{
                        echo '<div class="center rightFontBlack" style="font-size:40;">'.$item["prezzo"].'€</div>';
                    }
                    echo '</div></button></form>';
                }
            
                
            } catch(PDOException $e) {echo "errore";}


        ?>
        <div style="height:5000px;"></div>
    </div>

    
</html>


<div id="footer" class="rightFont" >
    <a href="pages/dev-pre-login.php">are you a developer?</a>
</div>


<script>
    let loginButton = document.getElementById("log-in");
    let logoutButton = document.getElementById("log-out");
    let registerButton = document.getElementById("register");
    let inmail = document.getElementById("in-mail");
    let indev = document.getElementById("in-dev");
    let insearch = document.getElementById("in-search");
    let sbar = document.getElementById("searchbar");

    console.log("dev: ->"+indev.value);
    
    if(inmail.value== ""){
        loginButton.innerHTML = "log-in";
    }else if(indev.value == "true"){
        loginButton.innerHTML = "dev area";
    }else{
        loginButton.innerHTML = "personal area";
    }

    if(insearch.value !=""){
        sbar.value = insearch.value;
        loadPage("inPage/game-search.php");
    }

    loginButton.addEventListener("click",(event)=>{loginBehaviour();});
    logoutButton.addEventListener("click",(event)=>{ window.location.href="phps/logout.php";});
    registerButton.addEventListener("click",(event)=>{ window.location.href="pages/pre-register.php";});
    sbar.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            search();
        }
    });

    function search(){
        window.location.href="index.php?search="+sbar.value;
    }

    function loginBehaviour(){
        if(inmail.value== ""){
            window.location.href="pages/pre-login.php";
        }else if(indev.value == "true"){
            window.location.href="pages/dev-personal_area.php";
        }else{
            window.location.href="pages/personal_area.php";
        }
    }
    function loadPage(page){
        console.log("fatto");
        fetch(page).then(data => data.text()).then(html => document.getElementById('content').innerHTML = html);
    }
    
</script>