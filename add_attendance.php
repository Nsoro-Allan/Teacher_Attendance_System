<?php
include("sessions.php");
include("db_connection.php");

// CheckIn Attendance Starts Here 
if(isset($_POST['check_in'])){
    $teacher_id=mysqli_real_escape_string($con, $_POST['teacher_id']);
    $presence="Present";
    $checkin_time=date('Y-m-d H:i:s');
    $checkout_time="Not Yet...";
    if($checkin_time <= strtotime("8:30am")){
        $commentary="You are early and on time...";
    }
    else{
        $commentary="You are late for work... ";
    }

    $add=$con->query("INSERT INTO `attendance` VALUES('','$teacher_id','$presence','$checkin_time','$checkout_time','$commentary')");

    if($add){
        header("Location: attendance.php");
    }
    else{
        echo"
        <script>
            alert('Failed to perform the checkin attendance');
            window.location.href='add_attendance.php';
        </script>
        ";
    }
}
// CheckIn Attendance Ends Here 

// CheckOut Attendance Starts Here 
if(isset($_POST['check_out'])){
    $teacher_id=mysqli_real_escape_string($con, $_POST['teacher_id']);
    $checkout_time=date('Y-m-d H:i:s');
    

    $update=$con->query("UPDATE `attendance` SET `checkout_time`='$checkout_time' WHERE `teacher_id`='$teacher_id'");

    if($update){
        header("Location: attendance.php");
    }
    else{
        echo"
        <script>
            alert('Failed to perform the checkout attendance');
            window.location.href='add_attendance.php';
        </script>
        ";
    }
}
// CheckOut Attendance Ends Here 



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAS - Add New Attendance</title>
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
                <h1>Add New Attendance</h1>
                <div class="line"></div>
            </div>

            <div class="content">

                <div class="table">

                <table>
                    <tr>
                        <th>Teacher Photo</th>
                        <th>Teacher Name</th>
                        <th>Teacher CheckIn</th>
                        <th>Teacher CheckOut</th>
                    </tr>
                    <?php
                    $select=$con->query("SELECT * FROM `teachers`");
                    while($row=mysqli_fetch_assoc($select)){
                       $t_id=$row['teacher_id']; 
                       $teacher_name=$row['teacher_name']; 
                       $teacher_photo=$row['teacher_photo']; 

                    ?>
                    <tr>

                    <td><img src="./uploads/<?php echo $teacher_photo;?>" alt="Image"></td>
                    <td><?php echo $teacher_name;?></td>

                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="teacher_id" value="<?php echo $t_id;?>">
                            <button type="submit" name="check_in"><img src="./images/checked_in.ico" alt="Icon"> Checked In...</button>
                        </form>
                    </td>

                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="teacher_id" value="<?php echo $t_id;?>">
                            <button type="submit" name="check_out"><img src="./images/checked_out.ico" alt="Icon"> Checked Out...</button>
                        </form>
                    </td>

                    </tr>
                    <?php    
                    }
                    ?>
                </table>

                </div>

            </div>
            
        </div>

    </div>
</body>
</html>