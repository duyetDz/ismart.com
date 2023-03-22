<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
	<meta charset="UTF-8">
	<!---<title> Responsive Registration Form | CodingLab </title>--->
	<link href="{{asset('check_user.css')}}" rel="stylesheet" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
	
	<div class="container">
		<div class="title">Đăng ký thành viên mới</div>
		<div class="content">
			<form action="" method="post">
				<div class="user-details">
					<div class="input-box">
						<span class="details">Họ và tên</span>
						<input name="fullname" value="" type="text" placeholder="Nhập vào họ và tên của bạn" >
					</div>
					
					<div class="input-box">
						<span class="details">Email</span>
						<input name="email" value="" type="text" placeholder="Nhập vào email của bạn" >
					</div>
					
					<div class="input-box">
						<span class="details">Số điện thoại</span>
						<input name="phone" value="" type="text" placeholder="Nhập vào Số điện thoại của bạn" >
					</div>
					
					<div class="input-box">
						<span class="details">Mật khẩu</span>
						<input name="password" value=""type="password" placeholder="Nhập vào Mật khẩu của bạn" >
					</div>
					
					<div class="input-box">
						<span class="details">Xác nhận mật khẩu</span>
						<input name="confirm_password" value=""type="password" placeholder="Xác nhận mật khẩu của bạn" >
					</div>
					<div class="input-box">
						<span class="details">Địa chỉ</span>
						<input name="address" value=""type="text" placeholder="Nhập vào Địa chỉ của bạn" >
					</div>
				</div>
				<div class="gender-details">
					<input type="radio" name="gender" value="male" id="dot-1">
					<input type="radio" name="gender" value="female" id="dot-2">
					<input type="radio" name="gender"  id="dot-3">
					<span class="gender-title">Giới tính</span>
					<div class="category">
						<label for="dot-1">
							<span class="dot one"></span>
							<span class="gender">Nam</span>
						</label>
						<label for="dot-2">
							<span class="dot two"></span>
							<span class="gender">Nữ</span>
						</label>
						<label for="dot-3">
							<span class="dot three"></span>
							<span class="gender">Không thể nói</span>
						</label>
					</div>
				</div>
				<div class="button">
					<input type="submit" name='btn-reg' value="Đăng ký">
				</div>
				<a href="{{route('users.login')}}">Đăng nhập</a>
			</form>
		</div>
	</div>

</body>

</html>