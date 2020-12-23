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
        <li class="active">Data Customers</li>
        <li class="active">Edit Customers</li>
      </ol>
    </div><!--/.row-->

    <div class="col-sm-9 col-sm-offset-1 col-lg-10 col-lg-offset-1 main">
        
        <h3>Edit Nama Customers</h3>
        <?php 
        $edit = $_GET['edit'];
        $data = mysqli_query($connect, "SELECT * FROM customer WHERE c_id='$edit'");
        while($row = mysqli_fetch_array($data)){
        ?>
          <form class="form-horizontal"  method="post" action="edit_customer.php" enctype="multipart/form-data" onkeypress="return disableEnterKey(event)">
            <div class="form-group">
              <label for="name" class="col-lg-3 control-label">Name:</label>
              <div class="col-lg-8">
                <input name="getid" class="form-control" type="hidden" value="<?php echo $row['c_id']; ?>">
                <input name="name" class="form-control" type="text" value="<?php echo $row['c_name']; ?>" required="">
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="col-lg-3 control-label">Email:</label>
              <div class="col-lg-8">
                <input name="email" class="form-control" type="email" value="<?php echo $row['c_email']; ?>" required="">
              </div>
            </div>
            <div class="form-group">
              <label for="Jumlah" class="col-lg-3 control-label">Product Image:</label>
              <div class="col-lg-8">
                <input type="file" name='image'>
                <input type="hidden" name='getimage' value="<?php echo $row['c_image']; ?>">
                <img src="../../images/user_images/<?php echo $row['c_image']; ?>" width="250">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label"></label>
              <div class="col-md-8">
                <input type="submit" name="update" class="btn btn-primary">
            </div>
          </form>
          <br /><br /><br />
          <h4 class="card-title">Ganti Password</h4> 
          <form class="form-horizontal" method="post" action="edit_customer.php" onkeypress="return disableEnterKey(event)">
            <div class="form-group">
              <label for="password" class="col-lg-3 control-label">Password lama:</label>
              <div class="col-lg-8">
                <input name="getid" class="form-control" type="hidden" value="<?php echo $row['c_id']; ?>">
                <input type="hidden" name="getpasswordlama" value="<?php echo $row['c_pass']; ?>">
                <input name="passwordlama" class="form-control" type="password" value="" required="">
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="col-lg-3 control-label">Password baru:</label>
              <div class="col-lg-8">
                <input name="password" class="form-control" type="password" value="" required="">
              </div>
            </div>
            <div class="form-group">
              <label for="conf_password" class="col-lg-3 control-label">Konfirmasi password baru:</label>
              <div class="col-lg-8">
                <input name="conf_password" class="form-control" type="password" value="" required="">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label"></label>
              <div class="col-md-8">
                <input type="submit" name="update_pass" class="btn btn-primary">
                <a href="customer.php" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i> Back</a>
              </div>
            </div>
          </form>
          <br /><br /><br />
          <h4 class="card-title">Reset Password (admin)</h4> 
          <form class="forms-group">
            <div class="form-group">
              <label class="col-md-3 control-label"></label>
              <div class="col-md-8">
                <a data-href="reset_pass_customer.php?id=<?php echo $row['c_id']; ?>" data-toggle='modal' data-target='#reset_password' class="btn btn-success mr-2">Reset</a>
              </div>
            </div>
          </form>
        <?php } ?>
      </div>
      <div class="modal fade" id="reset_password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <b>Anda yakin ingin mereset password?</b><br><br>
              <a class="btn btn-danger btn-ok"> Reset</a>
              <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
            </div>
          </div>
        </div>
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
  <script type="text/javascript">
    //Hapus Data
    $(document).ready(function() {
        $('#reset_password').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
    </script>
</body>
</html>