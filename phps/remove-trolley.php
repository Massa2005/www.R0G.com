<form action="../pages/trolley.php" id="form">
    <button style="position:absolute;top:140px;" >lol</button>
</form>
<?php
    session_start();
    $delete = $_POST["id"];
    $new = ";";
    foreach( explode(";", $_SESSION["trolley"]) as &$game){
        if($game != "" && $game != $delete){
            echo $game." = ".$delete." ------- ";
            $new = $new.$game.";";
        }
    }
    $_SESSION["trolley"] = $new;
?>
<script>
    document.getElementById("form").submit();
</script>