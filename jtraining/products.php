<!DOCTYPE html>
<html>
<?php
require 'loggedin.php';

$servername = "localhost";
$dbUsername = "root";        
$dbPassword = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=workshop", $dbUsername, $dbPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $user = $_SESSION['UserID'];
        $res = $conn->query("SELECT * FROM account WHERE UserID = '$user'");
        foreach($res as $row){
            $image = $row['picture'];
        }
        $querycarrello = "SELECT COUNT(*) as items FROM shoppingcart WHERE userid='$user'";
        $res = $conn->query($querycarrello);
        foreach($res as $row){
            $item = $row['items'];
        }
    } catch (PDOException $e){
    }
?>
<head>
    <meta charset="UTF-8">
    <title>Motorbike Spare Parts Shop</title>
    <link rel="stylesheet" href="css/productStyle.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <script>
        function openModal(code) {
            console.log(code);
            var modal = document.getElementById("myModal");
            var overlay = document.querySelector(".overlay");
            var modalContent = modal.querySelector(".modal-content");

            modal.style.display = "flex";
            overlay.style.display = "block";
        }

        function closeModal() {
            var modal = document.getElementById("myModal");
            var overlay = document.querySelector(".overlay");
            modal.style.display = "none";
            overlay.style.display = "none";
        }

        function addToCart(code) { //non funziona :(
            console.log(code);
            var user = '<?php echo $user ?>';
            $.ajax({
                type: "POST",
                url: "addtocart.php",
                data: {
                    userid: user,
                    code: code
                },
                success: function(response) {
                    console.log("Articolo aggiunto al carrello!");
                },
                error: function(error) {
                    console.error("Errore durante l'aggiunta all'carrello:", error);
                }
            });
            closeModal();
            setTimeout(function(){location.reload();}, 1);
        }
    </script>
    <header>
        <h1>Motorbike Spare Parts Shop</h1>
        <img src="<?php echo $image ?>" id="pictureFrame" onclick="document.location.href='account.php'">
        <img src="https://cdn-icons-png.flaticon.com/512/3081/3081929.png" id=shoppingCart>
        <div class="circle">
            <span class="number"><?php echo $item; ?></span>
        </div>
        <nav>
            <ul>
                <li><a href="#" onclick="document.location.href='homepage.php'">Home</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#" onclick="document.location.href='booking.php'">Booking</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <img src=>
            <p>Do you wanna buy this item?</p>
            <button name="add" onclick="addToCart('')">Add to shopping cart</button>
            <button onclick="closeModal()">Close</button>
        </div>
    </div>
    <div class="overlay"></div>

    <div class="productContainer">
    <?php
        function genera($model, $pic, $quantity, $price, $make, $code){
            echo '<section class="product" onclick="openModal(\'' . $code . '\')">';
            echo "<img src=$pic>";
            echo "<h2>$model</h2>";
            echo "<p>$make</p>";
            echo "<p>Price: $price € Left in stock: $quantity</p>";
            echo '<form action="product.php" method="post">';
            echo '<input type="hidden" name="code" id="code" value="' . $code . '">';
            echo '<input type="submit" value="View Details">';
            echo '</form>';
            echo '</section>';
        }
        $conn = new PDO("mysql:host=$servername;dbname=workshop", $dbUsername, $dbPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "<section>";
        echo "<h1>BRAKES</h1>";
        $res = $conn->query("SELECT * FROM sparepart INNER JOIN brake ON sparepart.code=brake.idbrake INNER JOIN make on make.idmake=brake.makeid;");
        foreach($res as $row){
            genera($row['model'], $row['picture'], $row['quantity'], $row['price'], $row['name'], $row['code']);
        }
        echo "</section>";
       
        echo "<section>";
        echo "<h1>CHAINS</h1>";
        $res = $conn->query("SELECT * FROM sparepart INNER JOIN chain ON sparepart.code=chain.idchain INNER JOIN make on make.idmake=chain.makeid;");
        foreach($res as $row){
            genera($row['model'], $row['picture'], $row['quantity'], $row['price'], $row['name'], $row['code']);
        }
        echo "</section>";

        echo "<section>";
        echo "<h1>ENGINES</h1>";
        $res = $conn->query("SELECT * FROM sparepart INNER JOIN engine ON sparepart.code=engine.idengine INNER JOIN make on make.idmake=engine.makeid;");
        foreach($res as $row){
            genera($row['model'], $row['picture'], $row['quantity'], $row['price'], $row['name'], $row['code']);
        }
        echo "</section>";

        echo "<section>";
        echo "<h1>PEDAL</h1>";
        $res = $conn->query("SELECT * FROM sparepart INNER JOIN pedal ON sparepart.code=pedal.idpedal INNER JOIN make on make.idmake=pedal.makeid;");
        foreach($res as $row){
            genera($row['model'], $row['picture'], $row['quantity'], $row['price'], $row['name'], $row['code']);
        }
        echo "</section>";
        
        echo "<section>";
        echo "<h1>VALVES</h1>";
        $res = $conn->query("SELECT * FROM sparepart INNER JOIN valve ON sparepart.code=valve.idvalve INNER JOIN make ON make.idmake=valve.makeid;");
        foreach($res as $row){
            genera($row['model'], $row['picture'], $row['quantity'], $row['price'], $row['name'], $row['code']);
        }
        echo "</section>";
    ?>
    </div>    
    <footer>
        &copy; 2023 Motorbike Spare Parts Shop
    </footer>
</body>
</html>