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
		$brand = $_POST['brand'];
		$sql = "update brand set title='$brand' where id='$getid'";
		$result=mysqli_query($connect,$sql);
		if ($result){ 
		  echo "
			  <script type='text/javascript'>
				setTimeout(function () { 	
					swal({
						title: 'Data berhasil diubah',
						text:  '',
						type: 'success',
						timer: 3000,
						showConfirmButton: true
					});		
				},10);	
				window.setTimeout(function(){ 
					window.location.replace('brand.php');
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
					window.location.replace('update_brand.php?edit=$getid');
				} ,3000);	
			  </script>";
		}
	}
	?> 
	<script src="../alert/js/sweetalert.min.js"></script>
	<script src="../alert/js/qunit-1.18.0.js"></script>
</body>
</html>
