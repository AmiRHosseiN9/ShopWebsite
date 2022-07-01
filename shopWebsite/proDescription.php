<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
<title>صفحه اصلی</title>
	<link href="styles/bt4.css" rel="stylesheet" type="text/css">
	<link href="styles/bootstrap.css" rel="stylesheet">
	
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://kit.fontawesome.com/572c1de7b9.js" crossorigin="anonymous"></script>
	<link href="styles/product_slideButton.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="styles/indexCss.css" rel="stylesheet" type="text/css">
</head>

<body dir="rtl" style="overflow-x: hidden;" class="bg-light">
	<?php
		include("admindashboard/includes/headerIndex.php");
	?>
	<div class="my-4 text-right" style="background-color:rgba(255,255,255,1.00);border-radius: 15px;margin:0px 100px;">
		<div class="row text-right p-3">
			<div class="col-md-4 py-5 px-5" style="border-left: 2px solid rgba(223,223,223,1.00);">
				<?php
					include("admindashboard/includes/ConnectionToDB.php");
					$id=$_GET['id'];
					$sql="SELECT * FROM product WHERE id='$id'";
					$result=$conn->query($sql);
								
					if($result->num_rows>0){
						while($row = $result->fetch_assoc()){	
							
					$imgUrl="adminDashboard\\img\\uploads\\product\\";
						if (file_exists($imgUrl . $row['id'] . ".jpg")) {
							$imgUrl .= $row['id'] . ".jpg";
						}else if (file_exists($imgUrl . $row['id'] . ".png")) {
							$imgUrl .= $row['id'] . ".png";
						}else if (file_exists($imgUrl . $row['id'] . ".jpeg")) {
							$imgUrl .= $row['id'] . ".jpeg";
						}else{
							$imgUrl .= "No-Photo-Available.jpg";
						}
					
				?>
				
				<img src="<?php echo($imgUrl) ?>" style="width: 90%;height: 100%;">
			</div>
		
			<div class="col-md-4" style="border-left: 2px solid rgba(223,223,223,1.00);">
				
				<div class="p-3">
					<h4 class="text-center"><?php echo($row['title']) ?></h4>
					<h5 class="pt-3">توضیحات محصول :</h5>
					<p class="pt-3"><?php echo($row['description']) ?></p>
				</div>	
			</div>
		
			<div class="col-md-4">
				<div class="text-left p-3">
					<span class="fa fa-star text-warning"></span>
					<span class="fa fa-star text-warning"></span>
					<span class="fa fa-star text-warning"></span>
					<span class="fa fa-star text-warning"></span>
					<span class="fa fa-star text-warning"></span>
				</div>
				<h5>کد کالا : </h5>
				<h5>موجودی محصول :<?php
						if($row['qty']=="" || $row['qty']=="0"){
							echo(' ناموجود  </h5>');
						}else{
							echo(' موجود </h5>');
						}
					?> 
					
			<hr class="bg-light">
				
				<div class="py-2 px-3" style="background-color:rgba(231,231,231,1.00);border-radius: 8px;">
					<p>گارانتی : </p>
					<h5>قیمت : </h5>
					<h5 class="text-left"> 
					<?php
						if($row['discount']=="" || $row['discount']=="0"){
							 echo($row['price']);
						}else{
							echo($row['discount']);
						}
					?>
					تومان</h5>
					<?php 
						if($row['discount']=="" || $row['discount']=="0"){
							
						}else{
							echo('<h5 class="text-danger text-left">با تخفیف</h5>');
						}
						}
					}
					?>
					
					<div class="px-5 py-2 mt-4 text-center" style="background-color:rgba(86,158,164,1.00);border-radius: 5px;">
					افزودن به سبد خرید
				</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="mt-5 text-right" style="background-color:rgba(255,255,255,1.00);border-radius: 15px;margin:0px 100px;">
		<div>
			<p class="p-2" style="font-size:20px;">محصولات پیشنهادی</p>
		</div>
		<hr>
		<div class="row pt-0 p-2">		
			<div class="col-md-3">
				
				<div class="card">
					<img class="" src="img/MOREFUN-INT/KARTKHAN/ANDROYD/MoreFun MF919 ORANG/2-3.jpg">
					<div class="p-1">
						<h5 class="text-right">کارتخوان اندرویدی</h5>
						<p class="text-right">
							کارتخوان اندرویدی با قیمت مناسب
						</p>
						<del>
							<h6 class="text-center text-danger">قیمت 2,600,000</h6>
						</del>
						<h5 class="text-center">قیمت 2,000,000</h5>
					</div>
						<br>
						
						<div class="text-center pb-2" >
							<a href="" class="btn btn-success">خرید</a>
						</div>
				</div>
			</div>
			<div class="col-md-3">
				
				<div class="card">
					<img class="" src="img/MOREFUN-INT/KARTKHAN/ANDROYD/MoreFun MF919 ORANG/2-3.jpg">
					<div class="p-1">
						<h5 class="text-right">کارتخوان اندرویدی</h5>
						<p class="text-right">
							کارتخوان اندرویدی با قیمت مناسب
						</p>
						<del>
							<h6 class="text-center text-danger">قیمت 2,600,000</h6>
						</del>
						<h5 class="text-center">قیمت 2,000,000</h5>
					</div>
						<br>
						
						<div class="text-center pb-2" >
							<a href="" class="btn btn-success">خرید</a>
						</div>
				</div>
			</div>
			<div class="col-md-3">
				
				<div class="card">
					<img class="" src="img/MOREFUN-INT/KARTKHAN/ANDROYD/MoreFun MF919 ORANG/2-3.jpg">
					<div class="p-1">
						<h5 class="text-right">کارتخوان اندرویدی</h5>
						<p class="text-right">
							کارتخوان اندرویدی با قیمت مناسب
						</p>
						<del>
							<h6 class="text-center text-danger">قیمت 2,600,000</h6>
						</del>
						<h5 class="text-center">قیمت 2,000,000</h5>
					</div>
						<br>
						
						<div class="text-center pb-2" >
							<a href="" class="btn btn-success">خرید</a>
						</div>
				</div>
			</div>
			<div class="col-md-3">
				
				<div class="card">
					<img class="" src="img/MOREFUN-INT/KARTKHAN/ANDROYD/MoreFun MF919 ORANG/2-3.jpg">
					<div class="p-1">
						<h5 class="text-right">کارتخوان اندرویدی</h5>
						<p class="text-right">
							کارتخوان اندرویدی با قیمت مناسب
						</p>
						<del>
							<h6 class="text-center text-danger">قیمت 2,600,000</h6>
						</del>
						<h5 class="text-center">قیمت 2,000,000</h5>
					</div>
						<br>
						
						<div class="text-center pb-2" >
							<a href="" class="btn btn-success">خرید</a>
						</div>
				</div>
			</div>
		
		</div>	
	</div>
	
	<div class="mt-4 text-right" style="background-color:rgba(255,255,255,1.00);border-radius: 15px;margin:0px 100px;">
		<div class="row py-2">
			<div class="col-md-2">
				<a href="#" style="text-decoration-line: none;color:rgba(94,94,94,1.00);"><h5 class="pr-3">توضیحات محصول</h5></a>
			</div>
			<div class="col-md-2">
				<a href="#" style="text-decoration-line: none;color:rgba(94,94,94,1.00);"><h5 class="pr-3">مشخصات فنی</h5></a>
			</div>
			<div class="col-md-2">
				<a href="#" style="text-decoration-line: none;color:rgba(94,94,94,1.00);"><h5 class="pr-3">نقد کاربران</h5></a>
			</div>
			<div class="col-md-2">
				<a href="#" style="text-decoration-line: none;color:rgba(94,94,94,1.00);"><h5 class="pr-3">پرسش و پاسخ</h5></a>
			</div>
		</div>
	</div>
	

	<div class="my-3 text-right" style="background-color:rgba(255,255,255,1.00);border-radius: 15px;margin:100px;height: 500px;">
		
	</div>
	
</body>
</html>


