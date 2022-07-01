<?php
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="shopwebsite_db";
		
	$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
	if($conn->connect_error){
		die("خطا در اتصال به دیتابیس");
	}
$conn->set_charset('utf8');
?>