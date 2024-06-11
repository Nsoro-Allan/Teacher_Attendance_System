<?php
    if(isset($_SESSION['tas_gatekeeper'])){
        header("Location: dashboard.php");
    }
    else{
        header("Location: login.php");
    }
?>