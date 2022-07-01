<?php
	include("includes/checkAdminLogin.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>پنل مدیریت </title>
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

<body style="direction: rtl;overflow-x: hidden;">
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
						
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
