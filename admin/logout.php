<?php
include("sessions.php");
unset($_SESSION['tas_admin']);
echo"
<script>
alert('You Have Logged Out Successfully...');
window.location.href='../';
</script>
";
?>
