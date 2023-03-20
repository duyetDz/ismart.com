<?php


?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <!----<title>Login Form Design | CodeLab</title>---->
    <link href="{{asset('check_user.css')}}" rel="stylesheet" type="text/css"/>
</head>

<body>
   
    <div class="wrapper">
        <div class="title">Reset Password</div>
        <form action="" method="post">
            <div class="field">
                <input type="password" name="password" value="" required>
                <label>Password</label>
            </div>
            
            <div class="field">
                <input type="password" name="confirm_password" value="" required>
                <label>Confirm_password</label>
            </div>
            <div class="content">
                <div class="checkbox">
                    <input type="checkbox" id="remember-me">
                    <label for="remember-me">Remember me</label>
                </div>
                <div class="pass-link"><a href="">Forgot password?</a></div>
            </div>
            <div class="field">
                <input type="submit" name="btn-reset" value="Reset">
            </div>
            <div class="signup-link">Not a member? <a href="">Signup now</a></div>
        </form>
    </div>
</body>

</html>