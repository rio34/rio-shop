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
		$username = $_POST['username'];
		$sql="SELECT * FROM admin WHERE username = '$username'";
		$result=mysqli_query($connect,$sql);
		if (mysqli_num_rows($result)>0){ 
		  echo "
		  <script type='text/javascript'>
			setTimeout(function () { 
				swal({
		            title: 'Username sudah ada',
		            text:  '',
		            type: 'warning',
		            timer: 3000,
		            showConfirmButton: true
		        });		
			},10);	
			window.setTimeout(function(){ 
				window.location.replace('index.php');
			} ,3000);	
		  </script>";
		}else{
			// eksekusi
			$sqlupdate = "update admin set username='$username' where id='$getid'";
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
					window.location.replace('index.php');
				} ,3000);	
			  </script>";
			}else{
				echo "
				  <script type='text/javascript'>
					setTimeout(function () { 	
						swal({
							title: 'Error, data gagal diubah',
							text:  '',
							type: 'warning',
							timer: 3000,
							showConfirmButton: true
						});		
					},10);	
					window.setTimeout(function(){ 
						window.location.replace('index.php');
					} ,3000);	
				  </script>";
			}
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
						window.location.replace('index.php');
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
						window.location.replace('index.php');
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
