<?php
include("includes/checkAdminLogin.php");
	$flag=0;
	$uploadOk = 1;
	$msg="";
	if(isset($_POST["submit"])){
		$name=$_POST["name"];
		$family=$_POST["family"];
		$username=$_POST["username"];
		$password=$_POST["password"];
		$repassword=$_POST["repassword"];
		$level=$_POST['level'];
		
		$target_dir = "img/uploads/admins/";
		$target_file = $target_dir . basename($_FILES["adminProfiles"]["name"]);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		   && $imageFileType != "gif" ) {
			$msg.="فقط فایل هایی با پسوند jpg, jpeg, png و gif مورد قبول است!<br>";
			$uploadOk = 0;
		}
		
		if ($_FILES["adminProfiles"]["size"] > 1000000) {
  			$msg.="حجم فایل بیشتر از 1 مگابایت است!<br>";
  			$uploadOk = 0;
		}
		
		if($name=="" || $family=="" || $username=="" || $password=="" || $repassword=="" || $level=="1"){
			$uploadOk = 0;
			$msg="برخی از فیلد ها پر نشده!";
		}
		if($uploadOk == 0){
			if($password!=$repassword){
				$uploadOk = 0;
				$msg="کلمه عبور و تکرار آن مشابه نیست!";
			}
		}
		if($uploadOk==0){
			if(strlen($password)<8 || strlen($repassword)<8){
			$flag=1;
			$msg="پسورد و تکرار آن باید بیشتر از 7 کاراکتر باشد.";
			}
		}
		
		if($uploadOk==1){
		
		include('includes/ConnectionToDB.php');
		
		$sql="INSERT INTO admins(name,family,username,password,level) VALUES ('$name','$family','$username','$password','$level')";
		$result=$conn->query($sql);
			
		if($result){
		$target_file=$target_dir . $conn->insert_id . '.' .$imageFileType;
		move_uploaded_file($_FILES["adminProfiles"]["tmp_name"], $target_file);
		
		$uploadOk=2;
		$msg="مدیر جدید با موفقیت اضافه شد";
		}else{
			$uploadOk=0;
			$msg="در ثبت مدیر خطایی رخ داده!";
		}
	}
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>افزودن مدیر</title>
	<link href="styles/bootstrap.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://kit.fontawesome.com/572c1de7b9.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="styles/DashboardCss.css" type="text/css">
</head>

<body style="direction: rtl;overflow-x:hidden;">
	<div class="row">
		<?php
			include("includes/RightMenuDash.php");
		?>
		
		<div class="col-md-9 ">
			<div class="row backCT">
				<?php
					include("includes/TopMenuDash.php");
				?>			
				<div class="mx-4 mainBC">
					<div class="col-md-12">
						<?php
						if($uploadOk==0){
							echo('<div class="alert bg-danger text-light text-center">'.$msg.'</div>');
						}elseif($uploadOk==2){
							echo('<div class="alert bg-success text-center text-light">'.$msg.'</div>');
						}
							
						?>
						<div class="px-5 py-4 ">
							<form method="post" action="" enctype="multipart/form-data">
								<h4 class="text-center">افزودن مدیر جدید</h4>
								<div class="row text-right">
									<div class="col-md-6 pt-3">
										<label>نام :</label>
										<input type="text" name="name" class="form-control">
									</div>
									<div class="col-md-6 pt-3">
										<label>نام خانوادگی : </label>
										<input type="text" name="family" class="form-control">
									</div>
									<div class="col-md-6 pt-3">
										<label>نام کاربری :</label>
										<input type="text" name="username" class="form-control">
									</div>
									<div class="col-md-6 pt-3">
										<label>کلمه عبور : </label>
										<input type="password" name="password" class="form-control">
									</div>
									<div class="col-md-6 pt-3">
										<label>تکرار کلمه عبور : </label>
										<input type="password" name="repassword" class="form-control">
									</div>
									<div class="col-md-6 pt-3">
										<label>سطح مدیریت : </label>
										<select class="form-control" name="level">
											
											<option value="مدیرارشد">مدیر ارشد</option>
											<option value="مدیر">مدیر</option>
											<option value="سرپرست">سرپرست</option>
											<option value="حسابدار">حسابدار</option>
										</select>	
									</div>
									<div class="col-md-6 pt-3">
										<label>بارگذاری تصویر محصول : </label>
										<input type="file" name="adminProfiles" class="form-control" id="adminProfiless">
									</div>
								</div>
								<div class="text-center p-4">
									<input type="submit" value="ثبت مدیر" name="submit" class="btn btn-success">
									<input type="reset" value="بازنشانی مقادیر" name="reset" class="btn btn-warning">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
