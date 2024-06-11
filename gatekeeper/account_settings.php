<?php
include("sessions.php");
include("db_connection.php");

$session=$_SESSION['tas_user'];

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
        $_SESSION['tas_user']=$admin_email;
        header("Location: account_settings.php");
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
