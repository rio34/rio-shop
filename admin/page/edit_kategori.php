<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../alert/css/sweetalert.css">
</head>
<body>
	<?php
	include '../dbconfig.php';
	if (isset($_POST['update'])) {
		$getid = $_POST['getid'];
		$kategori = $_POST['kategori'];
		// eksekusi
		$sqlupdate = "update category set name='$kategori' where id='$getid'";
		if (mysqli_query($connect,$sqlupdate)) {
			echo "
		  <script type='text/javascript'>
			setTimeout(function () { 	
				swal({
					title: 'Data Berhasil diubah',
					text:  '',
					type: 'success',
					timer: 3000,
					showConfirmButton: true
				});		
			},10);	
			window.setTimeout(function(){ 
				window.location.replace('kategori.php');
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
					window.location.replace('kategori.php');
				} ,3000);	
			  </script>";
		}
	}
	?> 
	<script src="../alert/js/sweetalert.min.js"></script>
	<script src="../alert/js/qunit-1.18.0.js"></script>
</body>
</html>
