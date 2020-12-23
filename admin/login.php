<?php 
include 'dbconfig.php';
if(isset($_SESSION['admin'])){
    header("Location:index.php");
}
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $login = mysqli_query($connect, "SELECT * FROM admin WHERE username='$username' AND password='$password' LIMIT 1");
    if (mysqli_num_rows($login) > 0){
            $login_user = mysqli_fetch_array($login);
            $id_user = $login_user['id'];
            $_SESSION['admin'] = $id_user;
            header("Location:page/");
    } else {
            echo "<script>alert('Username atau Password yang dimasukkan salah')</script>";
        }
}
?>
<html>
<head>
    <link rel="icon" type="image/png" href="page/images/logo.png">
    <title>RIO-SHOP - Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="konten">
        <div class="kepala">
            <img src="page/images/lock.png" background-position="center" background-size="38px" display="inline-block" width="25px" height="25px" margin-top="8px" float="left" margin-right="10px" >
            <h2 class="judul">Sign In</h2>
        </div>
        <div class="artikel">
            <form id="login" method="post">
                <div class="grup">
                    <label for="email">Username</label>
                    <input type="text" name="username" autofocus="" required="" placeholder="Masukkan Username Anda">
                </div>
                <div class="grup">
                    <label for="password">Password</label>
                    <input type="password" name="password" required="" placeholder="Masukkan password Anda">
                </div>
                <div class="grup">
                    <input type="submit" name="login" value="Sign In">
                </div>
            </form>
        </div>
    </div>
</body>
</html>