<?php
include("sessions.php");
unset($_SESSION['tas_user']);
session_destroy();
echo"
<script>
alert('You Have Logged Out Successfully...');
window.location.href='index.php';
</script>
";
?>