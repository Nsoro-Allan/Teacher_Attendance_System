<?php
session_start();
if(!isset($_SESSION['tas_admin'])){
    echo"
    <script>
    alert('Please Loggin First...');
    window.location.href='index.php';
    </script>
    ";
}
?>