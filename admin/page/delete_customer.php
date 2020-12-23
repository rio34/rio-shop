<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../alert/css/sweetalert.css">
</head>
<body>
	<?php
	include '../dbconfig.php';
	$getid = $_GET['hapus'];

	$cekimage = "select * from customer WHERE c_id='$getid'";
	$run = mysqli_query($connect,$cekimage);
	$row = mysqli_fetch_array($run);
	$image = $row['c_image'];

	$sql = "DELETE FROM customer WHERE c_id='$getid'";
	$result=mysqli_query($connect,$sql);
	if ($result){ 
		if ($image !== "default.png" AND $image !== "") {
			unlink('../../images/user_images/'.$image);
		}
	  	echo "
		  <script type='text/javascript'>
			setTimeout(function () { 	
				swal({
					title: 'Data berhasil dihapus',
					text:  '',
					type: 'success',
					timer: 3000,
					showConfirmButton: true
				});		
			},10);	
			window.setTimeout(function(){ 
				window.location.replace('customer.php');
			} ,3000);	
		  </script>";
	}else{
		echo "
		  <script type='text/javascript'>
			setTimeout(function () { 	
				swal({
					title: 'Error',
					text:  '',
					type: 'warning',
					timer: 3000,
					showConfirmButton: true
				});		
			},10);	
			window.setTimeout(function(){ 
				window.location.replace('customer.php');
			} ,3000);	
		  </script>";
	}
	?> 
	<script src="../alert/js/sweetalert.min.js"></script>
	<script src="../alert/js/qunit-1.18.0.js"></script>
</body>
</html>
