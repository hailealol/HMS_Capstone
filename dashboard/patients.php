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
    <title>Patients | HMS</title>
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
                <li>
                    <a href="dashboard.php">
                        <span class="icon"><img src="../assets/home.svg" alt="Dashboard"></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="doctors.php">
                        <span class="icon"><img src="../assets/contact.svg" alt="Doctors"></span>
                        <span class="title">Doctors</span>
                    </a>
                </li>
                <li class="hovered">
                    <a href="patients.php">
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

            <div class="fullList">
                <div class="recent">
                    <div class="header">
                        <h2>Patients</h2>
                    </div>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>First</th>
                            <th>Last</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <th>Phone</th>
                            <th>Address</th>
                        </tr>
                        <?php
                        $sql = "SELECT * FROM patients";
                        $result = $conn -> query($sql);

                        if($result -> num_rows > 0) {
                            while($row = $result -> fetch_assoc()) {
                                echo "<tr><td>" . $row['id'] . "</td><td>" . $row["fname"] . "</td><td>" . $row["lname"] . "</td><td>" . $row["gender"] . "</td><td>" . $row["age"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["address"] . "</td></tr>";
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