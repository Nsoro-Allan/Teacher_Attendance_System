<?php
    include("db_connection.php");
    if(isset($_POST['login'])){
        $admin_email=mysqli_real_escape_string($con, $_POST['admin_email']);
        $admin_password=mysqli_real_escape_string($con, $_POST['admin_password']);

        $login=$con->query("SELECT * FROM `admin`");
        if(mysqli_num_rows($login)>0){
            while($row=mysqli_fetch_assoc($login)){
                if($admin_email == $row['admin_email'] && $admin_password == $row['admin_password']){
                    session_start();
                    $_SESSION['tas_admin']=$admin_email;

                    $msg="LoggedIn Successful...";
                }
                else if($admin_email != $row['admin_email'] && $admin_password == $row['admin_password']){
                    $error_msg="Invalid Email...";
                }
                else if($admin_email == $row['admin_email'] && $admin_password != $row['admin_password']){
                    $error_msg="Invalid Password...";
                }
                else{
                    $error_msg="Invalid Email and Password...";
                }
            }
        }
        else{
            $error_msg="User Not Found...";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAS - Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./images/icon.ico" type="image/x-icon">
    <script src="./sweetalert.min.js"></script>
</head>
<body>
    <div class="form-container">

        <div class="form-left">
            <div class="img">
            <img src="./images/icon.ico" alt="Favicon...">
            </div>
            <h1>[Admin - Portal]</h1>
            <h1>Teachers Attendance System</h1>
            <h1>[TAS]</h1>
        </div>

        <div class="form-right">

            <form action="" method="post">
                
                <label>Email:</label>
                <input type="email" name="admin_email" placeholder="Enter your email..." required>
                
                <label>Password:</label>
                <input type="password" name="admin_password" placeholder="Enter your password..." required>

                <button type="submit" name="login">Login Here...</button>

            </form>

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
                window.location.href = 'dashboard.php';
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
        window.location.href = 'login.php';
    });
    </script>";
}

?>