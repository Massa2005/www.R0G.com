<form action="../pages/trolley.php"></form>
<?php
    session_start();
    $_SESSION["trolley"] = $_SESSION["trolley"].";".$_POST["id"];
?>
<script>
    document.getElementById("form").submit();
</script>