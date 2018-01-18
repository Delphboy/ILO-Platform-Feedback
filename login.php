<?php
session_start();
if($_SESSION['isSignedIn'])
{
    header('Location: admin.php');
}

require_once('Models/Login.php');
if(isset($_POST['submit']))
{
    $userEmail = $_POST['username'];
    $userPassword = $_POST['password'];
    $loginModel = new Login();
    $auth = $loginModel->signIn($userEmail, $userPassword);
    if($auth)
    {
        $_SESSION['isSignedIn'] = true;
        header('Location: admin.php');
        exit();
    }
    else
    {
        echo '<span class="login100-form-title">
						<p style="color: white">Incorrect Details</p>
			    </span>';
    }
}
require_once('Views/login.phtml');
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
