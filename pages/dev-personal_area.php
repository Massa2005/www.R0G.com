<link rel="stylesheet" href="../mainStyle.css">
<html>
    <?php
        ini_set('display_errors','Off');
        session_start();
        echo '<input type="hidden" id="in-mail" value="'.$_SESSION["mail"].'">';
    ?>
    <div id="header">
        <div class="center" style="width:fit-content; top: 110px">
            <div id="register" class="rowButton">
                statistic
            </div>
            <div id="log-in" class="rowButton">
                game
            </div>
            <div id="log-out" class="rowButton">
                boh
            </div>
        </div>
    </div>
    <div id="content" style="position:relative; top: 300px;">


    </div>
</html>
<script>
    let loginButton = document.getElementById("log-in");
    let logoutButton = document.getElementById("log-out");
    let registerButton = document.getElementById("register");
    let inmail = document.getElementById("in-mail");

    loginButton.addEventListener("click",(event)=>{loadPage("../inPage/dev-game-list.php");});

    function loadPage(page){
        console.log("fatto");
        fetch(page).then(data => data.text()).then(html => document.getElementById('content').innerHTML = html);
    }
</script>