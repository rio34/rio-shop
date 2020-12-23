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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script type="text/javascript">
    $(function () {
        $("#idhck").change(function(){
            var st = this.checked;
            if(st){
                $("#idtxt").prop("disabled", true);
                value='';
            }else{
                $("#idtxt").prop("disabled", false);
            }
        });
    });
</script>
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
                <a class="navbar-brand" href="#"><i><span>E</span></i>-SKPD</a>
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
                while($row = mysqli_fetch_array($data)){ ?>
                    <div class="profile-usertitle-name"><?php echo $row['username']; ?></div>
                <?php } ?>
                <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="divider"></div>
        <ul class="nav menu">
            <li><a href="index.php"><em class="fa fa-home">&nbsp;</em> Admin</a></li>
            <li class="active"><a href="kategori.php"><em class="fa fa-list-alt">&nbsp;</em> Kategori</a></li>
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
                <li class="active">Kategori </li>
            </ol>
        </div><!--/.row-->
        
    <div class="col-md-12 col-md-offset-0">
        <div class="panel panel-default panel-table">
          <div class="panel-heading">
            <div class="row">
              <div class="col col-xs-6">
                <h3 class="panel-title">Data Kategori</h3>
              </div>
                <div class="col-xs-3 col-md-3 col-lg-3">
                    <a href="tambah_kategori.php" class="btn btn-default"><em class="fa fa-plus"></em> Tambah Kategori</a>
                </div>
            </div>
          </div>
          <div class="panel-body">
            <table class="table table-striped table-bordered table-list">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th class="col col-xs-2">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;
                    $tampil = mysqli_query($connect, "SELECT * FROM category order by id asc");
                    foreach ($tampil as $row){
                        echo "<tr>
                        <td>".$no."</td>
                        <td>".$row['id']."</td>
                        <td>".$row['name']."</td> " ?>
                        <td align="center">
                          <a href="update_kategori.php?edit=<?php echo $row['id']; ?>" class="btn btn-primary"><em class="fa fa-pencil"></em></a>
                          <a data-href="delete_kategori.php?hapus=<?php echo $row['id']; ?>" data-toggle='modal' data-target='#konfirmasi_hapus' class="btn btn-danger"><em class="fa fa-trash"></em></a>
                        </td>
                        </tr><?php
                     $no++; } ?>
                </tbody>
            </table>
          </div>
          <div class="modal fade" id="konfirmasi_hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <b>Anda yakin ingin menghapus data ini ?</b><br><br>
                        <a class="btn btn-danger btn-ok"> Hapus</a>
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
                    </div>
                </div>
            </div>
          </div>
        <div class="col-sm-12">
            <p class="back-link">Copyright &copy; Rio Bagas Pamungkas</p>
        </div>
    </div><!--/.row-->
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
            $('#konfirmasi_hapus').on('show.bs.modal', function(e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });
        });
    </script>
</body>
</html>