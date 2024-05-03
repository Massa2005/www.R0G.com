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

    <div class="borderContainer center" style="width: fit-content; top:100px;">
        <form action="../phps/login.php" method="POST">
            <div class="center rightFontLogginANDRegister" style="width: fit-content;font-size:30px;color: white;">Mail</div>
            <input type="text" name="mail" class="center inputForField"><br><br>
            <div class="center" id="error2" style="width: fit-content; color:red;"></div>

            <div class="center rightFontLogginANDRegister"  style="width: fit-content;font-size:30px;">Password</div>
            <input type="password" name="password" class="center inputForField"><br><br>
            <div class="center rightFontLogginANDRegister " id="error1" style="width: fit-content; color:red; "></div>
            <input type="submit" value="Login" class="center Loginbutton" >
            
        </form>
        <a href="pre-register.php" class="center" style="left: 110px;top: 40px;">you haven't registered yet?</a>
    </div>
    <div class="center" style="top:250px">
        
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