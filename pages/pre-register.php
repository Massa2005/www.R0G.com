<link rel="stylesheet" href="../mainStyle.css">
<html>
    <?php
        ini_set('display_errors','Off');
        echo '<input type="hidden" id="result" value="'.$_POST["result"].'">';
    ?>

    <div class="borderContainer center" style="width: fit-content; top:200px">
        <form action="../phps/register.php" method="POST">
            <div class="center" style="width: fit-content;">Mail</div>
            <input type="text" name="mail" class="center"><br><br>
            <div class="center" id="error" style="width: fit-content; color:red;"></div>

            <div class="center" style="width: fit-content;">Name</div>
            <input type="text" name="name" class="center"><br><br>

            <div class="center" style="width: fit-content;">Surname</div>
            <input type="text" name="surname" class="center"><br><br>

            <div class="center" style="width: fit-content;">Birth date</div>
            <input type="date" name="date" class="center"><br><br>

            <div class="center"  style="width: fit-content;">Password</div>
            <input type="password" name="password" class="center"><br><br>
            

            <div class="center"  style="width: fit-content;">Repeat password</div>
            <input type="password" name="password2" class="center"><br><br>
            <input type="submit" value="Login" class="center">
        </form>
    </div>
</html>

<script>
    let res =document.getElementById("result");
    let error =document.getElementById("error");
    if(res.value == "ok"){
        error.innerHTML="";
        window.location.href="../index.php";
    }else if(res.value == "no"){
        error.innerHTML="email già registrata";
    }

</script>