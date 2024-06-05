<?php
include("sessions.php");
include("db_connection.php");

$teacher_id=$_GET['teacher_id'];

// Select Data
$select=$con->query("SELECT * FROM `teachers` WHERE `teacher_id`='$teacher_id'");
$row=mysqli_fetch_assoc($select);
$teacher_name=$row['teacher_name'];
$t_photo=$row['teacher_photo'];


// Update Teacher Name
if(isset($_POST['edit_teacher_name'])){
    $teacher_name=mysqli_real_escape_string($con,$_POST['teacher_name']);
    $update=$con->query("UPDATE `teachers` SET `teacher_name`='$teacher_name' WHERE `teacher_id`='$teacher_id'");
    if($update){
        echo 
        '
            <script>
                alert("Edit Teacher Name Successfully...");
                window.location.href="edit_teacher.php?teacher_id='.$teacher_id.'";
            </script>
        ';
    }
    else{
        echo 
        '
            <script>
                alert("Failed to edit teacher name...");
                window.location.href="edit_teacher.php?teacher_id='.$teacher_id.'";
            </script>
        ';
    }
}

// Update Teacher Photo
if(isset($_POST['edit_teacher_photo'])){

 // File Upload Logic
 if(isset($_FILES['teacher_photo']) && !empty($_FILES['teacher_photo']['name'])) {
    $target_folder = "uploads/";
    $teacher_photo = $_FILES['teacher_photo']['name'];
    $target_path = $target_folder . $teacher_photo;

    // Move the uploaded file to the target folder
    if(move_uploaded_file($_FILES['teacher_photo']['tmp_name'], $target_path)) {
        // Insert user data into the database
        $insert = $con->query("UPDATE `teachers` SET `teacher_photo`='$teacher_photo' WHERE `teacher_id`='$teacher_id'");

        if($insert){
            echo 
            '
                <script>
                    alert("Edit Teacher Photo Successfully...");
                    window.location.href="edit_teacher.php?teacher_id='.$teacher_id.'";
                </script>
            ';
        } else {
            echo 
            '
                <script>
                    alert("Failed to edit teacher photo...");
                    window.location.href="edit_teacher.php?teacher_id='.$teacher_id.'";
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
    <title>TAS - Edit Teacher</title>
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
                <h1>Edit Teacher</h1>
                <div class="line"></div>
            </div>

            <div class="content">

                <form action="" method="post">
                    <label>Teacher's Name:</label>
                    <input type="text" value="<?php echo $teacher_name;?>" name="teacher_name" required>

                    <button type="submit" name="edit_teacher_name">Edit Teacher Name...</button>
                </form>

                <form action="" method="post" enctype="multipart/form-data" style="margin-top: 5px;">

                    <label>Current Teacher's Photo:</label>
                    <img src="./uploads/<?php echo $t_photo;?>" alt="Image">

                    <label>New Teacher's Photo:</label>
                    <input type="file" name="teacher_photo" accept="image/*">

                    <button type="submit" name="edit_teacher_photo">Edit Teacher Photo...</button>
                </form>

            </div>
            
        </div>

    </div>
</body>
</html>
