<link rel="stylesheet" href="../mainStyle.css">
<html>
    <?php
        ini_set('display_errors','Off');
        session_start();
        echo '<input type="hidden" id="result" value="'.$_POST["result"].'">';
        echo '<input type="hidden" id="in-search" value="'.$_GET["search"].'">';
        $_SESSION["searched"] = $_GET["search"];
        echo $_SESSION["mail"];
    ?>
    <div id="header">
        <a href="../index.php">
            <img src="/sources/Logo.png" id="logo">
        </a>
        <div class="center rightFont" id="searchdiv">
            <input type="text" id="searchbar" placeholder="search">
            <button onclick="search()" id="searchbutt">&nbsp;</button>
        </div>
        
        <div class="center" style="width:fit-content; top: 110px">
            <div id="statistics" class="rowButton rightFont">
                statistics
            </div>
            <div id="games" class="rowButton rightFont">
                game list
            </div>
            <div id="personal-info" class="rowButton rightFont">
                personal-info
            </div>
        </div>
    </div>
    <div id="content" style="position:relative; top: 300px;">

    
    </div>
</html>
<script>
    let gamesButton = document.getElementById("games");
    let searchdiv = document.getElementById("searchdiv");
    let p_infoButton = document.getElementById("personal-info");
    let statisticsButton = document.getElementById("statistics");
    let result = document.getElementById("result");
    let sbar = document.getElementById("searchbar");
    let insearch = document.getElementById("in-search");

    searchdiv.style.visibility = "hidden";

    if(result.value=="ok-added"){
        loadPage("../inPage/dev-game-list.php");
    }
    if(insearch.value !=""){
        searchdiv.style.visibility = "visible";
        sbar.value = insearch.value;
        loadPage("../inPage/dev-game-list.php");
    }

    gamesButton.addEventListener("click",(event)=>{
        searchdiv.style.visibility = "visible";
        loadPage("../inPage/dev-game-list.php");
    });
    statisticsButton.addEventListener("click",(event)=>{
        searchdiv.style.visibility = "visible";
        loadPage("../inPage/dev-statistic.php");
    });
    p_infoButton.addEventListener("click",(event)=>{
        searchdiv.style.visibility = "visible";
        loadPage("../inPage/dev-personal-info.php");
    });

    function goToAdd(){
        window.location.href="dev-add-game.php";
    }

    function loadPage(page){
        console.log("fatto");
        fetch(page).then(data => data.text()).then(html => document.getElementById('content').innerHTML = html);
    }
    function search(){
        window.location.href="dev-personal_area.php?search="+sbar.value;
    }
</script>