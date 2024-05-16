<link rel="stylesheet" href="../mainStyle.css">
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
        echo '<input type="hidden" id="result" value="'.$_POST["result"].'">';
        
    ?>
    <h1 class="rightFontBlack center" style="top:20px">PERSONAL AREA</h1>
    <div id="header">
    <a href="../index.php">
            <img src="../sources/Logo.png" id="logo">
        </a>
    
        <div class="center" style="width:fit-content; top: 110px">
            <div id="games" class="rowButton rightFont">
                Games
            </div>
            <div id="per-info" class="rowButton rightFont">
                Personal info
            </div>
        </div>
        <div class="center" style="" id="carrelloIcon">
            <a href="../pages/trolley.php">
                <img src="../sources/pngegg.png" alt="" style="height:100px;width:100px">
            </a>
    </div>
    </div>
    <div id="content" style="position:relative; top: 300px;">
        <!-- fetch delle pagine inpage -->

    </div>
    
</html>
<script>
    let gamesButton = document.getElementById("games");
    let infoButton = document.getElementById("per-info");
    let result = document.getElementById("result");

    gamesButton.addEventListener("click",(event)=>{loadPage("../inPage/game-list.php");});
    infoButton.addEventListener("click",(event)=>{loadPage("../inPage/personal-info.php");});

    function loadPage(page){
        console.log("fatto");
        fetch(page).then(data => data.text()).then(html => document.getElementById('content').innerHTML = html);
    }
</script>