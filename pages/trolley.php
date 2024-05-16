<link rel="stylesheet" href="../mainStyle.css">

<html>
<div id="header">
        <a href="../index.php">
            <img src="../sources/Logo.png" id="logo">
        </a>
        
        <h1 class="center" style="color:white"> CARRELLO</h1>
    </div>
    <div id="content" style="position:relative; top:160px">
        <?php
            session_start();

            foreach( explode(";", $_SESSION["trolley"]) as &$game){
                if($game != ""){
                    echo '
                    <div class="trolley-element">
                        <img src="..\sources\1000033767.png" class="trolley-img">
                        <div class="trolley-name">Giovanni</div>
                        <div class="trolley-cost">25€</div>
                        <form action="../phps/remove-trolley.php" method="post" class="trolley-delete"><button>DELETE</button></form>
                    </div>
                    ';
                }
            }
        ?>
    </div>
    
</html>