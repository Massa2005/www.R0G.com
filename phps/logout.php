<?php
    session_start();

    $_SESSION["name"] = "";
    $_SESSION["mail"] = "";
?>

<script>
    window.location.href="../index.php";
</script>