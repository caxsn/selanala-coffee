<?php 
  require('config/config.php');
  session_start();
  if(!isset($_SESSION['idUser'])) {
    header("Location: index.php");
    exit;
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Pesananku - Selanala Coffee</title>
  <link rel="stylesheet" type="text/css" href="plugin/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="asset/css/main.css">
  <link rel="icon" type="image/gif/png" href="asset/img/icons.png">
</head>
<body>

<?php include('component/nav.php'); ?>

<div class="container-fluid" id="isi" >

<div class="row">
    <div class="col-xs-2 col-xs-offset-5" id="bijikopi">
      <h3 style="font-family: Roboto; font-size:2.2em;"><strong>Pesananku</strong></h3>
    </div>
</div>

<div class="container pesanan">
  <div class="row">
    <div class="col-xs-12">
      <div class="table-responsive">
        <table summary="Tabel Pesananku" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Produk</th>
              <th>Jumlah Produk</th>
              <th>Tanggal</th>
              <th>Total</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require("config/config.php");
            $queryPesanan = mysqli_query($conn, "SELECT * FROM tabel_transaksi WHERE idUser='$_SESSION[idUser]' ");
            $no = 1;
            while($data = mysqli_fetch_array($queryPesanan)) {
            echo '
            <tr>
              <td>'.$no.'</td>
              <td>'.$data['daftarBarang'].'</td>
              <td>'.$data['jumlah'].' Buah</td>
              <td>'.$data['tanggal'].'</td>
              <td>Rp. '.$data['total'].'</td>
              <td>'.$data['status'].'</td>
            </tr>
            ';
            $no++;
            }
            ?>
          </tbody>
        </table>
      </div><!--end of .table-responsive-->
    </div>
  </div>
</div>
</div>

<?php include('component/footer.php'); ?>

<script type="text/javascript" src="plugin/Javascript/jquery.min.js"></script>
<script type="text/javascript" src="plugin/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="asset/js/script.js"></script>
</body>
</html>