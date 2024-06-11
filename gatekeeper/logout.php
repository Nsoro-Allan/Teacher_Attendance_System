<?php
include("sessions.php");
unset($_SESSION['tas_gatekeeper']);
echo"
<script>
alert('You Have Logged Out Successfully...');
window.location.href='../';
</script>
";
?>