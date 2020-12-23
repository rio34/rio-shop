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
		$name = $_POST['name'];
		$email = $_POST['email'];
		$get_image = $_POST['getimage'];
		$image = $_FILES['image']['name'];
	    $tmp_image = $_FILES['image']['tmp_name'];
		if($image != ""){
			$sql = "update customer set c_name='$name', c_email='$email', c_image='$image' WHERE c_id='$getid'"; 
		    $run = mysqli_query($connect,$sql);
		    if ($get_image != "default.png") {
				unlink('../../images/user_images/'.$get_image);
		    }
		}else{
			$sql = "update customer set c_name='$name', c_email='$email' WHERE c_id='$getid'"; 
		    $run = mysqli_query($connect,$sql);
		}
		if($run){
			move_uploaded_file($tmp_image,"../../images/user_images/$image");
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
	}

	if (isset($_POST['update_pass'])) {
		$getid = $_POST['getid'];
		$getpasswordlama = $_POST['getpasswordlama'];
		$passwordlama = $_POST['passwordlama'];
		$password = $_POST['password'];
		$conf_password = $_POST['conf_password'];
		if($passwordlama == $getpasswordlama){
			if ($password == $conf_password) {
				$sql = "update admin set password='$password' where id='$getid'";
				if (mysqli_query($connect,$sql)) {
					echo "
				  <script type='text/javascript'>
					setTimeout(function () { 	
						swal({
							title: 'Password berhasil diubah',
							text:  'Passwordnya adalah $password',
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
							title: 'Error, gagal reset password',
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
			}else{
				echo "<script>alert('Password baru anda tidak match, silahkan coba lagi!');history.go(-1);</script>";
			}
		}else{
			echo "<script>alert('Password lama anda salah, silahkan coba lagi!');history.go(-1);</script>";
		}
	}
	?> 
	<script src="../alert/js/sweetalert.min.js"></script>
	<script src="../alert/js/qunit-1.18.0.js"></script>
</body>
</html>
