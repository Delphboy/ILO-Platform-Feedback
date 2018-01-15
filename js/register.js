/**
 * Created by stc765 on 1/12/18.
 */
// A set of scripts to validate the register form

function validateRegisterForm()
{
    // Pull values from the form
    var pwd = document.forms["registration-form"]["psw"].value;
    var pwdRep = document.forms["registration-form"]["psw-repeat"].value;

    // Check that the passwords are equal
    if (pwd == pwdRep)
    {
        return true;
    }
    else
    {
        alert('passwords do not match');
        return false;
    }
}