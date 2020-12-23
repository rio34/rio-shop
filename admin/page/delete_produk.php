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

	$cekimage = "select * from product WHERE id='$getid'";
	$run = mysqli_query($connect,$cekimage);
	$row = mysqli_fetch_array($run);
	$image = $row['p_image'];

	$sql = "DELETE FROM product WHERE id='$getid'";
	$result=mysqli_query($connect,$sql);
	if ($result){ 
		unlink('../images/'.$image);
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
				window.location.replace('produk.php');
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
				window.location.replace('produk.php');
			} ,3000);	
		  </script>";
	}
	?> 
	<script src="../alert/js/sweetalert.min.js"></script>
	<script src="../alert/js/qunit-1.18.0.js"></script>
</body>
</html>
