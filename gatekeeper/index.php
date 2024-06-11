<?php
    if(isset($_SESSION['tas_user'])){
        header("Location: dashboard.php");
    }
    else{
        header("Location: login.php");
    }
?>