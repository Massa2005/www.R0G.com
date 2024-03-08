<link rel="stylesheet" href="mainStyle.css">
<html>
    <?php
        ini_set('display_errors','Off');
        session_start();
        echo '<input type="hidden" id="in-mail" value="'.$_SESSION["mail"].'">';
    ?>
    <div id="header">
        <div class="center" style="width:fit-content; top: 110px">
            <div id="register" class="rowButton">
                register
            </div>
            <div id="log-in" class="rowButton">
                log-in
            </div>
            <div id="log-out" class="rowButton">
                log-out
            </div>
        </div>
    </div>
</html>
<script>
    let loginButton = document.getElementById("log-in");
    let logoutButton = document.getElementById("log-out");
    let registerButton = document.getElementById("register");
    let inmail = document.getElementById("in-mail");

    if(inmail.value== ""){
        loginButton.innerHTML = "log-in";
    }else{
        loginButton.innerHTML = "personal area";
    }

    loginButton.addEventListener("click",(event)=>{loginBehaviour();});
    logoutButton.addEventListener("click",(event)=>{ window.location.href="phps/logout.php";});
    registerButton.addEventListener("click",(event)=>{ window.location.href="pages/pre-register.php";});


    function loginBehaviour(){
        if(inmail.value== ""){
            window.location.href="pages/pre-login.php";
        }else{
            window.location.href="pages/personal_area.php";
        }
    }
</script>