<?php
include("sessions.php");
include("db_connection.php");

$admin_id=$_GET['admin_id'];

$delete=$con->query("DELETE FROM `admin` WHERE `admin_id`='$admin_id'");

if($delete){
    header("Location: users.php");
}
else{
    echo"
    <script>
        alert('Failed to delete user...');
        window.location.href='users.php';
    </script>
    ";
}

?>