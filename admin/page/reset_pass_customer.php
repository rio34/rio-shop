<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
	<link rel="stylesheet" href="../alert/css/sweetalert.css">
</head>
<body>

	<?php
	include '../dbconfig.php';
	$getid = $_GET['id'];
	$new = 'admin';

	$sql = "update customer set c_pass='$new' where c_id='$getid'";

	if (mysqli_query($connect,$sql)) {
		echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Berhasil reset password',
				text:  'passswordnya adalah $new',
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
				title: 'Data Error',
				text:  '',
				type: 'warning',
				timer: 3000,
				showConfirmButton: true
			});		
		},10);	
		window.setTimeout(function(){ 
			window.location.replace('customer.php?');
		} ,3000);	
	  </script>";
		
	}

	?> 

	<script src="../alert/js/sweetalert.min.js"></script>
	<script src="../alert/js/qunit-1.18.0.js"></script>

</body>
</html>
