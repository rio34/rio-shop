<?php 
include '../dbconfig.php';
$id = ($_SESSION['admin']);
if(!$_SESSION['admin']){
	header("Location: ../login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="icon" type="image/png" href="images/logo.png">
	<title>RIO-SHOP</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<script language="JavaScript">
  function disableEnterKey(e){
    var keycode;
    if (window.event) {
      keycode = window.event.keyCode;
    }else{
      key = e.witch;
    }
    if (window.event.keyCode == 13 ) {
      return false;
    }else{
      return true;
    }
  }
</script>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><i><span>RIO</span></i>-SHOP</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
        <img src="images/logo.png" class="img-thumbnail" alt="">
			</div>
			<div class="profile-usertitle">
				<?php
        		$data = mysqli_query($connect, "SELECT * FROM admin WHERE id = '$id'");
		    		while($row = mysqli_fetch_array($data)){
        		?>
				<div class="profile-usertitle-name"><?php echo $row['username']; ?></div>
				<?php } ?>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li><a href="index.php"><em class="fa fa-home">&nbsp;</em> Admin</a></li>
			<li><a href="kategori.php"><em class="fa fa-list-alt">&nbsp;</em> Kategori</a></li>
			<li><a href="brand.php"><em class="fa fa-bitbucket">&nbsp;</em> Brands</a></li>
			<li><a href="produk.php"><em class="fa fa-product-hunt">&nbsp;</em> Products</a></li>
			<li><a href="customer.php"><em class="fa fa-automobile">&nbsp;</em> Customers</a></li>
			<li><a href="../logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Data Kategori</li>
				<li class="active">Tambah Kategori</li>
			</ol>
		</div><!--/.row-->

		<div class="col-sm-9 col-sm-offset-1 col-lg-10 col-lg-offset-1 main">
        
        <h3>Tambah Data Kategori</h3>
        
        <form class="form-horizontal"  method="post" action="t_kategori.php" onkeypress="return disableEnterKey(event)">
          <div class="form-group">
            <label for="nama_kategori" class="col-lg-3 control-label">Nama Kategori:</label>
            <div class="col-lg-8">
              <input name="kategori" class="form-control" type="text" value="" placeholder="Masukkan nama brand" required="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" name="kirim" class="btn btn-primary">
              <a href="kategori.php" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i> Back</a>
            </div>
          </form>
      	  </div>
          <div class="col-sm-12">
			<br/><br/>
			<p class="back-link">Modified by &copy; Rio Bagas Pamungkas</a></p>
		  </div>

		</div><!--/.row-->
	</div><!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script type="text/javascript">
        $(function () {
           	$('#tanggal').datepicker();
        });
    </script>
</body>
</html>