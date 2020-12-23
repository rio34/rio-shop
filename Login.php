<?php include "inc/header.php" ?>
<div class="container">
	<div class="row">
		<div class="col-sm-4 col-sm-offset-1">
			<div class="login-form"><!--login form-->
				<h2>Login to your account</h2>
				<form id="login-form" method="post" action="Login.php">
					<input type="email" name="useremail" placeholder="Useremail ID" required/>
					<input type="password" placeholder="Password" name="password" required/>
					<button type="submit" name="login" class="btn btn-default">Login</button>
				</form>
			</div><!--/login form-->
		</div>
		<div class="col-sm-1">
			<h2 class="or">OR</h2>
		</div>
		<div class="col-sm-4">
			<div class="signup-form"><!--sign up form-->
				<form id="register-form" action="Login.php" method="post">
					<h2>New User Signup!</h2>
					<input type="text" name="username" placeholder="Username" required/>
					<input type="email" name="email" placeholder="Email Address" required/>
					<input type="password" name="password" placeholder="Password" required/>
					<input type="password" name="confirm-password" placeholder="confirm-password" required/>
					<button type="submit" name="register" class="btn btn-default">Signup</button>
				</form>
			</div><!--/sign up form-->
		</div>
	</div>
</div>
<script>
	$(function() {
	    $('#login-form-link').click(function(e) {
			$("#login-form").delay(100).fadeIn(100);
	 		$("#register-form").fadeOut(100);
			$('#register-form-link').removeClass('active');
			$(this).addClass('active');
			e.preventDefault();
		});
		$('#register-form-link').click(function(e) {
			$("#register-form").delay(100).fadeIn(100);
	 		$("#login-form").fadeOut(100);
			$('#login-form-link').removeClass('active');
			$(this).addClass('active');
			e.preventDefault();
		});
	});
</script>
<?php
include "inc/footer.php";
if(isset($_POST['register'])){
	$uname = $_POST['username'];
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$c_pass = $_POST['confirm-password'];
	if($pass !== $c_pass){
	echo "<script>
        notif({
			msg:'Password doesnot match each other !!!',
			type:'error',
			width:330,
			height:40,
			timeout:3000,
		})
	</script>";
	}else{
		$check = "select * from customer where c_email = '$email'";
		$run_check = mysqli_query($con,$check);
		if(mysqli_num_rows($run_check) < 1){
			$insert_user = "insert into customer(c_session,c_name,c_email,c_pass,c_image) VALUES('$cookie_id','$uname','$email','$pass','default.png')";
			$run_insert = mysqli_query($con,$insert_user);
			if($run_insert){
				$_SESSION['email'] = $email;
				echo "<script>window.open('index.php?account','_self')</script>";
				exit();
			}
		}else{
			echo"<script>
	             notif({
					msg:'Email Address already Registered !!!',
					type:'warning',
					width:330,
					height:40,
					timeout:3000,
				})
			</script>";
		}
	}
}
if(isset($_POST['login'])){
	$useremail = $_POST['useremail'];
	$password = $_POST['password'];
	$check_user = "select * from customer where c_email ='$useremail' && c_pass='$password'";
	$run_user = mysqli_query($con,$check_user);
	if(mysqli_num_rows($run_user)==1){
		$_SESSION['email'] = $useremail;
		$update_session = "update customer set c_session='$cookie_id'";
		$run_update = mysqli_query($con,$update_session);
	    echo "<script>window.open('index.php?login','_self')</script>";
	}else{
		echo "<script>
		notif({
			msg:'Email or Password Incorrect !!!',
			type:'error',
			width:330,
			height:40,
			timeout:3000,
						
		})	
		setTimeout(function() { header('location:login.php') }, 1000);
		</script>";
	}
}
if(isset($_GET['wish'])){
	echo "<script>
		notif({
	        msg:'Please Login to view/add to wishlist !!',
			type:'info',
			width:330,
			height:40,
			timeout:2000,
		})
	</script>";
}
if(isset($_GET['change'])){
	echo "<script>
		notif({
	        msg:'Password has been Changed Successfully',
			type:'success',
			width:330,
			height:40,
			timeout:2000,
		})
	</script>";
}
?>