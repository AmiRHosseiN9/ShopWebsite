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
	<style>
	#grad1{
		background-image: linear-gradient(to right, rgba(255,0,0,0), rgba(140, 20, 252,1));
		}
	#grad2{
		background-image: linear-gradient(to right, rgba(255,0,0,0), rgba(140, 20, 252,1));
		}
	</style>
</head>

<body dir="rtl" style="overflow-x: hidden;">
	<!-- header صفحه -->
	<div class="navbar text-right bg-light">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3">
					<a class="navbar-brand text-center pt-2" href="#">
						<img src="img/pc-shop-1.png" style="width: 30%;height: 20%;">
					</a>
				</div>
				
				<div class="col-md-6">
					<div class="text-center">
						<i class="fa fa-search" style="font-size:20px;position: absolute;left:155px;top:15px;"></i>
						<input class="p-2 text-white text-right" type="text" placeholder="جستجو..." style="background-color:rgba(231,231,231,1.00);border-radius: 30px;width: 60%;border: 5px solid rgb(247, 247, 247);">
					</div>
				</div>
				
				<div class="col-md-3 text-left">
					<a href="signUp.php">
						<i class="fa fa-user-circle pl-5 pt-2" style="font-size:35px;color:rgba(86,158,164,1.00);"></i>
					</a>
				</div>
				
			</div>
		</div>
		<div class="col-md-12">
	<nav class="navbar navbar-expand-sm text-right p-0 mt-3">
		<ul class="navbar-nav" style="">
			<li class="nav-item">
				<a class="nav-link text-dark" href="index.html">صفحه اصلی</a>
			</li>
			
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle text-dark" href="#"
				   id="navbardrop" data-toggle="dropdown">محصولات</a>
				<div class="dropdown-menu bg-light text-center text-dark">
					<a href="#" class="dropdown-item text-dark">پر فروش</a>
					<a href="#" class="dropdown-item text-dark">تخفیف دار</a>
					<a href="#" class="dropdown-item text-dark">جدیدترین ها</a>
				</div>
			</li>
			
			<li class="nav-item">
				<a class="nav-link text-dark" href="loginIndex.php">ورود</a>
			</li>
			
			<li class="nav-item">
				<a class="nav-link text-dark" href="signUp.php">ثبت نام</a>
			</li>
			
			<li class="nav-item">
				<a class="nav-link text-dark" href="#">درباره ما</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-dark" href="adminDashboard/login.php">ورود به پنل مدیریت</a>
			</li>
		</ul>	
	</nav>
			</div>
  </div>	
	
	<!--محصولات پیشنهادی بالا -->
	<div class="px-3 py-1">
		<div class="widthimg">
		<div class="row">
			<div class="col-md-3">
				<div class="row p-2 ">
					<div class="col-md-12 p-2">
						<img src="img/suggestion-1.jpg">
					</div>
					<div class="col-md-12 p-2">
						<img src="img/suggestion-2.jpg">
					</div>
					<div class="col-md-12 p-2">
						<img src="img/suggestion-3.jpg">
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-12 p-2">
						<img class="heightimg" src="img/desktop-1.jpg">
					</div>
				</div>
<!--
				<div class="widthimg row pb-2">
					<div class="col-3">
						<img src="img/cat_medium_1.jpg">
					</div>
					<div class="col-3">
						<img src="img/cat_medium_2.jpg">
					</div>
					<div class="col-3">
						<img src="img/cat_medium_3.jpg">
					</div>
					<div class="col-3">
						<img src="img/cat_medium_4.jpg">
					</div>
				</div>
