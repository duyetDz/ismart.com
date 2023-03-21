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
		<div class="title">Registration</div>
		<div class="content">
			<form action="" method="post">
				<div class="user-details">
					<div class="input-box">
						<span class="details">Full Name</span>
						<input name="fullname" value="" type="text" placeholder="Enter your name" required>
					</div>
					
					<div class="input-box">
						<span class="details">Username</span>
						<input name="username" value="" type="text" placeholder="Enter your username" required>
					</div>
					
					<div class="input-box">
						<span class="details">Email</span>
						<input name="email" value="" type="text" placeholder="Enter your email" required>
					</div>
					
					<div class="input-box">
						<span class="details">Phone Number</span>
						<input name="phone" value="" type="text" placeholder="Enter your number" required>
					</div>
					
					<div class="input-box">
						<span class="details">Password</span>
						<input name="password" value=""type="password" placeholder="Enter your password" required>
					</div>
					
					<div class="input-box">
						<span class="details">Confirm Password</span>
						<input name="confirm_password" value=""type="password" placeholder="Confirm your password" required>
					</div>
					<div class="input-box">
						<span class="details">Address</span>
						<input name="address" value=""type="text" placeholder="Enter you address" required>
					</div>
				</div>
				<div class="gender-details">
					<input type="radio" name="gender" value="male" id="dot-1">
					<input type="radio" name="gender" value="female" id="dot-2">
					<input type="radio" name="gender"  id="dot-3">
					<span class="gender-title">Gender</span>
					<div class="category">
						<label for="dot-1">
							<span class="dot one"></span>
							<span class="gender">Male</span>
						</label>
						<label for="dot-2">
							<span class="dot two"></span>
							<span class="gender">Female</span>
						</label>
						<label for="dot-3">
							<span class="dot three"></span>
							<span class="gender">Prefer not to say</span>
						</label>
					</div>
				</div>
				<div class="button">
					<input type="submit" name='btn-reg' value="Register">
				</div>
				<a href="{{route('users.login')}}">Đăng nhập</a>
			</form>
		</div>
	</div>

</body>

</html>