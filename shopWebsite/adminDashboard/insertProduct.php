<?php
include("includes/checkAdminLogin.php");
	$uploadOk = 1;
	$msg="";
	if(isset($_POST["submit"])){
		$title=$_POST["title"];
		$price=$_POST["price"];
		$discount=$_POST["discount"];
		$qty=$_POST["qty"];
		$description=$_POST["description"];
		
		if($title=="" || $price==""){
			$uploadOk = 0;
			$msg="فیلد های ضروری را پر کنید!<br>";
		}
		
		$target_dir = "img/uploads/product/";
		$target_file = $target_dir . basename($_FILES["productPic"]["name"]);
		
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		
		if(empty($qty)){
			$qty=0;	
		}
		
		if($imageFileType!="jpg" && $imageFileType!="png" && $imageFileType!="jpeg" && $imageFileType!="gif"){
			$msg.="فقط فایل هایی با پسوند jpg, jpeg, png و gif مورد قبول است!<br>";
			$uploadOk=0;
		}
		
		if ($_FILES["productPic"]["size"] > 1000000) {
			$msg.="حجم فایل بیشتر از 1 مگابایت است!<br>";
			$uploadOk = 0;
			}
			
		if (!preg_match('/^[0-9]*$/', $qty) && !preg_match('/^[0-9]*$/', $price) && !preg_match('/^[0-9]*$/', $discount)){
        	$uploadOk = 0;
			$msg="موجودی در انبار ,قیمت محصول و تخفیف محصول باید مقدار عددی باشد!<br>";
    	}
		
		if($uploadOk==1){
		
		include('includes/ConnectionToDB.php');
		
		$sql="INSERT INTO product(title,price,discount,qty,description) VALUES ('$title','$price','$discount','$qty','$description')";
		$result=$conn->query($sql);
			
		if($result){
		$target_file=$target_dir . $conn->insert_id . '.' .$imageFileType;
		move_uploaded_file($_FILES["productPic"]["tmp_name"], $target_file);
			
		$uploadOk=2;
		$msg="محصول جدید با موفقیت اضافه شد";
		}else{
			$uploadOk=0;
			$msg="در درج محصول خطایی رخ داده!";
		}
	}
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>افزودن محصول</title>
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
								<h4 class="text-center">افزودن محصول جدید</h4>
								<div class="row text-right">
									<div class="col-md-6 pt-3">
										<label><span style="color: red;">*</span>عنوان محصول :</label>
										<input type="text" name="title" class="form-control">
									</div>
									<div class="col-md-6 pt-3">
										<label><span style="color: red;">*</span>قیمت محصول : </label>
										<input type="text" name="price" class="form-control">
									</div>
									<div class="col-md-6 pt-3">
										<label>قیمت محصول با تخفیف :</label>
										<input type="text" name="discount" class="form-control">
									</div>
									<div class="col-md-6 pt-3">
										<label>تعداد موجودی در انبار : </label>
										<input value="0" type="text" name="qty" class="form-control">
									</div>
									<div class="col-md-6 pt-3">
										<label>بارگذاری تصویر محصول : </label>
										<input type="file" name="productPic" class="form-control" id="fileUpload">
									</div>
									<div class="col-md-6 pt-3">
										<label>توضیحات محصول : </label>
										<textarea class="form-control" rows="5" name="description"></textarea>
									</div>
									
								</div>
								<div class="text-center p-4">
									<input type="submit" value="ثبت محصول" name="submit" class="btn btn-success">
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
