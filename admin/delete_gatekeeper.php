<?php
include("sessions.php");
include("db_connection.php");

$gatekeeper_id=$_GET['gatekeeper_id'];

$delete=$con->query("DELETE FROM `gatekeeper` WHERE `gatekeeper_id`='$gatekeeper_id'");

if($delete){
    header("Location: gatekeepers.php");
}
else{
    echo"
    <script>
        alert('Failed to delete gatekeeper...');
        window.location.href='gatekeepers.php';
    </script>
    ";
}

?>