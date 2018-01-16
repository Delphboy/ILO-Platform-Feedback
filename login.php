<?php
require_once('Views/template/headerUser.phtml');
require_once('Views/login.phtml');
require_once('Models/Login.php');
if(isset($_POST['submit']))
{
    $userEmail = htmlentities($_POST['username']);
    $userPassword = htmlentities($_POST['password']);
    echo 'Email: ' . $userEmail . '<br>';
    echo 'Password: ' . $userPassword . '<br>';
    $loginModel = new Login();
    $auth = $loginModel->signIn($userEmail, $userPassword);
    echo '<p>Authorised User: ' . $auth . '</p>';
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
