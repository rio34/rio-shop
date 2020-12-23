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
        <li class="active">Data Produk</li>
        <li class="active">Edit Produk</li>
      </ol>
    </div><!--/.row-->

    <div class="col-sm-9 col-sm-offset-1 col-lg-10 col-lg-offset-1 main">
        
        <h3>Edit Nama Produk</h3>
        <?php 
        $edit = $_GET['edit'];
        $data = mysqli_query($connect, "SELECT * FROM product WHERE id='$edit'");
        while($row = mysqli_fetch_array($data)){
        ?>
          <form class="form-horizontal"  method="post" action="edit_produk.php" enctype="multipart/form-data" onkeypress="return disableEnterKey(event)">
            <div class="form-group">
              <label for="id_kategori" class="col-lg-3 control-label">ID Produk:</label>
              <div class="col-lg-8">
                <input name="getid" class="form-control" type="hidden" value="<?php echo $row['id']; ?>">
                <input name="id" class="form-control" type="text" value="<?php echo $row['id']; ?>" disabled='disabled'>
              </div>
            </div>
            <div class="form-group">
              <label for="title_brand" class="col-lg-3 control-label">Name Produk:</label>
              <div class="col-lg-8">
                <input name="p_name" class="form-control" type="text" value="<?php echo $row['p_name']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="kategori" class="col-lg-3 control-label">Kategori:</label>
              <div class="col-lg-8" >
                <select name="p_cat" class="form-control" value="<?php echo $row['p_category']; ?>">
                <?php 
                $a = mysqli_query($connect, 'SELECT * FROM category ORDER BY id asc');
                foreach ($a as $b) {
                  echo "<option value=$b[id]";
                  if ( $row['p_category'] == $b['id'] ) echo' selected="selected"';
                  echo ">$b[name]</option>";
                } ?>
              </select>
              </div>
            </div>
            <div class="form-group">
              <label for="sub_kategori" class="col-lg-3 control-label">Sub Kategori:</label>
              <div class="col-lg-8">
                <select name="p_sub" class="form-control" value="<?php echo $row['p_sub']; ?>">
                  <?php 
                  $a = mysqli_query($connect, 'SELECT * FROM sub_category ORDER BY id asc');
                  foreach ($a as $b) {
                    echo "<option value=$b[id]";
                    if ( $row['p_sub'] == $b['id'] ) echo' selected="selected"';
                    echo ">$b[name]</option>";
                  } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="brand" class="col-lg-3 control-label">Brand:</label>
              <div class="col-lg-8">
                <select name="p_brand" class="form-control" value="<?php echo $row['p_brand']; ?>">
                  <?php 
                  $a = mysqli_query($connect, 'SELECT * FROM brand ORDER BY id asc');
                  foreach ($a as $b) {
                    echo "<option value=$b[id]";
                    if ( $row['p_brand'] == $b['id'] ) echo' selected="selected"';
                    echo ">$b[title]</option>";
                  } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="price" class="col-lg-3 control-label">Harga satuan:</label>
              <div class="col-lg-8">
                <input name="p_price" class="form-control" type="number" value="<?php echo $row['p_price']; ?>" required>
              </div>
            </div>
            <div class="form-group">
              <label for="desc" class="col-lg-3 control-label">Deskripsi:</label>
              <div class="col-lg-8">
                <textarea class="form-control" name="p_desc" rows="10" cols="15" required=""><?php echo $row['p_desc']; ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="Jumlah" class="col-lg-3 control-label">Jumlah:</label>
              <div class="col-lg-8">
                <input name="p_qty" class="form-control" type="number" value="<?php echo $row['p_qty']; ?>" required>
              </div>
            </div>
            <div class="form-group">
              <label for="Jumlah" class="col-lg-3 control-label">Product Image:</label>
              <div class="col-lg-8">
                <input type="file" name='image'>
                <input type="hidden" name='getimage' value="<?php echo $row['p_image']; ?>">
                <img src="../images/<?php echo $row['p_image']; ?>" width="250">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label"></label>
              <div class="col-md-8">
                <input type="submit" name="update" class="btn btn-primary">
                <a href="produk.php" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i> Back</a>
            </div>
          </form>
        <?php } ?>
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