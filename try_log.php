<?php
session_start();
include "db_conn.php";

    if (isset($_POST['uname']) && isset($_POST['pword'])) {
        function validation($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        };

        $uname = validation($_POST['uname']);
        $pword = validation($_POST['pword']);

        if(empty($uname)) {
            header("Location: login.php?error=Username is required.");
            exit();
        } else if (empty($pword)) {
            header("Location: login.php?error=Password is required.");
            exit();
        } else {
            $sql = "SELECT * FROM users WHERE uname = '$uname' AND pword = '$pword'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                
                if ($row['uname'] === $uname && $row['pword'] === $pword) {
                    $_SESSION['uname'] = $row['uname'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['id'] = $row['id'];
                    header("Location: dashboard.php");
                    exit();
                } else {
                    header("Location: login.php?error=Your username or password is incorrect.");
                    exit();
                };
            } else {
                header("Location: login.php?error=Your username or password is incorrect.");
                exit();
            };
        };

    } else {
        header("Location: login.php");
        exit();
    };
?>