<?php 
  session_start();
  if(!isset($_SESSION['idAdmin'])){
    header('location: index.php');
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Halaman Administrator</title>
  <link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../asset/css/admin.css">
</head>
<body>

<div class="container-fluid">
  <div class="row">
    <div class="col-xs-2" id="sideLeft">
      <h4><strong>Selamat Datang</strong></h4>
      <ul class="nav nav-pills nav-stacked" id="data">
        <li><a data-toggle="tab" href="#barang">Produk</a></li>
        <li><a href="proses/logout.php">
          <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-log-out"></span>Logout</button></a>
        </li>
      </ul>
    </div>
    
    <div class="col-xs-10">
      <div class="tab-content">

        <div id="barang" class="tab-pane fade">
          <h3 class="table-title"><strong>Tabel Produk</strong></h3>
          <button type="button" class="btn btn-success" id="tambah-data-barang" data-toggle="modal" data-target="#form-barang">Tambah Produk</button>

          <!-- modal form-admin -->
              <div class="modal fade" id="form-barang" role="dialog">
                <div class="modal-content" style="width:40vw;margin-top:10vh; margin-left:30vw">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 style="margin-left:150px"><strong>Tambah Produk</strong></h4>
                  </div>
                  <div class="modal-body">
                      <form action="proses/tambahProduk.php" method="post" role="form" enctype="multipart/form-data">
                      
                      <div class="form-group">
                        <label for="nama">Nama Produk</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                      </div>
                      <div class="form-group">
                        <label for="foto">Foto Produk</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                      </div>
                      <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" name="harga" id="harga">
                      </div>
                      <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control" id="kategori" name="kategori">
                          <option value="kopi_robusta">Robusta</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="ukuran">Level Roasting</label>
                        <select class="form-control" id="ukuran" name="ukuran">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="stock">Stock Produk</label>
                        <input type="number" class="form-control" id="stock" name="stock">
                      </div>
                      <div class="form-group">
                        <label for="pesan">Keterangan : </label>
                        <textarea class="form-control" name="keterangan" style="resize:vertical" ></textarea>
                      </div>
                      <button type="reset" data-dismiss="modal" class="btn btn-primary">Batal</button>
                      <button type="submit" name="upload" class="btn btn-primary">Tambahkan</button>
                    </form>
                  </div>
                </div>
              </div>
              <!-- end of modal -->
             

          <div class="container">
            <h4 class="draf-kategori">Kategori : </h4>
            <ul class="nav nav-pills" style="margin-left: 15vw;">             
              <li class="item-kategori"><a data-toggle="tab" href="#tabel-origin">Single Origin</a></li>
              <li class="item-kategori"><a data-toggle="tab" href="#tabel-houseblend">Houseblend</a></li>
            </ul>
          </div>

            <div class="tab-content">
              <div id="tabel-origin" class="tab-pane fade">
                <div class="row">
                  <div class="col-xs-11 col-offset-xs-1">
                    <table class="table table-condensed" style="width:80vw">
                      <thead>
                        <tr>
                          <th class="id-barang text-center">ID Produk</th>
                          <th class="nama-barang text-center">Nama Produk</th>
                          <th class="keterangan-barang text-center">Keterangan</th>
                          <th class="harga-barang text-center">Harga</th>
                          <th class="stock-barang text-center">Stock</th>
                          <th class="gambar">Gambar Produk</th>
                          <th class="hapus"></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        $conn = mysqli_connect('localhost', 'root', 'zeldax27', 'kopi2');
                        $kategori = 'single_origin';
                        $query = mysqli_query($conn, "SELECT idProduk, nama, keterangan, harga, stock, path FROM tabel_produk WHERE kategori='$kategori' ");
                        while($array = mysqli_fetch_array($query)){
                          echo '
                            <tr>
                              <td class="id-barang text-center">'.$array['idProduk'].'</td>
                              <td class="nama-barang text-center">'.$array['nama'].'</td>
                              <td class="keterangan-barang text-justify">'.$array['keterangan'].'</td>
                              <td class="harga-barang text-center">'.$array['harga'].'</td>
                              <td class="stock-barang text-center">'.$array['stock'].'</td>
                              <td class="gambar"><img src="proses/'.$array['path'].'" style="width: 15vw; height:30vh"></td>
                              <td class="hapus"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal'.$array['idProduk'].'"><i class="glyphicon glyphicon-pencil"></i></button></td>
                            </tr>
                          ';
                          echo '
                             <!-- edit barang -->
                        <div class="modal fade" id="modal'.$array['idProduk'].'" role="dialog">
                          <div class="modal-content" style="width:40vw;margin-top:10vh; margin-left:30vw">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 style="margin-left:150px"><strong>Edit Barang</strong></h4>
                            </div>
                            <div class="modal-body">
                                <form action="proses/updateProduk.php" method="post" role="form">
                                <input type="hidden" name="idProduk" value="'.$array['idProduk'].'">
                                <div class="form-group">
                                  <label for="harga">Harga (Jangan diisi apabila Harga tetap)</label>
                                  <input type="number" class="form-control" name="harga" id="harga">
                                </div>
                                <div class="form-group">
                                  <label for="stock">Stock Barang (Jangan diisi apabila Stock tetap)</label>
                                  <input type="number" class="form-control" id="stock" name="stock">
                                </div>
                                <button type="reset" data-dismiss="modal" class="btn btn-primary">Batal</button>
                                <button type="submit" class="btn btn-primary">Edit</button>
                              </form>
                            </div>
                          </div>
                        </div>
                        <!-- end of modal edit barang -->
                          ';
                        }
                       ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div id="tabel-houseblend" class="tab-pane fade">
                <div class="row">
                  <div class="col-xs-11 col-offset-xs-1">
                    <table class="table table-condensed" style="width:80vw">
                      <thead>
                        <tr>
                          <th class="id-barang text-center">ID Produk</th>
                          <th class="nama-barang text-center">Nama Produk</th>
                          <th class="keterangan-barang text-center">Keterangan</th>
                          <th class="harga-barang text-center">Harga</th>
                          <th class="stock-barang text-center">Stock</th>
                          <th class="gambar">Gambar Produk</th>
                          <th class="hapus"></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        $conn = mysqli_connect('localhost', 'root', 'zeldax27', 'kopi2');
                        $kategori = 'houseblend';
                        $query = mysqli_query($conn, "SELECT idProduk, nama, keterangan, harga, stock, path FROM tabel_produk WHERE kategori='$kategori' ");
                        while($array = mysqli_fetch_array($query)){
                          echo '
                            <tr>
                              <td class="id-barang text-center">'.$array['idProduk'].'</td>
                              <td class="nama-barang text-center">'.$array['nama'].'</td>
                              <td class="keterangan-barang text-justify">'.$array['keterangan'].'</td>
                              <td class="harga-barang text-center">'.$array['harga'].'</td>
                              <td class="stock-barang text-center">'.$array['stock'].'</td>
                              <td class="gambar"><img src="proses/'.$array['path'].'" style="width: 15vw; height:30vh"></td>
                              <td class="hapus"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal'.$array['idProduk'].'"><i class="glyphicon glyphicon-pencil"></i></button></td>
                            </tr>
                          ';
                          echo '
                             <!-- edit barang -->
                        <div class="modal fade" id="modal'.$array['idProduk'].'" role="dialog">
                          <div class="modal-content" style="width:40vw;margin-top:10vh; margin-left:30vw">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 style="margin-left:150px"><strong>Edit Produk</strong></h4>
                            </div>
                            <div class="modal-body">
                                <form action="proses/updateProduk.php" method="post" role="form">
                                <input type="hidden" name="idProduk" value="'.$array['idProduk'].'">
                                <div class="form-group">
                                  <label for="harga">Harga (Jangan diisi apabila Harga tetap)</label>
                                  <input type="number" class="form-control" name="harga" id="harga">
                                </div>
                                <div class="form-group">
                                  <label for="stock">Stock Produk (Jangan diisi apabila Stock tetap)</label>
                                  <input type="number" class="form-control" id="stock" name="stock">
                                </div>
                                <button type="reset" data-dismiss="modal" class="btn btn-primary">Batal</button>
                                <button type="submit" class="btn btn-primary">Edit</button>
                              </form>
                            </div>
                          </div>
                        </div>
                        <!-- end of modal edit barang -->
                          ';
                        }
                       ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        <!-- end of tabel Produk -->

        <!-- tabel transaksi -->
        </div>
      </div>

    </div>


  </div>
  <div class="box-up" onclick="topFunction()" id="myBtn">
    <div class="btn" >
      <span><i class="glyphicon glyphicon-chevron-up"></i></span>
    </div>
    <!-- <span><i class="glyphicon glyphicon-chevron-up"></i></span> -->
  </div>

</div>
<script type="text/javascript" src="../plugin/Javascript/jquery.min.js"></script>
<script type="text/javascript" src="../plugin/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript">
// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
}

</script>
</body>
</html>