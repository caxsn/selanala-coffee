<?php 
   session_start();
   if(!isset($_SESSION['idAdmin'])){
     header('location: ../index.php');
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Halaman Administrator - Selanala</title>
      <!-- Bootstrap Core CSS -->
      <link href="../asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- MetisMenu CSS -->
      <link href="../asset/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
      <!-- DataTables CSS -->
      <link href="../asset/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
      <!-- Custom CSS -->
      <link href="../asset/dist/css/sb-admin-2.css" rel="stylesheet">
      <!-- Custom Fonts -->
      <link href="../asset/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   </head>
   <body>
      <div id="wrapper">
         <!-- Navigation -->
         <nav class="navbar navbar-default navbar-static-top fixed" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="index.php">Halaman Administrator</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
               <li>Selamat Datang, Administrator</li>
               <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-user">
                     <li><a href="#"><i class="fa fa-user fa-fw"></i> Profil</a>
                     </li>
                     <li class="divider"></li>
                     <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                     </li>
                  </ul>
                  <!-- /.dropdown-user -->
               </li>
               <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
               <div class="sidebar-nav navbar-collapse">
                  <ul class="nav" id="side-menu">
                     <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                           <input type="text" class="form-control" placeholder="Search...">
                           <span class="input-group-btn">
                           <button class="btn btn-default" type="button">
                           <i class="fa fa-search"></i>
                           </button>
                           </span>
                        </div>
                        <!-- /input-group -->
                     </li>
                     <li>
                        <a href="#dashboard" data-toggle="tab"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                     </li>
                     <li>
                        <a href="#artikel" data-toggle="tab"><i class="fa fa-file-text fa-fw"></i> Artikel</a>
                     </li>
                     <li>
                        <a href="#produk" data-toggle="tab"><i class="fa fa-tags fa-fw"></i> Produk</a>
                     </li>
                     <li>
                        <a href="#transaksi" data-toggle="tab"><i class="fa fa-shopping-cart fa-fw"></i> Transaksi</a>
                     </li>
                     <li>
                        <a href="#pesan" data-toggle="tab"><i class="fa fa-envelope fa-fw"></i> Pesan</a>
                     </li>
                     <li>
                        <a href="#user" data-toggle="tab"><i class="fa fa-users fa-fw"></i> Data User</a>
                     </li>
                     <li>
                        <a href="#"><i class="fa fa-edit fa-fw"></i> Edit Halaman<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                           <li>
                              <a href="#tentangkami" data-toggle="tab">Tentang Kami</a>
                           </li>
                        </ul>
                     </li>
                  </ul>
                  </li>
                  </ul>
               </div>
               <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
         </nav>
         <div id="page-wrapper">
            <div class="tab-content">
               <div class="tab-pane fade in active" id="dashboard">
                  <div class="row">
                     <div class="col-lg-12">
                        <h1 class="page-header">Dashboard</h1>
                     </div>
                     <!-- /.col-lg-12 -->
                  </div>
                  <!-- /.row -->
                  <div class="row">
                     <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                           <div class="panel-heading">
                              <div class="row">
                                 <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                 </div>
                                 <div class="col-xs-9 text-right">
                                    <?php
                                       require("../config/db.php");
                                       $sql = "SELECT count(idArtikel) AS jmlartikel FROM tabel_artikel";
                                       $query = mysqli_query($conn,$sql);
                                       $result = mysqli_fetch_array($query);
                                       echo '
                                       <div class="huge">'.$result['jmlartikel'].'</div>';
                                       ?>
                                    <div>Artikel</div>
                                 </div>
                              </div>
                           </div>
                           <a href="#artikel" data-toggle="tab">
                              <div class="panel-footer">
                                 <span class="pull-left">Lihat Detail</span>
                                 <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                 <div class="clearfix"></div>
                              </div>
                           </a>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                           <div class="panel-heading">
                              <div class="row">
                                 <div class="col-xs-3">
                                    <i class="fa fa-tags fa-5x"></i>
                                 </div>
                                 <div class="col-xs-9 text-right">
                                    <?php
                                       require("../config/db.php");
                                       $sql = "SELECT count(idProduk) AS jmlprod FROM tabel_produk";
                                       $query = mysqli_query($conn,$sql);
                                       $result = mysqli_fetch_array($query);
                                       echo '
                                       <div class="huge">'.$result['jmlprod'].'</div>';
                                       ?>
                                    <div>Produk</div>
                                 </div>
                              </div>
                           </div>
                           <a href="#produk" data-toggle="tab">
                              <div class="panel-footer">
                                 <span class="pull-left">Lihat Detail</span>
                                 <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                 <div class="clearfix"></div>
                              </div>
                           </a>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                           <div class="panel-heading">
                              <div class="row">
                                 <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                 </div>
                                 <div class="col-xs-9 text-right">
                                    <?php
                                       require("../config/db.php");
                                       $sql = "SELECT count(idTransaksi) AS jmltrans FROM tabel_transaksi";
                                       $query = mysqli_query($conn,$sql);
                                       $result = mysqli_fetch_array($query);
                                       echo '
                                       <div class="huge">'.$result['jmltrans'].'</div>';
                                       ?>
                                    <div>Transaksi</div>
                                 </div>
                              </div>
                           </div>
                           <a href="#transaksi" data-toggle="tab">
                              <div class="panel-footer">
                                 <span class="pull-left">Lihat Detail</span>
                                 <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                 <div class="clearfix"></div>
                              </div>
                           </a>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                           <div class="panel-heading">
                              <div class="row">
                                 <div class="col-xs-3">
                                    <i class="fa fa-envelope fa-5x"></i>
                                 </div>
                                 <div class="col-xs-9 text-right">
                                    <?php
                                       require("../config/db.php");
                                       $sql = "SELECT count(idPesan) AS jmlpesan FROM tabel_pesan";
                                       $query = mysqli_query($conn,$sql);
                                       $result = mysqli_fetch_array($query);
                                       echo '
                                       <div class="huge">'.$result['jmlpesan'].'</div>';
                                       ?>
                                    <div>Pesan</div>
                                 </div>
                              </div>
                           </div>
                           <a href="#pesan" data-toggle="tab">
                              <div class="panel-footer">
                                 <span class="pull-left">Lihat Detail</span>
                                 <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                 <div class="clearfix"></div>
                              </div>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /dashboard -->
               <div class="tab-pane fade" id="artikel">
                  <div class="row">
                     <div class="col-lg-12">
                        <h1 class="page-header">Artikel</h1>
                        <button type="button" class="btn btn-success" style="float: right;margin-bottom: 10px;" data-toggle="modal" data-target="#modalartikel">Tambah Artikel</button>
                        <!-- Modal Tambah Artikel -->
                        <div class="modal fade" id="modalartikel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Tambah Artikel</h4>
                                 </div>
                                 <div class="modal-body">
                                    <div class="row">
                                       <div class="col-lg-12">
                                          <form action="tambahArtikel.php" method="post" role="form" enctype="multipart/form-data" id="formartikel">
                                             <div class="form-group">
                                                <label>Judul</label>
                                                <input class="form-control" placeholder="Masukkan Judul Artikel" name="judul" id="judul" required>
                                             </div>
                                             <div class="form-group">
                                                <label>Deskripsi</label>
                                                <textarea class="form-control" rows="5" placeholder="Deskripsi Artikel" name="deskripsi" id="deskripsi" style="resize:none" required></textarea>
                                             </div>
                                             <div class="form-group">
                                                <label>Gambar</label>
                                                <input type="file" class="form-control" name="gambar" id="gambar" required>
                                                <p class="help-block">Maksimal resolusi 300px x 300px. Format Gambar .JPG, .JPEG, dan .PNG</p>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="modal-footer">
                                    <button type="reset" class="btn btn-default" data-dismiss="modal">Batal</button>
                                    <button type="submit" name="submit" form="formartikel" class="btn btn-primary">Simpan</button>
                                 </div>
                              </div>
                              <!-- /.modal-content -->
                           </div>
                           <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                     </div>
                     <!-- /.col-lg-12 -->
                  </div>
                  <div class="row">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           Tabel Artikel
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <table width="100%" class="table table-striped table-bordered table-hover display" id="">
                              <thead>
                                 <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    require('../config/db.php');
                                    $sqlart = mysqli_query($conn,"SELECT * FROM tabel_artikel");
                                    $no = 1;
                                    while($data = mysqli_fetch_array($sqlart)) {
                                    $artcut = substr($data['deskripsi'],0,50);
                                    echo '<tr class="odd gradeX">
                                        <td>'.$no.'</td>
                                        <td>'.$data[judul].'</td>
                                        <td>'.$artcut.'...</td>
                                        <td>'.$data[tanggal].'</td>
                                       <td><a href="#UpdateArtikel" class="btn btn-primary btn-xs" id="idArt" data-toggle="modal" data-id="'.$data['idArtikel'].'">Edit</a> <a href="javascript:;"  data-id="'.$data['idArtikel'].'" data-toggle="modal" data-target="#modal-konfirmasi" class="btn btn-danger btn-xs">Hapus</a></td>
                                    </tr>
                                    ';
                                    $no++;
                                    }
                                    ?>
                              </tbody>
                           </table>
                           <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                     </div>
                     <!-- /.panel -->
                     <!-- modal konfirmasi delete artikel-->
                     <div id="modal-konfirmasi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <h4 class="modal-title">Konfirmasi</h4>
                              </div>
                              <div class="modal-body">
                                 Apakah anda yakin ingin menghapus data ini ?
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                 <a href="javascript:;" class="btn btn-danger" id="hapus-true-data">Hapus</a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Modal Update Artikel -->
                     <div class="modal fade" id="UpdateArtikel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                 <h4 class="modal-title" id="myModalLabel">Edit Artikel</h4>
                              </div>
                              <div class="modal-body">
                                 <div class="fetched-data"></div>
                              </div>
                              <div class="modal-footer">
                                 <button type="reset" class="btn btn-default" data-dismiss="modal">Batal</button>
                                 <button type="submit" name="submit" form="FormArtikelUpdate" class="btn btn-primary">Simpan</button>
                              </div>
                           </div>
                           <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                     </div>
                     <!-- /.modal -->
                  </div>
                  <!-- /.col-lg-12 -->
               </div>
               <!-- /artikel -->
               <div class="tab-pane fade" id="produk">
                  <div class="row">
                     <div class="col-lg-12">
                        <h1 class="page-header">Produk</h1>
                        <button type="button" class="btn btn-success" style="float: right;margin-bottom: 10px;" data-toggle="modal" data-target="#modalproduk">Tambah Produk</button>
                        <!-- Modal Tambah Produk -->
                        <div class="modal fade" id="modalproduk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Tambah Produk</h4>
                                 </div>
                                 <div class="modal-body">
                                    <div class="row">
                                       <div class="col-lg-12">
                                          <form action="tambahProduk.php" method="post" role="form" enctype="multipart/form-data" id="formproduk">
                                             <div class="form-group">
                                                <label>Kode Produk</label>
                                                <input class="form-control" name="kode" id="kodeproduk" maxlength="6" placeholder="Contoh : ARB001" required>
                                             </div>
                                             <div class="form-group">
                                                <label>Nama Produk</label>
                                                <input class="form-control" name="nama" placeholder="Masukkan Nama Produk" required>
                                             </div>
                                             <div class="form-group">
                                                <label>Kategori</label>
                                                <select class="form-control" name="kategori" required>
                                                   <option value="1">Single Origin</option>
                                                   <option value="2">Houseblend</option>
                                                   <option value="3">Langganan</option>
                                                </select>
                                             </div>
                                             <div class="form-group">
                                                <label>Harga</label>
                                                <input class="form-control" name="harga" placeholder="Masukkan Harga Satuan" required>
                                             </div>
                                             <div class="form-group">
                                                <label>Stok</label>
                                                <input class="form-control" name="stok" placeholder="Masukkan Jumlah Stok" required>
                                             </div>
                                             <div class="form-group">
                                                <label>Deskripsi</label>
                                                <textarea class="form-control" name="deskripsi" rows="5" placeholder="Deskripsi Produk" style="resize:none" required></textarea>
                                             </div>
                                             <div class="form-group">
                                                <label>Gambar</label>
                                                <input type="file" name="gambar" required>
                                                <p class="help-block">Maksimal resolusi 300px x 300px. Format Gambar .jpg, .jpeg, dan .png</p>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="modal-footer">
                                    <button class="btn btn-default" data-dismiss="modal">Batal</button>
                                    <button class="btn btn-primary" name="submit" form="formproduk" type="submit">Simpan</button>
                                 </div>
                              </div>
                              <!-- /.modal-content -->
                           </div>
                           <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                     </div>
                     <!-- /.col-lg-12 -->
                  </div>
                  <div class="row">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           Tabel Produk
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <table width="100%" class="table table-striped table-bordered table-hover display" id="">
                              <thead>
                                 <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    require('../config/db.php');
                                    $sqlprod = mysqli_query($conn,"SELECT idProduk, kdProduk, nama, c.idKategori, namaKategori, harga, stok, deskripsi, path FROM tabel_kategori c JOIN tabel_produk s USING (idKategori) ");
                                    $num = 1;
                                    while($data = mysqli_fetch_array($sqlprod)) {
                                    $prodcut = substr($data['deskripsi'],0,20);
                                    echo '<tr class="odd gradeX">
                                        <td>'.$num.'</td>
                                        <td>'.$data[kdProduk].'</td>
                                        <td>'.$data[nama].'</td>
                                        <td>'.$data[namaKategori].'</td>
                                        <td>Rp. '.$data[harga].'</td>
                                        <td>'.$data[stok].'</td>
                                        <td>'.$prodcut.'...</td>
                                        <td><a href="#UpdateProduk" class="btn btn-primary btn-xs" id="idProd" data-toggle="modal" data-id="'.$data['idProduk'].'">Edit</a> <a href="javascript:;"  data-id="'.$data['idProduk'].'" data-toggle="modal" data-target="#modal-konfirmasi2" class="btn btn-danger btn-xs">Hapus</a></td>
                                    </tr>
                                    ';
                                    $num++;
                                    }
                                    ?>
                              </tbody>
                           </table>
                           <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                     </div>
                     <!-- /.panel -->
                     <!-- modal konfirmasi delete produk-->
                     <div id="modal-konfirmasi2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <h4 class="modal-title">Konfirmasi</h4>
                              </div>
                              <div class="modal-body">
                                 Apakah anda yakin ingin menghapus data ini ?
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                 <a href="javascript:;" class="btn btn-danger" id="hapus-true-data">Hapus</a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Modal Update Produk -->
                     <div class="modal fade" id="UpdateProduk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                 <h4 class="modal-title" id="myModalLabel">Edit Produk</h4>
                              </div>
                              <div class="modal-body">
                                 <div class="fetched-data"></div>
                              </div>
                           </div>
                           <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                     </div>
                     <!-- /.modal -->
                  </div>
                  <!-- /.col-lg-12 -->
               </div>
               <!-- /produk -->
               <div class="tab-pane fade" id="transaksi">
                  <div class="row">
                     <div class="col-lg-12">
                        <h1 class="page-header">Transaksi</h1>
                     </div>
                     <!-- /.col-lg-12 -->
                  </div>
                  <div class="row">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           Tabel Transaksi
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <table width="100%" class="table table-striped table-bordered table-hover display" id="">
                              <thead>
                                 <tr>
                                    <th>No</th>
                                    <th>Kode Transaksi</th>
                                    <th>Nama Pembeli</th>
                                    <th>Produk</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    require('../config/db.php');
                                    $sqltrx = mysqli_query($conn,"SELECT idTransaksi, kdTransaksi, c.idUser, namaUser, daftarBarang, tanggal, status FROM tabel_user c JOIN tabel_transaksi s USING (idUser) ");
                                    $num = 1;
                                    while($data = mysqli_fetch_array($sqltrx)) {
                                    echo '<tr class="odd gradeX">
                                        <td>'.$num.'</td>
                                        <td>'.$data[kdTransaksi].'</td>
                                        <td>'.$data[namaUser].'</td>
                                        <td>'.$data[daftarBarang].'</td>
                                        <td>'.$data[tanggal].'</td>
                                        <td>'.$data[status].'</td>
                                        <td><a href="#Transaksi" class="btn btn-info btn-xs" id="idTrx" data-toggle="modal" data-id="'.$data['idTransaksi'].'">Detail</a></td>
                                    </tr>
                                    ';
                                    $num++;
                                    }
                                    ?>
                              </tbody>
                           </table>
                           <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                        <!-- Modal Transaksi -->
                        <div class="modal fade" id="Transaksi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Detail Transaksi</h4>
                                 </div>
                                 <div class="modal-body">
                                    <div class="fetched-data"></div>
                                 </div>
                              </div>
                              <!-- /.modal-content -->
                           </div>
                           <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                     </div>
                  </div>
               </div>
               <!-- /transaksi -->
               <div class="tab-pane fade" id="pesan">
                  <div class="row">
                     <div class="col-lg-12">
                        <h1 class="page-header">Pesan Masuk</h1>
                     </div>
                     <!-- /.col-lg-12 -->
                  </div>
                  <div class="row">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           Tabel Pesan
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <table width="100%" class="table table-striped table-bordered table-hover display" id="">
                              <thead>
                                 <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Pesan</th>
                                    <th>Aksi</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    require('../config/db.php');
                                    $sqlmsg = mysqli_query($conn,"SELECT * FROM tabel_pesan");
                                    $no = 1;
                                    while($data = mysqli_fetch_array($sqlmsg)) {
                                    $msgcut = substr($data['pesan'],0,100);
                                    echo '<tr class="odd gradeX">
                                        <td>'.$no.'</td>
                                        <td>'.$data[nama].'</td>
                                        <td>'.$data[email].'</td>
                                        <td>'.$msgcut.'</td>
                                        <td><a href="#Pesan" class="btn btn-info btn-xs" id="idPes" data-toggle="modal" data-id="'.$data['idPesan'].'">Detail</a></td>
                                    </tr>
                                    ';
                                    $no++;
                                    }
                                    ?>
                              </tbody>
                           </table>
                           <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                        <!-- Modal Pesan -->
                        <div class="modal fade" id="Pesan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Detail Pesan</h4>
                                 </div>
                                 <div class="modal-body">
                                    <div class="fetched-data"></div>
                                 </div>
                                 <div class="modal-footer">
                                    <button type="reset" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                 </div>
                              </div>
                              <!-- /.modal-content -->
                           </div>
                           <!-- /.panel -->
                        </div>
                     </div>
                     <!-- /.panel -->
                  </div>
                  <!-- /.col-lg-12 -->
               </div>
               <!-- /pesan -->
               <div class="tab-pane fade" id="user">
                  <div class="row">
                     <div class="col-lg-12">
                        <h1 class="page-header">User</h1>
                        <button type="button" class="btn btn-success" style="float: right;margin-bottom: 10px;" data-toggle="modal" data-target="#modaluser">Tambah User</button>
                        <!-- Modal Tambah User -->
                        <div class="modal fade" id="modaluser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Tambah User</h4>
                                 </div>
                                 <div class="modal-body">
                                    <div class="row">
                                       <div class="col-lg-12">
                                          <form action="tambahUser.php" method="post" role="form" enctype="multipart/form-data" id="formuser">
                                             <div class="form-group">
                                                <label>Nama User</label>
                                                <input class="form-control" name="nama" placeholder="Masukkan Nama User" required>
                                             </div>
                                             <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" name="email" placeholder="Masukkan Email" required>
                                             </div>
                                             <div class="form-group">
                                                <label>Password</label>
                                                <input class="form-control" type="password" name="password" placeholder="*******" required>
                                             </div>
                                             <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea class="form-control" name="alamat" rows="5" placeholder="Masukkan alamat" style="resize:none" required></textarea>
                                             </div>
                                             <div class="form-group">
                                                <label>Telp</label>
                                                <input class="form-control" name="telp" placeholder="081234567890" required>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="modal-footer">
                                    <button class="btn btn-default" data-dismiss="modal">Batal</button>
                                    <button class="btn btn-primary" name="submit" form="formuser" type="submit">Simpan</button>
                                 </div>
                              </div>
                              <!-- /.modal-content -->
                           </div>
                           <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                     </div>
                     <!-- /.col-lg-12 -->
                  </div>
                  <div class="row">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           Tabel User
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <table width="100%" class="table table-striped table-bordered table-hover display" id="">
                              <thead>
                                 <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>Telp</th>
                                    <th>Aksi</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    require('../config/db.php');
                                    $sqluser = mysqli_query($conn,"SELECT * FROM  tabel_user");
                                    $num = 1;
                                    while($data = mysqli_fetch_array($sqluser)) {
                                    echo '<tr class="odd gradeX">
                                        <td>'.$num.'</td>
                                        <td>'.$data[namaUser].'</td>
                                        <td>'.$data[email].'</td>
                                        <td>'.$data[alamat].'</td>
                                        <td>'.$data[telp].'</td>
                                        <td><a href="#UpdateUser" class="btn btn-primary btn-xs" id="idUser" data-toggle="modal" data-id="'.$data['idUser'].'">Edit</a> <a href="javascript:;"  data-id="'.$data['idUser'].'" data-toggle="modal" data-target="#modal-konfirmasi3" class="btn btn-danger btn-xs">Hapus</a></td>
                                    </tr>
                                    ';
                                    $num++;
                                    }
                                    ?>
                              </tbody>
                           </table>
                           <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                     </div>
                     <!-- /.panel -->
                     <!-- modal konfirmasi delete user-->
                     <div id="modal-konfirmasi3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <h4 class="modal-title">Konfirmasi</h4>
                              </div>
                              <div class="modal-body">
                                 Apakah anda yakin ingin menghapus data ini ?
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                 <a href="javascript:;" class="btn btn-danger" id="hapus-true-data">Hapus</a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Modal Update User -->
                     <div class="modal fade" id="UpdateUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                 <h4 class="modal-title" id="myModalLabel">Edit User</h4>
                              </div>
                              <div class="modal-body">
                                 <div class="fetched-data"></div>
                              </div>
                           </div>
                           <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                     </div>
                     <!-- /.modal -->
                  </div>
                  <!-- /.col-lg-12 -->
               </div>
               <!-- /user -->
               <div class="tab-pane fade" id="tentangkami">
                  <div class="row">
                     <div class="col-lg-12">
                        <h1 class="page-header">Tentang Kami</h1>
                     </div>
                     <!-- /.col-lg-12 -->
                     <div class="row">
                        <div class="col-md-12">
                           <div class="panel panel-default">
                              <div class="panel-heading">
                                 Halaman Tentang Kami
                              </div>
                              <div class="panel-body">
                                 <?php
                                    require('../config/db.php');
                                    $sqlmsg = mysqli_query($conn,"SELECT * FROM tabel_profil");
                                    $data = mysqli_fetch_array($sqlmsg);
                                    ?>
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <form action="updateProfil.php" method="post" enctype="multipart/form-data" id="profil">
                                          <input type="hidden" name="id" value="<?php echo $data['idProfil']; ?>">
                                          <div class="form-group">
                                             <div class="col-md-3">
                                                <label>Preview</label>
                                                <img src="../../image/<?php echo $data['path']; ?>" class="rounded img-thumbnail" width="200px" height="200px">
                                             </div>
                                             <div class="col-md-6">
                                                <label>Deskripsi</label>
                                                <textarea class="form-control" rows="6" name="deskripsi" style="resize:none" required><?php echo $data['deskripsi']; ?> </textarea>
                                             </div>
                                             <div class="col-md-3">
                                                <label>Upload gambar</label>
                                                <div class="form-group">
                                                   <input type="checkbox" name="ubah_gambar" value="true"> Ceklist jika ingin mengubah gambar.
                                                </div>
                                                <input type="file" class="form-control" name="gambar" id="gambar" onchange="readURL(this);">
                                             </div>
                                          </div>
                                          <div class="row">
                                       <div class="col-md-12 text-center" style="margin-top:10px">
                                          <button type="submit" form="profil" name="submit" class="btn btn-primary">Simpan</button>
                                       </div>
                                    </div>
                                       </form>
                                    </div>
                                    <!-- /.panel -->
                                 </div>
                                 <!-- /.col-lg-12 -->
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /tentang-kami -->
            </div>
            <!-- /tab-content -->
         </div>
         <!-- /#page-wrapper -->
      </div>
      <!-- /#wrapper -->
      <!-- jQuery -->
      <script src="../asset/vendor/jquery/jquery.min.js"></script>
      <!-- Bootstrap Core JavaScript -->
      <script src="../asset/vendor/bootstrap/js/bootstrap.min.js"></script>
      <!-- Metis Menu Plugin JavaScript -->
      <script src="../asset/vendor/metisMenu/metisMenu.min.js"></script>
      <!-- DataTables JavaScript -->
      <script src="../asset/vendor/datatables/js/jquery.dataTables.min.js"></script>
      <script src="../asset/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
      <script src="../asset/vendor/datatables-responsive/dataTables.responsive.js"></script>
      <!-- Custom Theme JavaScript -->
      <script src="../asset/dist/js/sb-admin-2.js"></script>
      <script>
         $(document).ready(function() {
             $('table.display').DataTable({
                 responsive: true,
                 "ordering": false
             });
         });
      </script>
      <script>
         $(document).ready(function() {
         
             $('#modal-konfirmasi').on('show.bs.modal', function(event) {
                 var div = $(event.relatedTarget)
                 var id = div.data('id')
                 var modal = $(this)
                 modal.find('#hapus-true-data').attr("href", "hapusArtikel.php?idArtikel=" + id);
             })
         
         });
         $(document).ready(function() {
         
             $('#modal-konfirmasi2').on('show.bs.modal', function(event) {
                 var div = $(event.relatedTarget)
                 var idno = div.data('id')
                 var modal = $(this)
                 modal.find('#hapus-true-data').attr("href", "hapusProduk.php?idProduk=" + idno);
             })
         
         });
         $(document).ready(function() {
         
         $('#modal-konfirmasi3').on('show.bs.modal', function(event) {
             var div = $(event.relatedTarget)
             var idus = div.data('id')
             var modal = $(this)
             modal.find('#hapus-true-data').attr("href", "hapusUser.php?idUser=" + idus);
         })
     
     });
         $(document).ready(function() {
             $('#UpdateArtikel').on('show.bs.modal', function(e) {
                 var idArt = $(e.relatedTarget).data('id');
                 $.ajax({
                     type: 'post',
                     url: 'detailArtikel.php',
                     data: 'idArtikel=' + idArt,
                     success: function(data) {
                         $('.fetched-data').html(data);
                     }
                 });
             });
         });
         $(document).ready(function() {
             $('#UpdateProduk').on('show.bs.modal', function(e) {
                 var idProd = $(e.relatedTarget).data('id');
                 $.ajax({
                     type: 'post',
                     url: 'detailProduk.php',
                     data: 'idProduk=' + idProd,
                     success: function(data) {
                         $('.fetched-data').html(data);
                     }
                 });
             });
         });
         $(document).ready(function() {
             $('#Transaksi').on('show.bs.modal', function(e) {
                 var idTrx = $(e.relatedTarget).data('id');
                 $.ajax({
                     type: 'post',
                     url: 'detailTransaksi.php',
                     data: 'idTransaksi=' + idTrx,
                     success: function(data) {
                         $('.fetched-data').html(data);
                     }
                 });
             });
         });
         $(document).ready(function() {
             $('#Pesan').on('show.bs.modal', function(e) {
                 var idPes = $(e.relatedTarget).data('id');
                 $.ajax({
                     type: 'post',
                     url: 'detailPesan.php',
                     data: 'idPesan=' + idPes,
                     success: function(data) {
                         $('.fetched-data').html(data);
                     }
                 });
             });
         });
         $(document).ready(function() {
             $('#UpdateUser').on('show.bs.modal', function(e) {
                 var idUsr = $(e.relatedTarget).data('id');
                 $.ajax({
                     type: 'post',
                     url: 'detailUser.php',
                     data: 'idUser=' + idUsr,
                     success: function(data) {
                         $('.fetched-data').html(data);
                     }
                 });
             });
         });
         function readURL(input) {
             if (input.files && input.files[0]) {
                 var reader = new FileReader();
         
                 reader.onload = function(e) {
                     $('.uploaded')
                         .attr('src', e.target.result)
                         .width(250)
                         .height(150);
                 };
         
                 reader.readAsDataURL(input.files[0]);
             }
         }
      </script>
   </body>
</html>