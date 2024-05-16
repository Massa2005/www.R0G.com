<form action="../phps/update_dev.php" method="post" id="form">
<?php
$servername = "localhost";
$username = "root";
$password = "";



try {
    session_start();
    $conn = new PDO("mysql:host=$servername;dbname=rogdb", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM editori WHERE e_mail='".$_SESSION["mail"]."'";
    $res = $conn->query($sql) ->fetchAll();

    echo '
    <div id="contenitoreNomeE-mail" class="contenitorinput rightFontBlack">
            E-mail
            <label  name="maila" class="rightFontLogginANDRegister" style="width: fit-content;font-size:30px;color: black;">'.$_SESSION["mail"]. '</label>
            
    </div>
    <div id="contenitoreNome" class="contenitorinput rightFontBlack">
            Nome
            <input type="text" name="name" value="'.$res[0]["nome"].'" class="rightFontLogginANDRegister" style="width: fit-content;font-size:30px;color: black;">
    </div>
    <div id="contenitoreCognome" class="contenitorinput rightFontBlack">
            Sede
            <input type="text" name="sede" value="'.$res[0]["sede"].'" class="rightFontLogginANDRegister" style="width: fit-content;font-size:30px;color: black;">
    </div>
    
    <div id="contenitorePassword" class="contenitorinput rightFontBlack">
            Password
            <input type="text" name="password" value="'.$res[0]["password"].'" class="rightFontLogginANDRegister" style="width: fit-content;font-size:30px;color: black;">
    </div>
    ';
} catch(PDOException $e) {}
?>
<input type="submit" value = "aggiorna informazioni" id="buttonSubmit" style="top:-100px">
</form>