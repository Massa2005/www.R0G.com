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
        echo '<input type="hidden" id="result" value="'.$_POST["result"].'">';
        echo '<input type="hidden" id="namein" value="'.$_POST["name"].'">';
        echo '<input type="hidden" id="surnamein" value="'.$_POST["surname"].'">';
        echo '<input type="hidden" id="mailin" value="'.$_POST["mail"].'">';
        echo '<input type="hidden" id="passwordin" value="'.$_POST["password"].'">';
    ?>

    <div class="borderContainer center" style="width: fit-content; top:20px; padding: 100px 100px 125px 100px;">
        <form action="../phps/register.php" id="form" method="POST">
            <div class="center rightFontLogginANDRegister" style="width: fit-content;">Mail</div>
            <input type="text" name="mail" class="center inputForField"><br><br>
            <div class="center rightFontLogginANDRegister" id="error" style="width: fit-content; color:red;"></div>

            <div class="center rightFontLogginANDRegister" style="width: fit-content;">Name</div>
            <input type="text" id="name" name="name" class="center inputForField"><br><br>

            <div class="center rightFontLogginANDRegister" style="width: fit-content;">Surname</div>
            <input type="text" id="surname" name="surname" class="center inputForField"><br><br>

            <div class="center rightFontLogginANDRegister" style="width: fit-content;">Birth date</div>
            <input type="date" id="date" name="date" class="center inputForField"><br><br>

            <div class="center rightFontLogginANDRegister"  style="width: fit-content;">Password</div>
            <input type="password"  name="password" class="center inputForField"><br><br>
            

            <div class="center rightFontLogginANDRegister"  style="width: fit-content;">Repeat password</div>
            <input type="password" id="password2" name="password2" class="center inputForField"><br><br>
            <div class="center rightFontLogginANDRegister " id="error2" style="width: fit-content; color:red;"></div>
        </form>
        <button onclick="register()" class="center Loginbutton">Regiter</button>
    </div>
</html>

<script>
    let res =document.getElementById("result");
    let error =document.getElementById("error");
    let error2 =document.getElementById("error2");
    let name =document.getElementById("name");
    let namein =document.getElementById("namein");
    let surname =document.getElementById("surname");
    let surnamein =document.getElementById("surnamein");
    let mail =document.getElementById("mail");
    let mailin =document.getElementById("mailin");
    let password =document.getElementById("password");
    let passwordin =document.getElementById("passwordin");
    let password2 =document.getElementById("password2");

    name.value = namein.value;
    surname.value = surnamein.value;
    mail.value = mailin.value;
    password.value = passwordin.value;

    error.innerHTML="";
    error2.innerHTML="";

    if(res.value == "ok"){
        error.innerHTML="";
        window.location.href="../index.php";
    }else if(res.value == "no"){
        error.innerHTML="email già registrata";
    }

    function register(){
        if(password.value == password2.value){
            document.getElementById("form").submit();
        }else{
            error2.innerHTML = "password diverse";
        }
    }

</script>