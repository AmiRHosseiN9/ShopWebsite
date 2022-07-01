<?php
include("includes/checkAdminLogin.php");
$flag=0;
if(isset($_GET['deleteRecord'])){
	$id=$_GET['id'];
	include("includes/ConnectionToDB.php");
	$sql="DELETE FROM product WHERE id='$id'";
	$conn->query($sql);
	if($sql){
		$flag=1;
		$msg="محصول مورد نظر با موفقیت حذف شد!";
	}                                                                                                                                                                                                                                                 
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>مشاهده محصولات</title>
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
								
							}
						?>
						
						<table class="table table-striped text-dark text-center" style="font-size: 20px;">
							<tbody>
								<tr>
									<td>ردیف</td>
									<td>عنوان محصول</td>
									<td>قیمت محصول</td>
									<td>قیمت محصول با تخفیف</td>
									<td>تعداد موجودی در انبار </td>
									<td>توضیحات محصول</td>
									<td>وضعیت</td>
								</tr>
								<?php
									$i=1;
									include("includes/ConnectionToDB.php");
									$sql="SELECT * FROM product ORDER BY title";
									$result=$conn->query($sql);
								
									
								if($result->num_rows>0){
									while($row=$result->fetch_assoc()){
									
								?>
								<tr>
									<td><?php echo $i++; ?></td>
									<td><?php echo $row["title"]; ?></td>
									<td><?php echo $row["price"]; ?></td>
									<td><?php
										if($row['discount']=="" || $row['discount']=="0"){
											 echo('<i class="fa fa-times" style="font-size:48px;color:red"></i>');
										}else{
											echo $row["discount"];
										}
										?></td>
									<td><?php echo $row["qty"]; ?></td>
									<td><?php
										if($row['description']=="" || $row['description']=="0"){
											 echo('<i class="fa fa-times" style="font-size:48px;color:red"></i>');
										}else{
											echo $row["description"];
										} 
										
										?></td>
									<td>
										<form method="GET" action="">
											<input type="hidden" value="<?php echo $row["id"] ?>" name="id">
											
											<button type="submit" name="deleteRecord" class="btn btn-danger pull-left btn-block" title="حذف"><i class="fa fa-trash-o " style="font-size:24px"></i></button>
										</form>
										
										<form method="GET" action="updateAdmin.php">
											<input type="hidden" value="<?php echo $row['id'] ?>" name="id">
											
											<button type="submit" name="updateRecord" class="btn btn-info pull-right btn-block mt-1" title="بروزرسانی"><i class="fa fa-edit" style="font-size:24px"></i></button>
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
