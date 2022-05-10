<?php
session_start();
include "../db_conn.php";

if (isset($_SESSION['id']) && isset($_SESSION['uname'])) {

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | HMS</title>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../css/dash_style.css">
</head>

<body>
    <div class="container">
        <div class="nav">
            <ul>
                <li>
                    <a href="dashboard.php">
                        <span class="icon"><img class="logo" src="../assets/hmsLogo.png" alt="Logo"></span>
                    </a>
                </li>
                <li class="hovered">
                    <a href="#">
                        <span class="icon"><img src="../assets/home.svg" alt="Dashboard"></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><img src="../assets/contact.svg" alt="Doctors"></span>
                        <span class="title">Doctors</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><img src="../assets/contact.svg" alt="Patients"></span>
                        <span class="title">Patients</span>
                    </a>
                </li>
                <li>
                    <a href="appointments.php">
                        <span class="icon"><img src="../assets/folder.svg" alt="Sign Out"></span>
                        <span class="title">Appointments</span>
                    </a>
                </li>
                <li>
                    <a href="../index.html">
                        <span class="icon"><img src="../assets/signout.svg" alt="Sign Out"></span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="content">
            <div class="bar">
                <div class="toggle">
                    <img src="../assets/menu.svg" alt="Menu">
                </div>
                <div class="welcome">
                    <h1>Hello, <?php echo $_SESSION['name']; ?>!</h1>
                </div>
                <div class="user">
                    <img src="../assets/contact.svg" alt="Profile">
                </div>
            </div>

            <div class="dashCards">
                <div class="card">
                    <div>
                        <?php
                            $admin = "SELECT * from users";
                            $admin_run = mysqli_query($conn, $admin);

                            if($total_admin = mysqli_num_rows($admin_run)) {
                                echo '<div class="total">'.$total_admin.'</div>';
                            } else {
                                echo '<div class="total">No Data</div>';
                            };
                        ?>
                        <div class="name">Total Admins</div>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <?php
                            $doctor = "SELECT * from doctors";
                            $doctor_run = mysqli_query($conn, $doctor);

                            if($total_doctor = mysqli_num_rows($doctor_run)) {
                                echo '<div class="total">'.$total_doctor.'</div>';
                            } else {
                                echo '<div class="total">No Data</div>';
                            };
                        ?>
                        <div class="name">Total Doctors</div>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <?php
                            $patient = "SELECT * from patients";
                            $patient_run = mysqli_query($conn, $patient);

                            if($total_patient = mysqli_num_rows($patient_run)) {
                                echo '<div class="total">'.$total_patient.'</div>';
                            } else {
                                echo '<div class="total">No Data</div>';
                            };
                        ?>
                        <div class="name">Total Patients</div>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <?php
                            $aptmt = "SELECT * from appointments";
                            $aptmt_run = mysqli_query($conn, $aptmt);

                            if($total_aptmt = mysqli_num_rows($aptmt_run)) {
                                echo '<div class="total">'.$total_aptmt.'</div>';
                            } else {
                                echo '<div class="total">No Data</div>';
                            };
                        ?>
                        <div class="name">Total Appointments</div>
                    </div>
                </div>
            </div>

            <div class="appointments">
                <div class="recent">
                    <div class="header">
                        <h2>Most Recent Appointments</h2>
                        <a href="appointments.php">View All</a>
                    </div>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Patient</th>
                            <th>Doctor</th>
                            <th>Date</th>
                            <th>Symptoms</th>
                            <th>Diagnosis</th>
                            <th>Prescription</th>
                        </tr>
                        <?php
                        $sql = "SELECT * FROM appointments ORDER BY id DESC LIMIT 4";
                        $result = $conn -> query($sql);

                        if($result -> num_rows > 0) {
                            while($row = $result -> fetch_assoc()) {
                                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["patient"] . "</td><td>" . $row["doctor"] . "</td><td>" . $row["date"] . "</td><td>" . $row["symptoms"] . "</td><td>" . $row["diagnosis"] . "</td><td>" . $row["prescription"] . "</td></tr>";
                            };
                        } else {
                            echo "No Data";
                        };
                        $conn->close();
                       ?>
                    </table>
                </div>
            </div>

        </div>

    </div>

    <script>
    let toggle = document.querySelector('.toggle');
    let list = document.querySelector('.nav');
    let content = document.querySelector('.content');

    toggle.onclick = function() {
        list.classList.toggle('active');
        content.classList.toggle('active');
    }

    let nav = document.querySelectorAll('.nav li');

    function linkActive() {
        nav.forEach((item) =>
            item.classList.remove('hovered'));
        this.classList.add('hovered');
    };

    nav.forEach((item) =>
        item.addEventListener('mouseover', linkActive));
    </script>
</body>

</html>

<?php
} else {
    header("Location: index.php");
    exit();
};
?>