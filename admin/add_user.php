<?php
include("sessions.php");
include("db_connection.php");

if(isset($_POST['add_user'])){
    $admin_email=mysqli_real_escape_string($con, $_POST['admin_email']);
    $admin_password=mysqli_real_escape_string($con, $_POST['admin_password']);

    $insert=$con->query("INSERT INTO `admin` VALUES ('','$admin_email','$admin_password')");

    if($insert){
        $msg="Added New User Successfully...";
    }
    else{
        $error_msg="Failed to add new user...";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAS - Add New User</title>
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
                <h1>Add New User</h1>
                <div class="line"></div>
            </div>

            <div class="content">

                <form action="" method="post">
                    <label>User Email:</label>
                    <input type="text" placeholder="Enter user email..." name="admin_email" required>

                    <label>User Password:</label>
                    <input type="password" placeholder="Enter user password..." name="admin_password" required>

                    <button type="submit" name="add_user">Add New User...</button>
                </form>

            </div>
            
        </div>

    </div>
</body>
</html>

<?php
if(isset($msg)){
    echo "<script>
            swal({
                title: 'Success!',
                text: '$msg',
                icon: 'success',
            }).then(function() {
                window.location.href = 'users.php';
            });
    </script>";
}
elseif(isset($error_msg)){
    echo "<script>
    swal({
        title: 'Error!',
        text: '$error_msg',
        icon: 'error',
    }).then(function() {
        window.location.href = 'add_user.php';
    });
    </script>";
}

?>
