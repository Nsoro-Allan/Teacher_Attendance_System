<?php
include("sessions.php");
include("db_connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAS - Users</title>
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
                <h1>User Accounts</h1>
                <div class="line"></div>
            </div>

            <div class="content">

                <div class="buttons">
                    <a href="./add_user.php"><img src="./images/users.ico" alt="Icon"> Add New User...</a>
                </div>

                <div class="table">

                <table>
                    <tr>
                        <th>User Email</th>
                        <th>User Password</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                        $select=$con->query("SELECT * FROM `admin` ORDER BY `admin_id` DESC");
                        if(mysqli_num_rows($select)>0){

                        while($row=mysqli_fetch_assoc($select)){    
                         $admin_id=$row['admin_id'];   
                         $admin_email=$row['admin_email'];   
                         $admin_password=$row['admin_password'];     
                    ?>    
                        <tr>
                        <td><?php echo $admin_email;?></td>
                        <td><?php echo $admin_password;?></td>
                        <td>
                            <a href="./edit_user.php?admin_id=<?php echo $admin_id;?>">Edit User...</a>
                            <a href="./delete_user.php?admin_id=<?php echo $admin_id;?>">Delete User...</a>
                            </td>
                        </tr>

                    <?php
                    }
                    }

                    else{
                        echo"<td colspan='3' class='err'><h1>No Users Found...</h1></td>";
                    }
                    ?>
                    

                </table>
                  
                </div>

            </div>
            
        </div>

    </div>
</body>
</html>
