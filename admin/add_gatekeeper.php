<?php
include("sessions.php");
include("db_connection.php");

if(isset($_POST['add_gatekeeper'])){
    $gatekeeper_name=mysqli_real_escape_string($con, $_POST['gatekeeper_name']);
    $gatekeeper_password=mysqli_real_escape_string($con, $_POST['gatekeeper_password']);

    $insert=$con->query("INSERT INTO `gatekeeper` VALUES ('','$gatekeeper_name','$gatekeeper_password')");

    if($insert){
        $msg="Added New Gatekeeper Successfully...";
    }
    else{
        $error_msg="Failed to add new Gatekeeper...";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAS - Add New Gatekeeper</title>
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
                <h1>Add New Gatekeeper</h1>
                <div class="line"></div>
            </div>

            <div class="content">

                <form action="" method="post">
                    <label>Gatekeeper Name:</label>
                    <input type="text" placeholder="Enter gatekeeper name..." name="gatekeeper_name" required>

                    <label>Gatekeeper Password:</label>
                    <input type="password" placeholder="Enter gatekeeper password..." name="gatekeeper_password" required>

                    <button type="submit" name="add_gatekeeper">Add New Gatekeeper...</button>
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
                window.location.href = 'gatekeepers.php';
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
        window.location.href = 'add_gatekeeper.php';
    });
    </script>";
}

?>
