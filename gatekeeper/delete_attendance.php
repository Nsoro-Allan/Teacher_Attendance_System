<?php
include("sessions.php");
include("db_connection.php");

$attendance_id=$_GET['attendance_id'];

$delete=$con->query("DELETE FROM `attendance` WHERE `attendance_id`='$attendance_id'");

if($delete){
    header("Location: attendance.php");
}
else{
    echo"
    <script>
        alert('Failed to delete attendance...');
        window.location.href='attendance.php';
    </script>
    ";
}

?>