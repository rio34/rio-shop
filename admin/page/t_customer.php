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
		$uname = $_POST['name'];
		$email = $_POST['email'];
		$pass = $_POST['password'];
		$c_pass = $_POST['conf_password'];
		$image = $_FILES['image']['name'];
	    $tmp_image = $_FILES['image']['tmp_name'];
	    if($pass !== $c_pass){
			echo "<script>alert('Password anda tidak match, silahkan coba lagi!');history.go(-1);</script>";
		}else{
			$check = "select * from customer where c_email = '$email'";
			$run_check = mysqli_query($connect,$check);
			if(mysqli_num_rows($run_check) < 1){
				if ($image=='') {
					$insert = "insert into customer(c_session,c_name,c_email,c_pass,c_image) VALUES('$cookie_id','$uname','$email','$pass','default.png')";
				}else{
					$insert = "insert into customer(c_session,c_name,c_email,c_pass,c_image) VALUES('$cookie_id','$uname','$email','$pass','$image')";
					move_uploaded_file($tmp_image,"../../images/user_images/$image");
				}
				$run_insert = mysqli_query($connect,$insert);
				if($run_insert){
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
			}else{
				echo "
				  <script type='text/javascript'>
					setTimeout(function () { 	
						swal({
							title: 'Email Address already Registered !!!',
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
	} ?> 
	<script src="../alert/js/sweetalert.min.js"></script>
	<script src="../alert/js/qunit-1.18.0.js"></script>
</body>
</html>
