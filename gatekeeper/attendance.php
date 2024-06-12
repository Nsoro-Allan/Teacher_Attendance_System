<?php
include("sessions.php");
include("db_connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAS - Attendance</title>
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
                <h1>Teacher Attendance</h1>
                <div class="line"></div>
            </div>

            <div class="content">

                <div class="buttons">
                    <a href="./add_attendance.php"><img src="./images/attendance.ico" alt="Icon"> Add New Attendance...</a>
                </div>

                <div class="table">

                <table>
                    <tr>
                        <th>Teacher Photo</th>
                        <th>Teacher Name</th>
                        <th>Checked In</th>
                        <th>Checked Out</th>
                        <th>Presence</th>
                        <th>Commentary</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                        $select=$con->query("SELECT * FROM `attendance` ORDER BY `attendance_id` DESC");
                        if(mysqli_num_rows($select)>0){

                        while($row=mysqli_fetch_assoc($select)){    
                         $attendance_id=$row['attendance_id'];     
                         $teacher_id=$row['teacher_id'];     
                         $presence=$row['presence'];     
                         $checkin_time=$row['checkin_time'];     
                         $checkout_time=$row['checkout_time'];     
                         $commentary=$row['commentary'];     
                    ?>    
                        <tr>
                        <td><img src="../admin/uploads/<?php
                         $t_id=$teacher_id;
                         $select1=$con->query("SELECT * FROM `teachers` WHERE `teacher_id`='$t_id'");
                         $row1=mysqli_fetch_assoc($select1);
                         $teacher_photo=$row1['teacher_photo'];
                         echo $teacher_photo;
                         ?>"></td>
                        <td><?php
                         $t_id=$teacher_id;
                         $select2=$con->query("SELECT * FROM `teachers` WHERE `teacher_id`='$t_id'");
                         $row2=mysqli_fetch_assoc($select2);
                         $teacher_name=$row2['teacher_name'];
                         echo $teacher_name;
                         ?></td>
                        <td><?php echo $checkin_time;?></td>
                        <td><?php echo $checkout_time;?></td>
                        <td><?php echo $presence;?></td>
                        <td><?php echo $commentary;?></td>
                        <td>
                            <a href="./edit_attendance.php?attendance_id=<?php echo $attendance_id;?>">Edit Attendance...</a>
                            <a href="./delete_attendance.php?attendance_id=<?php echo $attendance_id;?>">Delete Attendance...</a>
                            </td>
                        </tr>

                    <?php
                    }
                    }

                    else{
                        echo"<td colspan='7' class='err'><h1>No Attendance Available...</h1></td>";
                    }
                    ?>
                    

                </table>
                  
                </div>

            </div>
            
        </div>

    </div>
</body>
</html>
