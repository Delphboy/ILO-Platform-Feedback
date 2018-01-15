<?php
require_once('Views/login.phtml');
require($_SERVER['DOCUMENT_ROOT'] . '/Models/database.php'); //Connect to database

/* END OF SANITISATION SECTION*/
if(isset($_POST['submit']))
{
    $userEmail = htmlentities($_POST['username']);
    $userPassword = htmlentities($_POST['password']);

    $loginModel = new Login();
    $auth = $loginModel->searchDatabase($userEmail, $userPassword);

    // Redirect if signin successful
    if($auth)
        header('Location: https://www.google.co.uk/');
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
