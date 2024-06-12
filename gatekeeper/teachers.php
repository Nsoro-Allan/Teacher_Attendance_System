<?php
include("sessions.php");
include("db_connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAS - Teachers</title>
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
                <h1>Available Teachers</h1>
                <div class="line"></div>
            </div>

            <div class="content">

                <div class="table">

                <table>
                    <tr>
                        <th>Teacher's Photo</th>
                        <th>Teacher's Name</th>
                    </tr>
                    <?php
                        $select=$con->query("SELECT * FROM `teachers` ORDER BY `teacher_id` DESC");
                        if(mysqli_num_rows($select)>0){

                        while($row=mysqli_fetch_assoc($select)){    
                         $teacher_id=$row['teacher_id'];   
                         $teacher_name=$row['teacher_name'];   
                         $teacher_photo=$row['teacher_photo'];   
                    ?>    
                        <tr>
                        <td><img src="../admin/uploads/<?php echo $teacher_photo;?>" alt="Photo"></td>
                        <td><?php echo $teacher_name;?></td>
                        </tr>

                    <?php
                    }
                    }

                    else{
                        echo"<td colspan='2' class='err'><h1>No Teachers Found...</h1></td>";
                    }
                    ?>
                    

                </table>
                  
                </div>

            </div>
            
        </div>

    </div>
</body>
</html>
