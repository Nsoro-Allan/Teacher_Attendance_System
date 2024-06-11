<?php
session_start();
if(!isset($_SESSION['tas_user'])){
    echo"
    <script>
    alert('Please Loggin First...');
    window.location.href='index.php';
    </script>
    ";
}
?>