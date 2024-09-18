<link rel="stylesheet" href="../mainStyle.css">
<link rel="icon" href="../sources/Logo.png">
<title>R0G</title>
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
        echo '<input type="hidden" id="descriptionin" value="'.$_POST["description"].'">';
        echo '<input type="hidden" id="datein" value="'.$_POST["data"].'">';
        echo '<input type="hidden" id="costin" value="'.$_POST["cost"].'">';
    ?>
<a href="../index.php">
            <img src="../sources/Logo.png" id="logo" style="height:250px; width: 500px; left: -30px;top:50px;">
        </a>
    <div class="borderContainer center" style="width: fit-content; top:20px; padding: 100px 100px 125px 100px;">
        <form action="../phps/add-game.php" id="form" method="POST">

            <div class="center rightFontLogginANDRegister" style="width: fit-content;font-size:30px;">Name</div>
            <input type="text" id="name" name="name" class="center inputForField"><br>
            <div class="center" id="error" style="width: fit-content; color:red;"></div><br>

            <div class="center rightFontLogginANDRegister" style="width: fit-content;font-size:30px;">Description</div>
            <textarea id="description" name="description" class="rightFontLogginANDRegister" style="color:black;font-size:20px;" rows="6" cols="50"></textarea><br><br>

            <div class="center rightFontLogginANDRegister"  style="width: fit-content;font-size:30px;">prezzo</div>
            <input type="number" id="cost" name="cost" class="center inputForField"><br><br>
            
            <div class="center rightFontLogginANDRegister"  style="width: fit-content;font-size:30px;">data pubblicazione</div>
            <input type="date" id="date" name="date" class="center inputForField"><br><br>
            <input type="hidden" name="img" id="img" value = "x">
        </form>
        <form action="" id="formimg">
            <input type="file" name="" id="inpFile">
        </form>
        <button onclick="register()" class="center Loginbutton">Upload</button>
    </div>
</html>

<script>
    let res =document.getElementById("result");
    let error =document.getElementById("error");
    let name =document.getElementById("name");
    let namein =document.getElementById("namein");
    let description =document.getElementById("description");
    let descriptionin =document.getElementById("descriptionin");
    let date =document.getElementById("date");
    let datein =document.getElementById("datein");
    let cost =document.getElementById("cost");
    let costin =document.getElementById("costin");
    let form = document.getElementById("formimg");
    let img = document.getElementById("img");
    let inpFile = document.getElementById("inpFile");

    
    name.value = namein.value;
    description.value = descriptionin.value;
    date.value = datein.value;
    cost.value = costin.value;

    error.innerHTML="";
    console.log("result: ->"+res.value);
    if(res.value == "ok-added"){
        error.innerHTML="";
        window.location.href="dev-personal_area.php";
    }else if(res.value == "no-name"){
        error.innerHTML="nome gia usato";
    }


    function register(){
        const endpoint = "../phps/upload_img.php";
        const formData = new FormData();
        try {
            img.value = inpFile.files[0].name;
            console.log("nome ->"+inpFile.files[0].name);
            formData.append("inpFile", inpFile.files[0]);
            fetch(endpoint, {
                method: "post",
                body: formData
            }).catch(console.error);
        } catch (error) {
            console.log("immagine vuota");
        }
        
        document.getElementById("form").submit();
    }
</script>