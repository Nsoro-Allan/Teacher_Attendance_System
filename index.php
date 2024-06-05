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
                    $_SESSION['tas_user']=$admin_email;
                    header("Location: dashboard.php");
                }
                else if($admin_email != $row['admin_email'] && $admin_password == $row['admin_password']){
                    echo"<script>alert('Invalid Email...');</script>";
                }
                else if($admin_email != $row['admin_email'] && $admin_password == $row['admin_password']){
                    echo"<script>alert('Invalid Password...');</script>";
                }
                else{
                    echo"<script>alert('Invalid email and  password...');</script>";
                }
            }
        }
        else{
            echo"<script>alert('User Not Found...');</script>";
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
</head>
<body>
    <div class="form-container">

        <div class="form-left">
            <div class="img">
            <img src="./images/icon.ico" alt="Favicon...">
            </div>
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