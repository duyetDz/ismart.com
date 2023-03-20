

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
        <div class="title">Email register</div>
        <form action="" method="post">
            <div class="field">
                <input type="text" name="email" value="" required>
                <label>Email</label>
            </div>
            <div class="field">
                <input type="submit" name="btn-send" value="Send mail">
            </div>
            <a href="{{route('users.login')}}">Đăng nhập</a>
        </form>
    </div>
</body>

</html>