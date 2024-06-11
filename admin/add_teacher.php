<?php
include("sessions.php");
include("db_connection.php");

if(isset($_POST['add_teacher'])){

    $teacher_name=mysqli_real_escape_string($con,$_POST['teacher_name']);

 // File Upload Logic
 if(isset($_FILES['teacher_photo']) && !empty($_FILES['teacher_photo']['name'])) {
    $target_folder = "uploads/";
    $teacher_photo = $_FILES['teacher_photo']['name'];
    $target_path = $target_folder . $teacher_photo;

    // Move the uploaded file to the target folder
    if(move_uploaded_file($_FILES['teacher_photo']['tmp_name'], $target_path)) {
        // Insert user data into the database
        $insert = $con->query("INSERT INTO `teachers`(`teacher_id`,`teacher_name`,`teacher_photo`) VALUES ('','$teacher_name','$teacher_photo')");

        if($insert){
            header("location: teachers.php");
        } else {
            echo 
            '
                <script>
                    alert("Failed to add new teacher...");
                </script>
            ';
        }
    } else {
        echo 
        '
        <script>
            alert("Failed to upload teacher photo...");
        </script>
        ';
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAS - Add New Teacher</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./images/icon.ico" type="image/x-icon">
</head>
<body>
    <div class="main-container">
        
        <!-- Sidbar -->
            <?php include("sidebar.php");?>
        <!-- Sidbar -->

        <div class="container-right">
            <div class="title">
                <h1>Add New Teacher</h1>
                <div class="line"></div>
            </div>

            <div class="content">

                <form action="" method="post" enctype="multipart/form-data">
                    <label>Teacher's Name:</label>
                    <input type="text" placeholder="Enter teacher's name..." name="teacher_name" required>
                    <label>Teacher's Photo:</label>
                    <input type="file" name="teacher_photo" accept="image/*" required>

                    <button type="submit" name="add_teacher">Add New Teacher...</button>
                </form>

            </div>
            
        </div>

    </div>
</body>
</html>
