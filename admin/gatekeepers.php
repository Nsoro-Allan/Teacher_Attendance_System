<?php
include("sessions.php");
include("db_connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAS - Gatekeepers</title>
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
                <h1>Available Gatekeepers</h1>
                <div class="line"></div>
            </div>

            <div class="content">

                <div class="buttons">
                    <a href="./add_gatekeeper.php"><img src="./images/gatekeeper.ico" alt="Icon"> Add New Gatekeeper...</a>
                </div>

                <div class="table">

                <table>
                    <tr>
                        <th>Gatekeeper Name</th>
                        <th>Gatekeeper Password</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                        $select=$con->query("SELECT * FROM `gatekeeper` ORDER BY `gatekeeper_id` DESC");
                        if(mysqli_num_rows($select)>0){

                        while($row=mysqli_fetch_assoc($select)){    
                         $gatekeeper_id=$row['gatekeeper_id'];   
                         $gatekeeper_name=$row['gatekeeper_name'];   
                         $gatekeeper_password=$row['gatekeeper_password'];     
                    ?>    
                        <tr>
                        <td><?php echo $gatekeeper_name;?></td>
                        <td><?php echo $gatekeeper_password;?></td>
                        <td>
                            <a href="./edit_gatekeeper.php?gatekeeper_id=<?php echo $gatekeeper_id;?>">Edit Gatekeeper...</a>
                            <a href="./delete_gatekeeper.php?gatekeeper_id=<?php echo $gatekeeper_id;?>">Delete Gatekeeper...</a>
                            </td>
                        </tr>

                    <?php
                    }
                    }

                    else{
                        echo"<td colspan='3' class='err'><h1>No Gatekeepers Available...</h1></td>";
                    }
                    ?>
                    

                </table>
                  
                </div>

            </div>
            
        </div>

    </div>
</body>
</html>
