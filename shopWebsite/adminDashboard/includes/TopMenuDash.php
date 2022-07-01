
<div class="col-md-4 py-4 text-right">
	<i class="fa fa-search searchIconPos" style="font-size:24px"></i>
	<input class="searchBox p-2 text-white px-2" type="text" placeholder="جستجو...">
</div>
<div class="col-md-4">
					
</div>
<div class="col-md-4 pt-4 px-4">
	<div class="userBT py-1 text-center">
		<label class="px-1">خوش امدید ,<?php echo("{$_SESSION["nameAndFamily"]}") ?></label>
		<?php
			include("ConnectionToDB.php");
			$sql="SELECT * FROM admins";
			$result=$conn->query($sql);

			if($result->num_rows>0){		
				$imgUrl="img\\uploads\\admins\\";
				$imgUrl .= $_SESSION['userId'] . ".png";
		?>
		<img style="height: 50px;width: 50px;border-radius: 50%;" src="<?php echo($imgUrl) ?>">
		<?php
				
			}
			?>
<!--		<i class="fa fa-user-circle px-1 py-1" style="font-size:36px;"></i>-->
	</div>
</div>