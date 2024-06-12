<?php
include("sessions.php");
include("db_connection.php");

$session=$_SESSION['tas_admin'];

// Select Data
$select=$con->query("SELECT * FROM `admin` WHERE `admin_email`='$session'");
$row=mysqli_fetch_assoc($select);
$admin_email=$row['admin_email'];
$admin_password=$row['admin_password'];

// Update Data
if(isset($_POST['edit_account'])){
    $admin_email=mysqli_real_escape_string($con, $_POST['admin_email']);
    $admin_password=mysqli_real_escape_string($con, $_POST['admin_password']);

    $update=$con->query("UPDATE `admin` SET `admin_email`='$admin_email', `admin_password`='$admin_password' WHERE `admin_email`='$session'");

    if($update){
        $_SESSION['tas_admin']=$admin_email;
        $msg="Edited user account successfully...";
    }
    else{
        $error_msg="Failed to edit user account...";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAS - Account Settings</title>
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
                <h1>Account Settings</h1>
                <div class="line"></div>
            </div>

            <div class="content">

                <form action="" method="post">
                    <label>User Email:</label>
                    <input type="text" value="<?php echo $admin_email;?>" name="admin_email" required>

                    <label>User Password:</label>
                    <input type="text" value="<?php echo $admin_password;?>" name="admin_password" required>

                    <button type="submit" name="edit_account">Edit Account...</button>
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
                window.location.href = 'account_settings.php';
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
        window.location.href = 'account_settings.php';
    });
    </script>";
}

?>
