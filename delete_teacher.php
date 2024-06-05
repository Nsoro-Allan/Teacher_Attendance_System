<?php
include("sessions.php");
include("db_connection.php");

$teacher_id=$_GET['teacher_id'];

$delete=$con->query("DELETE FROM `teachers` WHERE `teacher_id`='$teacher_id'");

if($delete){
    header("Location: teachers.php");
}
else{
    echo"
    <script>
        alert('Failed to delete teacher...');
        window.location.href='teachers.php';
    </script>
    ";
}

?>