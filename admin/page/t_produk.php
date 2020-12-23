<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../alert/css/sweetalert.css">
</head>
<body>
	<?php
	include '../dbconfig.php';
	if(isset($_POST['kirim'])){
		$name = $_POST['p_name'];
		$cat = $_POST['p_cat'];
		$sub = $_POST['p_sub'];
		$brand = $_POST['p_brand'];
		$price = $_POST['p_price'];
		$desc = addslashes($_POST['p_desc']);
		$qty = $_POST['p_qty'];
		$image = $_FILES['image']['name'];
	    $tmp_image = $_FILES['image']['tmp_name'];
		
		$insert = "insert into product(p_name,p_category,p_sub,p_brand,p_price,p_desc,p_qty,p_image) VALUES('$name','$cat','$sub','$brand','$price','$desc','$qty','$image')";
		$run = mysqli_query($connect,$insert);
		if($run){
			move_uploaded_file($tmp_image,"../images/$image");
			echo "
			  <script type='text/javascript'>
				setTimeout(function () { 	
					swal({
						title: 'Data berhasil ditambah',
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
	} ?> 
	<script src="../alert/js/sweetalert.min.js"></script>
	<script src="../alert/js/qunit-1.18.0.js"></script>
</body>
</html>
