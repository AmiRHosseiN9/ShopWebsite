<?php
include("includes/checkAdminLogin.php");
	$flag=0;
	if(isset($_POST["submit"])){
		$name=$_POST["name"];
		$family=$_POST["family"];
		$username=$_POST["username"];
		$level=$_POST['level'];
		if($name=="" || $family=="" || $username==""){
			$flag=1;
			$msg="برخی از فیلد ها پر نشده!";
		}
		
		if($flag==0){
		
		include('includes/ConnectionToDB.php');
		$id=$_GET['id'];
		$sql="UPDATE admins SET name='$name', family='$family', username='$username', level='$level' WHERE id='$id'";
			$conn->query($sql);
			header("location:showAdmin.php");
	}
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>بروزرسانی مدیر</title>
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
						if($flag==1){
							echo('<div class="alert bg-danger text-light text-center">'.$msg.'</div>');
						}elseif($flag==2){
							echo('<div class="alert bg-success text-center text-light">'.$msg.'</div>');
						}
							
						?>
						<div class="px-5 py-4 ">
							<?php
								include("includes/ConnectionToDB.php");
								$id=$_GET['id'];
								$sql="SELECT * FROM admins WHERE id='$id'";
								$result=$conn->query($sql);
								
								if($result->num_rows>0){
									while($row = $result->fetch_assoc()){
								
							?>
							<form method="post" action="">
								<h4 class="text-center">بروزرسانی اطلاعات مدیران</h4>
								<div class="row text-right">
									<div class="col-md-6 pt-3">
										<label>نام :</label>
										<input type="text" name="name" class="form-control" value="<?php echo($row['name']) ?>">
									</div>
									<div class="col-md-6 pt-3">
										<label>نام خانوادگی : </label>
										<input type="text" name="family" class="form-control" value="<?php echo($row['family']) ?>">
									</div>
									<div class="col-md-6 pt-3">
										<label>نام کاربری :</label>
										<input type="text" name="username" class="form-control" value="<?php echo($row['username']) ?>">
									</div>
									<div class="col-md-6 pt-3">
										<label>سطح مدیریت : </label>
										<select class="form-control" name="level">
											<option value="<?php echo($row['level']) ?>"><?php echo($row['level']) ?></option>
											<option value="مدیرارشد">مدیر ارشد</option>
											<option value="مدیر">مدیر</option>
											<option value="سرپرست">سرپرست</option>
											<option value="حسابدار">حسابدار</option>
										</select>	
									</div>
								</div>
								<div class="text-center p-4">
									<input type="submit" value="ثبت مدیر" name="submit" class="btn btn-success">
									<input type="reset" value="بازنشانی مقادیر" name="reset" class="btn btn-warning">
								</div>
							</form>
							<?php
									}
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