-->
			</div>
		</div>
		</div>
	</div>
	
	<!-- کادر محصولات پر فروش-->
 	<div class="bordering mx-1">
	  <div class="text-right p-2 text-light" id="grad1">پرفروش ها</div> 
	<div class="pb-2">
		<div class="row px-3">
			
			<?php
			$i=0;
			include("adminDashboard/includes/ConnectionToDB.php");
			$sql="SELECT * FROM product";
			$result=$conn->query($sql);

			if($result->num_rows>0){
				while($row = $result->fetch_assoc()){		
			?>
			<div class="col-md-3">	
				<div class="card">
					<?php
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
					<form action="proDescription.php" method="get">
					<img class="img-thumbnail" style="height: 250px;width:100%;" src="<?php echo($imgUrl) ?>">
					<div class="p-1">
						<h5 class="text-center"><?php echo($row['title']) ?></h5>
						<p class="text-right">
							
						</p>
						<?php
							if($row['discount']=="" || $row['discount']=="0"){
							 echo('<h5 class="text-center">قیمت '.$row['price']).' تومان</h5>'; 
							}else{
								echo('<del class="text-center text-danger pl-5
								ml-3">قیمت '.$row['price']).' تومان</del>';
							}
						?>
						<?php
						if($row['discount']=="" || $row['discount']=="0"){
							echo('<br>');
						}else{
						echo('<h5 class="text-center">قیمت '.$row['discount']).' تومان</h5>';
						}
						?>
					</div>
						<br>
						
						<div class="text-center pb-2" >
							<input type="hidden" value="<?php echo $row['id'] ?>" name="id">
							<input type="submit" name="submit" value="خرید" class="btn btn-success">
						</div>
					</form>
				</div>
			</div>
			<?php 
				}
			}
			?>
			
		</div>
		
	</div> 
  </div>
	
	<!-- دو عکس بین محصولات -->
	<div class="row text-center py-3 TwoSugest">
		<div class="col-md-6">
			<img src="img/cat_medium_1.jpg">
		</div>
		<div class="col-md-6">
			<img src="img/cat_medium_3.jpg">
		</div>
	</div>
	
	<!-- کادر محصولات جدید -->
	<div class="bordering mx-1">
	  <div class="text-right p-2" id="glad2" >جدید ترین ها</div> 
	<div class="pr-5 pl-5 pb-3">
		<div class="row">		
			<div class="col-md-3">
				
				<div class="card">
					<img class="img-thumbnail" src="img/MOREFUN-INT/KARTKHAN/ANDROYD/MoreFun MF919 ORANG/2-3.jpg">
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
	  
  </div>
	
	<!-- دو عکس پایین صفحه و توضیحات آنها-->
	<div>
		<div class="p-5">
		  <div class="row text-right">
		  		<div class="col-md-6 ">
			  		<p>سایت فروش لوازم الکترونیکی با پشتیبانی 24/7 خرید خوبی را برای شما به ارمغان می آورد.</p>
					<p class="btn-danger inlineText p-2">پشتیبانی سریع</p>
					<p class="btn-info inlineText p-2">آماده در 24 ساعت شبانه روز</p>
					<p class="inlineText p-2 btn-success">خدمات بعد از خرید</p>
					<p class="inlineText p-2 btn-warning">گارانتی 1 ساله بی قید و شرط</p>
			  	</div>
			  	<div class="col-md-6 pt-5">
			  		<img class="imgSize1" src="img/img13.jpg">
					<img class="imgSize2 img-thumbnail" src="img/bigSuporterPic.jpg">
			  	</div>
		  </div>	
	  </div>
	</div>

	<!--footer -->
	<div class="bordering2 text-right">
		<div class="bg-warning text-center p-3">
			برای دریافت اطلاعات بیشتر با شماره <span style="border-radius: 50px;" class="bg-dark text-light p-2 mx-2"> 0987456321 در واتساپ در تماس باشید. </span> 
		</div>
		<div class="row ">
			<div class="col-md-3">
				<div class="text-center p-3">
					<img src="img/download.png" style="width: 30%;">
					<p>
						<h5>آدرس فروشگاه ما</h5>
							<p>
								سبزوار خیابان حکیم ,کوچه حکیم 24 ,پلاک 30
							</p>
					</p>
				<hr>
					<p>
						<h6>مارا در شبکه های اجتماعی دنبال کنید.</h6>
						<a href="#"><i class="fa fa-instagram px-1"></i></a>
						<a href="#"><i class="fa fa-telegram px-1"></i></a>
						<a href="#"><i class="fa fa-facebook px-1"></i></a>
					</p>
				</div>
			</div>
			<div class="col-md-7" style="border-left: 1px solid #000000; border-right:1px solid #000000;">
				<div class="row footerUl">
					<div class="col-md-4 ">
						<div class="text-center p-5">
							<h4>اکانت</h4>
							<hr>
							<ul>
								<li>اکانت من</li>
								<li>علاقه مندیها</li>
								<li>لیست سفارشات</li>
							</ul>
						</div>
					</div>
					<div class="col-md-4">
						<div class="text-center p-5">
							<h4>خدمات</h4>
							<hr>
							<ul>
								<li>سیاست حریم خصوصی</li>
								<li>درباره فروشگاه</li>
								<li>قوانین</li>
							</ul>
						</div>
					</div>
					<div class="col-md-4">
						<div class="text-center p-5">
							<h4>اطلاعات تماس</h4>
							<hr>
							<ul>
								<li>شماره همراه : 0987456321</li>
								<li>آدرس ایمیل : shop@gmail.com</li>
								<li>کد پستی : 896541</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<div class="text-center p-5">
					<img src="img/eetbar.png" style="width: 100%;">
				</div>
			</div>
		</div>
		<div class="bg-dark text-light text-center">
			طراحی شده توسط گروه ****
			<i class="fa fa-copyright"></i>
		</div>
	</div>
	<script>
		function RightSlide(){
			document.getElementById("MenuLeft").style.position.right="2500px";
			
		}
	</script>
</body>
</html>
