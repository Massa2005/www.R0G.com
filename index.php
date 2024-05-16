<link rel="stylesheet" href="mainStyle.css">
<style>
    body{
        background: rgb(215,88,233);
        background: linear-gradient(117deg, rgba(14,199,204,1) 0%, rgba(72,129,242,1) 51%, rgba(215,88,233,1) 100%);
        background-repeat: repeat-y;
        background-size: 2000px 4500px;
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
            <input type="text" id="searchbar" placeholder="search" autocomplete="off">
            <button onclick="search()" id="searchbutt">&nbsp;</button>

            
        </div>
        
        <div class="center" style="width:fit-content; top: 110px" id="buttons">
            <div id="register" class="rightFont rowButton" style="color:rgba(239,49,128,200);text-shadow: 0px 0px 5px rgba(239,49,128,255);">
                register
            </div>
            <div id="log-in" class="rowButton rightFont" style="color:rgba(239,49,128,255);text-shadow: 0px 0px 5px rgba(239,49,128,255);">
                log-in
            </div>
            <div id="log-out" class="rowButton rightFont" style="color:rgba(239,49,128,255);text-shadow: 0px 0px 5px rgba(239,49,128,255);">
                log-out
            </div>
        </div>
        <div class="center" style="" id="carrelloIcon">
            <a href="pages/trolley.php">
                <img src="sources/pngegg.png" alt="" style="height:100px;width:100px">
            </a>
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
                for ($i = 0; $i<count($res);$i++) {
                    $item = $res[$i];
                    /*devo mettere una scritta 'Lista dei giochi' sopra al div della lista dei giochi */
                    echo '
                    <form action="pages/dev-game_page.php" method="post">
                    <input type="hidden" name="id" value="'.$item["id"].'">
                    <button id="div'.$item["id"].'" class="main-list-element">
                    <div >
                        <img id="img'.$item["id"].'" src="sources/'. $item["main_img"].'"  class="main-list-img" style="">
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
                    echo '</div></button></form>
                    <script>
                        document.getElementById("div'.$item["id"].'").addEventListener("mouseover",
                            (value)=>{
                                var img = document.getElementById("img'.$item["id"].'");
                                img.style.animation = "forwards";
                                img.style.animationName = "ingrandimentoImmagine";
                                img.style.animationDuration = "200ms";
                                console.log("helo");
                            }
                        );        
                        document.getElementById("div'.$item["id"].'").addEventListener("mouseout",
                            (value)=>{
                                var img = document.getElementById("img'.$item["id"].'");
                                img.style.animation = "forwards";
                                img.style.animationName = "rimpicciolimentoImmagine";
                                img.style.animationDuration = "200ms";
                                console.log("helo");
                            }
                        );                        
                    </script>
                    
                    ';
                }
            
                
            } catch(PDOException $e) {echo "errore";}


        ?>
        <div style="height:4000px;"></div>
    </div>

    
</html>


<div id="footer" class="rightFont" >
    <a href="pages/dev-pre-login.php">are you a developer?</a>
</div>


<script>
    let searchBar = document.getElementById("searchdiv");
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
    searchBar.addEventListener("focusin", (event)=>{
        let searchField = document.getElementById("searchbar");
        console.log("ciao");
        searchBar.style.animation = "forwards";
        searchBar.style.animationName = "ingrandimentoBarraDiricerca";
        searchBar.style.animationDuration = "200ms";
        searchField.style.animation = "forwards";
        searchField.style.animationName = "ingrandimentoTextField";
        searchField.style.animationDuration = "200ms";
    });
    searchBar.addEventListener("focusout", (event)=>{
        let searchField = document.getElementById("searchbar");
        console.log("ciao");
        searchBar.style.animation = "forwards";
        searchBar.style.animationName = "rimpicciolimentoRicerca";
        searchBar.style.animationDuration = "200ms";
        searchField.style.animation = "forwards";
        searchField.style.animationName = "rimpicciolimentoField";
        searchField.style.animationDuration = "200ms";
    });
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