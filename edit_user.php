<?php
include("sessions.php");
include("db_connection.php");

$admin_id=$_GET['admin_id'];

// Select Data
$select=$con->query("SELECT * FROM `admin` WHERE `admin_id`='$admin_id'");
$row=mysqli_fetch_assoc($select);
$admin_email=$row['admin_email'];
$admin_password=$row['admin_password'];

// Update Data
if(isset($_POST['edit_user'])){
    $admin_email=mysqli_real_escape_string($con, $_POST['admin_email']);
    $admin_password=mysqli_real_escape_string($con, $_POST['admin_password']);

    $update=$con->query("UPDATE `admin` SET `admin_email`='$admin_email', `admin_password`='$admin_password' WHERE `admin_id`='$admin_id'");

    if($update){
        header("Location: users.php");
    }
    else{
        echo"
            <script>
                alert('Failed to edit user...');
            </script>
        ";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAS - Edit User</title>
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
                <h1>Edit User</h1>
                <div class="line"></div>
            </div>

            <div class="content">

                <form action="" method="post">
                    <label>User Email:</label>
                    <input type="text" value="<?php echo $admin_email;?>" name="admin_email" required>

                    <label>User Password:</label>
                    <input type="text" value="<?php echo $admin_password;?>" name="admin_password" required>

                    <button type="submit" name="edit_user">Edit User...</button>
                </form>

            </div>
            
        </div>

    </div>
</body>
</html>
