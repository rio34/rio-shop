<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../alert/css/sweetalert.css">
</head>
<body>
	<?php
	include '../dbconfig.php';
	if(isset($_POST['update'])){
		$getid = $_POST['getid'];
		$name = $_POST['p_name'];
		$cat = $_POST['p_cat'];
		$sub = $_POST['p_sub'];
		$brand = $_POST['p_brand'];
		$price = $_POST['p_price'];
		$desc = addslashes($_POST['p_desc']);
		$qty = $_POST['p_qty'];
		$get_image = $_POST['getimage'];
		$image = $_FILES['image']['name'];
	    $tmp_image = $_FILES['image']['tmp_name'];
		if($image != ""){
			$sql = "update product set p_name='$name', p_category='$cat', p_sub='$sub', p_brand='$brand', p_price='$price', p_desc='$desc', p_qty='$qty', p_image='$image' WHERE id='$getid'"; 
		    $run = mysqli_query($connect,$sql);
			unlink('../images/'.$get_image);

		}else{
			$sql = "update product set p_name='$name', p_category='$cat', p_sub='$sub', p_brand='$brand', p_price='$price', p_desc='$desc', p_qty='$qty' WHERE id='$getid'"; 
		    $run = mysqli_query($connect,$sql);
		}
		if($run){
			move_uploaded_file($tmp_image,"../images/$image");
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
	}
	?> 
	<script src="../alert/js/sweetalert.min.js"></script>
	<script src="../alert/js/qunit-1.18.0.js"></script>
</body>
</html>
