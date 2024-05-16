<form action="../pages/trolley.php" id="form">
    <button style="position:absolute;top:140px;" >lol</button>
</form>
<?php
    session_start();
    if(isset($_SESSION["trolley"])){
        echo strpos($_SESSION["trolley"], ";".$_POST["id"].";");
        if(strpos($_SESSION["trolley"], ";".$_POST["id"].";") == ""){
            $_SESSION["trolley"] = $_SESSION["trolley"].$_POST["id"].";";
        }
    }else{
        $_SESSION["trolley"] = ";".$_POST["id"].";";
    }
    
?>
<script>
    document.getElementById("form").submit();
</script>