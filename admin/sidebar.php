<script src="./sweetalert.min.js"></script>
<div class="container-left">
    <div class="top">
        <img src="./images/icon.ico" alt="Icon">
        <h1>[Admin - Portal]</h1>
        <h1>Teachers Attendance System</h1>
    </div>
    <div class="links">
        <a href="./dashboard.php"><img src="./images/dashboard.ico" alt="Icon"> Dashboard</a>
        <a href="./teachers.php"><img src="./images/teachers.ico" alt="Icon"> Teachers</a>
        <a href="./attendance.php"><img src="./images/attendance.ico" alt="Icon"> Attendance</a>
        <a href="./report.php"><img src="./images/report.ico" alt="Icon"> Report</a>
        <a href="./gatekeepers.php"><img src="./images/gatekeeper.ico" alt="Icon"> GateKeepers</a>
        <a href="./users.php"><img src="./images/users.ico" alt="Icon"> Users</a>
        <a href="./account_settings.php"><img src="./images/settings.ico" alt="Icon"> Account Settings</a>
    </div>
    <div class="bottom">
        <p><?php echo $_SESSION['tas_admin'];?></p>
        <a href="./logout.php">Logout</a>
    </div>
</div>
