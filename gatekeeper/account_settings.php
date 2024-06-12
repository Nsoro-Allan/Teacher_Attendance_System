<?php
include("sessions.php");
include("db_connection.php");

$session=$_SESSION['tas_gatekeeper'];

// Select Data
$select=$con->query("SELECT * FROM `gatekeeper` WHERE `gatekeeper_name`='$session'");
$row=mysqli_fetch_assoc($select);
$gatekeeper_name=$row['gatekeeper_name'];
$gatekeeper_password=$row['gatekeeper_password'];

// Update Data
if(isset($_POST['edit_account'])){
    $gatekeeper_name=mysqli_real_escape_string($con, $_POST['gatekeeper_name']);
    $gatekeeper_password=mysqli_real_escape_string($con, $_POST['gatekeeper_password']);

    $update=$con->query("UPDATE `gatekeeper` SET `gatekeeper_name`='$gatekeeper_name', `gatekeeper_password`='$gatekeeper_password' WHERE `gatekeeper_name`='$session'");

    if($update){
        $_SESSION['tas_gatekeeper']=$gatekeeper_name;
        $msg="Editted Gatekeeper Account Successfully...";
    }
    else{
        $error_msg="Failed to edit gatekeeper account...";
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
                    <label>Gatekeeper Name:</label>
                    <input type="text" value="<?php echo $gatekeeper_name;?>" name="gatekeeper_name" required>

                    <label>Gatekeeper Password:</label>
                    <input type="text" value="<?php echo $gatekeeper_password;?>" name="gatekeeper_password" required>

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
