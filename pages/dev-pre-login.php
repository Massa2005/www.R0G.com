<link rel="stylesheet" href="../mainStyle.css">
<style>
    body{
        background-color:black;
        overflow-y:hidden;   
    }
</style>
<html>
    <?php
        ini_set('display_errors','Off');
        session_start();
        echo '<input type="hidden" id="in-mail" value="'.$_SESSION["mail"].'">';
        echo '<input type="hidden" id="result" value="'.$_POST["result"].'">';

    ?>
    <a href="../index.php">
        <img src="../sources/Logo.png" id="logo" style="height:250px; width: 500px; left: -30px;top:50px;">
    </a>
    <div class="borderContainer center" style="width: fit-content; top:100px;">
    <div class="center rightFontLogginANDRegister" style="color:rgba(239,49,128,255);font-size:50px;top:-50px;text-shadow: 0px 0px 20px rgba(239,49,128,255)">
        Benvenuto Developer
    </div>
        <form action="../phps/dev-login.php" method="POST">
            <div class="center rightFontLogginANDRegister" style="width: fit-content;font-size:30px;">Mail</div>
            <input type="text" id="mail" name="mail" class="center"><br><br>
            <div class="center" id="error2" style="width: fit-content; color:red;"></div>

            <div class="center rightFontLogginANDRegister"  style="width: fit-content;font-size:30px;">Password</div>
            <input type="password"  name="password" class="center inputForField"><br><br>
            <div class="center" id="error1" style="width: fit-content; color:red;"></div>
            <input type="submit" value="Login" class="center Loginbutton">
        </form>
        
        <a href="dev-pre-register.php" class="center" style="left: 110px;top: 40px;font-size:25px;">you haven't registered yet?</a>
    </div>
    
    
    
</html>
<script>
    let inmail = document.getElementById("in-mail");
    let mail = document.getElementById("mail");
    let res = document.getElementById("result");
    let error1 = document.getElementById("error1");
    let error2 = document.getElementById("error2");
    error1.innerHTML = "";
    error2.innerHTML = "";

    mail.value = inmail.value;
    if(res.value == "ok"){
        window.location.href="../index.php";
    }else if(res.value == "no1"){
        error1.innerHTML = "incorrect password";
    }else if(res.value == "no2"){
        error1.innerHTML = "inesistent mail";
    }
    console.log(res.value);

</script>