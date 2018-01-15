<?php
require_once('Views/login.phtml');
require($_SERVER['DOCUMENT_ROOT'] . '/Models/database.php'); //Connect to database

if(isset($_POST['username']))
    $email = $_POST['username'];
if(isset($_POST['password']))
    $pass =  $_POST['password'];

/* SANITISATION SECTION */


/* END OF SANITISATION SECTION*/
if(isset($_POST['username']) && isset($_POST['password'])) {
    $dbHandle = database::Instance();
    $dbHandle->query("SELECT * FROM user WHERE email LIKE :email AND password = :password");

    $dbHandle = database::Instance();
    $dbHandle->query("SELECT * FROM user WHERE email");
    $dbHandle->bind(':email', $_POST['username']);
    $dbHandle->bind(':password', $_POST['password']);
    $dbHandle->execute();

    $alldata = $dbHandle->resultset();
    $rowcount = sizeof($alldata);

    for ($i = 0; $i < $rowcount; $i++) {
        $row = $alldata[$i];
        if ($row[3] == 1) {
            //echo "You've Logged in as " . $row[2] . ", You are an Admin";
            header('Location: admin.php'); //Will navigate to different page
        } elseif ($row[3] == 0) {
            // echo "You've Logged in as " . $row[2];
            header('Location: index.php'); //Will navigate to different page
        }
    }
}
?>


<footer>
    <!-- Scripts -->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
</footer>
