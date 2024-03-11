
<html>
    <?php
        ini_set('display_errors','Off');
        echo '<input type="hidden" id="result" value="'.$_POST["result"].'">';
        echo '<input type="hidden" id="namein" value="'.$_POST["name"].'">';
        echo '<input type="hidden" id="descriptionin" value="'.$_POST["description"].'">';
        echo '<input type="hidden" id="datain" value="'.$_POST["data"].'">';
        echo '<input type="hidden" id="costin" value="'.$_POST["cost"].'">';
    ?>

    <div class="borderContainer center" style="width: fit-content; top:200px">
        <form action="../phps/add-game.php" id="form" method="POST">

            <div class="center" style="width: fit-content;">Name</div>
            <input type="text" id="name" name="name" class="center"><br><br>
            <div class="center" id="error" style="width: fit-content; color:red;"></div>

            <div class="center" style="width: fit-content;">Description</div>
            <input type="text" id="description" name="description" class="center"><br><br>

            <div class="center"  style="width: fit-content;">prezzo</div>
            <input type="number" id="cost" name="cost" class="center"><br><br>
            
            <div class="center"  style="width: fit-content;">data pubblicazione</div>
            <input type="date" id="date" name="date" class="center"><br><br>


        </form>
        <button onclick="register()" class="center">Upload</button>
    </div>
</html>

<script>
    let res =document.getElementById("result");
    let error =document.getElementById("error");
    let name =document.getElementById("name");
    let namein =document.getElementById("namein");
    let surname =document.getElementById("description");
    let surnamein =document.getElementById("descriptionin");
    let mail =document.getElementById("date");
    let mailin =document.getElementById("datein");
    let mail =document.getElementById("cost");
    let mailin =document.getElementById("costin");


    name.value = namein.value;
    surname.value = surnamein.value;
    mail.value = mailin.value;
    password.value = passwordin.value;

    error.innerHTML="";

    if(res.value == "ok-added"){
        error.innerHTML="";
        window.location.href="../index.php";
    }else if(res.value == "no"){
        error.innerHTML="email già registrata";
    }

    function register(){   
        document.getElementById("form").submit();
    }
</script>