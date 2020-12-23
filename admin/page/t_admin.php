<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
	<link rel="stylesheet" href="../alert/css/sweetalert.css">
</head>
<body>
	<?php
	include '../dbconfig.php';
	// menangkap data yang di kirim dari form
	if(isset($_POST['kirim'])){
		// menangkap data yang di kirim dari form
		$username = $_POST['username'];
		$password = $_POST['password'];
		$conf_password = $_POST['conf_password'];
		if ($password == $conf_password) {
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
				$sqltambah = "insert into admin(username, password) values('$username', '$password')";
				if (mysqli_query($connect,$sqltambah)) {
					echo "
				  <script type='text/javascript'>
					setTimeout(function () { 	
						swal({
							title: 'Data Berhasil ditambahkan',
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
								title: 'Error, data gagal ditambahkan',
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
		}else{
			echo "<script>alert('Password baru anda tidak match, silahkan coba lagi!');history.go(-1);</script>";
		}
	}
	 
	?> 
	<script src="../alert/js/sweetalert.min.js"></script>
	<script src="../alert/js/qunit-1.18.0.js"></script>

</body>
</html>
