<?php
session_start();
if(isset($_SESSION['isSignedIn']))
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


<?php require_once('Views/template/footer.phtml')?>
