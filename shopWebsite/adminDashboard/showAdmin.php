<?php
include("includes/checkAdminLogin.php");
$flag=0;
if(isset($_GET['deleteRecord'])){
	$id=$_GET['id'];
	include("includes/ConnectionToDB.php");
	$sql="DELETE FROM admins WHERE id='$id'";
	$conn->query($sql);
	if($sql){
		$flag=1;
		$msg="مدیر مورد نظر با موفقیت حذف شد!";
	}                                                                                                                                                                                                                                                 
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>مشاهده مدیران</title>
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
					<div class="col-md-12 pt-3">
						<?php
							if($flag==1){
								echo('<div class="alert bg-success text-center text-light timeoutText">'.$msg.'</div>');
								//header("Refresh:0");
							}
						?>
						
						<table class="table table-striped text-dark text-center" style="font-size: 20px;">
							<tbody>
								<tr>
									<td style="width: 5px;">ردیف</td>
									<td>نام</td>
									<td>نام خانوادگی</td>
									<td>نام کاربری</td>
									<td>کلمه عبور</td>
									<td>سطح مدیریت</td>
									<td>وضعیت</td>
								</tr>
								<?php
									$i=1;
									include("includes/ConnectionToDB.php");
									$sql="SELECT * FROM admins ORDER BY name";
									$result=$conn->query($sql);
								
									
								if($result->num_rows>0){
									while($row=$result->fetch_assoc()){
									
								?>
								<tr>
									<td><?php echo $i++; ?></td>
									<td><?php echo $row["name"]; ?></td>
									<td><?php echo $row["family"]; ?></td>
									<td><?php echo $row["username"]; ?></td>
									<td><?php echo $row["password"]; ?></td>
									<td><?php echo $row["level"]; ?></td>
									<td>
										<form method="GET" action="">
											<input type="hidden" value="<?php echo $row["id"] ?>" name="id">
											
											<button type="submit" name="deleteRecord" class="btn btn-danger pull-left btn-sm" title="حذف"><i class="fa fa-trash-o " style="font-size:24px"></i></button>
										</form>
										
										<form method="GET" action="updateAdmin.php">
											<input type="hidden" value="<?php echo $row['id'] ?>" name="id">
											
											<button type="submit" name="updateRecord" class="btn btn-info pull-right btn-sm" title="بروزرسانی"><i class="fa fa-edit" style="font-size:24px"></i></button>
										</form>
									</td>
								</tr>
								<?php
									}
								}
								
									
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
