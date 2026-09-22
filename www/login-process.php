<?php

if (isset($_POST['submit'])) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $emailForm = $_POST['email'];
            $passwordForm = $_POST['password'];

            $conn = mysqli_connect('mariadb', 'root', 'password', 'Boeken_Blok5A');
            $stmt = mysqli_prepare($conn, "SELECT * FROM Medewerker WHERE email = ?");
            mysqli_stmt_bind_param($stmt, "s", $emailForm);
            mysqli_stmt_execute($stmt);

       

            $result = mysqli_stmt_get_result($stmt);


            //als de email bestaat dan is het resultaat groter dan 0
            if (mysqli_num_rows($result) > 0) {

                //resultaat gevonden? Dan maken we een user-array $dbuser
                $dbuser = mysqli_fetch_assoc($result);

                if ($dbuser['password'] == $passwordForm) {

                    session_start();
                    $_SESSION['id']               = $dbuser['id'];
                    $_SESSION['email']                 = $dbuser['email'];
                    $_SESSION['naam']                  = $dbuser['naam'];
                    $_SESSION['achternaam']            = $dbuser['achternaam'];
                    $_SESSION['medewerker_code']       = $dbuser['medewerker_code'];

                    // echo "You are logged in";
                    header("Location: ingelogd.php");
                    exit;
                } else {
                    $_GET['message'] = 'wrongpassword';
                    include 'log_in_message.php';
                    exit;
                }
            } else {
                $_GET['message'] = 'usernotfound';
                include 'log_in_message.php';
                exit;
            }
        }
    }
}

include 'footer.php';
