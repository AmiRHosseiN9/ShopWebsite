<?php
session_start();
	$flag=0;
	if(isset($_POST["submit"])){
		$username=$_POST["username"];
		$password=$_POST["password"];
		if($username==""){
			$flag=1;
			$msg="نام کاربری را وارد کنید!";
		}
		
		if($flag==0 && $password==""){
			$flag=1;
			$msg="کلمه عبور را وارد کنید!";
		}
		
		if($flag==0 && strlen($password)<8){
			$flag=1;
			$msg="پسورد باید بیشتر از 7 کاراکتر باشد.";
		}
		
		if($flag==0){
		
		include('includes/ConnectionToDB.php');

		$sql="SELECT * FROM admins WHERE username='$username' AND password='$password'";
		$result=$conn->query($sql);
		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				$_SESSION['nameAndFamily']=$row['name'].' '.$row['family'];
				$_SESSION['userId']=$row['id'];
				header("location:dashboard.php");
			}
		}
		else{
			if($flag==0){
			$flag=1;
			$msg="نام کاربری یا پسورد نادرست است";
			}
		}
	}
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ورود به پنل مدیریت</title>
	<link href="styles/bootstrap.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://kit.fontawesome.com/572c1de7b9.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="styles/loginANDdashboard.css" rel="stylesheet" type="text/css">
</head>

<body style="overflow-y: visible;">
	<div class="row">
		
		<div class="col-md-3 col-0 col-sm-2">
		</div>
		<div class="col-md-6 text-center col-12 col-sm-8">
			<?php
			if($flag==1){
				echo('<div class="alert bg-danger text-light text-center">'.$msg.'</div>');
			}
		?>
			<div>
				<img src="img/logo-letter-9.png">
				<p class="pt-5">
				<h5 class="text-white">ورود به پنل مدیریت</h5>
				<h6 class="text-white">نام کاربری و کلمه عبور خود را وارد کنید</h6>
				</p>
			</div>
		<form action="" method="post">
			<div>
					<i class="fa fa-user-secret posIcon1"></i>
				<div class="floating-label-group inputPad pt-5">		
					<input type="text" name="username" class="form-control inputCSS" autocomplete="off" autofocus  />
					<label class="floating-label text-right inputPad pt-5">نام کاربری</label>
				</div>
					<i class="fa fa-key posIcon2"></i>
				<div class="floating-label-group inputPad">
					<input type="password" name="password" class="form-control inputCSS" autocomplete="off"  />
					<label class="floating-label text-right inputPad">رمز عبور</label>
				</div>
				<div class="text-white">
					<input type="checkbox">
					<label>مرا به خاطر بسپار!</label>
					<a href="#" class="pr-5" style="color: inherit;text-decoration-line: none;">رمز عبور خود را فراموش کردید؟</a>
				</div>
				<div class="pt-5">
					<button type="submit" name="submit" class="btnsub px-5 py-2">ورود</button>
				</div>
			</div>
		  </form>
		</div>
		
		<div class="col-md-3 col-0 col-sm-2">
		</div>
	</div>
	<br><br>
</body>
</html>
