<?php 
  require('config/config.php');
  session_start();
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Produk - Selanala Coffee</title>
        <link rel="stylesheet" type="text/css" href="plugin/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="asset/css/main.css">
        <link rel="icon" type="image/gif/png" href="asset/img/icons.png">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>

    <body>

        <?php include('component/nav.php'); ?>
            <div class="container-fluid" id="isi">

                <div class="row">
                    <div class="col-xs-2 col-xs-offset-5" id="bijikopi">
                        <h3 style="font-family: Roboto; font-size:2.2em;"><strong>Produk</strong></h3>
                    </div>
                </div>

                <div class="container">
                    <ul class="nav nav-pills">
                        <li class="active">
                            <a href="#origin" data-toggle="tab">Single Origin</a>
                        </li>
                        <li><a href="#houseblend" data-toggle="tab">Houseblend</a>
                    </ul>
                </div>

                <div class="container" id="produk">
                    <div class="tab-content clear-fix">
                        <div id="origin" class="tab-pane active">
                            <ul>
                                <?php 
        require("config/config.php");
        $limit = 4;
        $sql = mysqli_query($conn, "SELECT count(idProduk) FROM tabel_produk WHERE idKategori='1'");
        $row = mysqli_fetch_array($sql, MYSQL_NUM);
        $rec_count = $row[0];
        if(isset($_GET['page'])){
          $page = $_GET['page'] + 1;
          $offset = $limit * $page;
        }else{
          $page = 0;
          $offset = 0;
        }
        $left_rec = $rec_count - ($page * $limit);
        $queryOrigin = "SELECT * FROM tabel_produk WHERE idKategori='1' LIMIT $offset,$limit";
        $query_Origin = mysqli_query($conn, $queryOrigin);

        while($arrayOrigin = mysqli_fetch_array($query_Origin)){
          echo '
            <li>
              <a href="#'.$arrayOrigin['idProduk'].'">
                <img src="image/produk/'.$arrayOrigin['path'].'" alt="'.$arrayOrigin['nama'].'">
                <span></span>
              </a>
              <div class="overlay" id="'.$arrayOrigin['idProduk'].'">
                <a href="#" class="close"><i class="glyphicon glyphicon-remove"></i></a>
                <img src="image/produk/'.$arrayOrigin['path'].'">
                <div class="keterangan">
                  <div class="container">
                    <h4><strong>'.$arrayOrigin['nama'].'</strong></h4>
                    <p>'.$arrayOrigin['deskripsi'].'</p>
                    <h5>Rp.'.$arrayOrigin['harga'].'</h5>
                    <button type="button" class="btn btn-success">Stock : '.$arrayOrigin['stok'].'</button>
                    ';
              if(isset($_SESSION['idUser'])){
                if($arrayOrigin['stok'] > 0){
                  echo '
                  <a href="proses/beli.php?idProduk='.$arrayOrigin['idProduk'].'&idUser='.$iduser.'"><button type="button" class="btn btn-info">Masukkan Keranjang</button></a>
                ';
                }else{
                  echo '
                  <button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
                ';
                }
              }else{
                echo '
                  <button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
                ';
              }
              echo '
            </div>
          </div>
        </div>
      </li>  
          ';
        }
        ?>
                                    <div class="clear"></div>
                            </ul>

                            <div class="container-fluid" id="paging">
                                <div class="paging">
                                    <?php 
      if($left_rec < $limit){
          $last = $page - 2;
          echo "<a href = \"?page=$last\"><button type='button' class='btn btn-primary left'>Previous</button></a>";
        }else if($page > 0){
          $last = $page - 2;
          echo "<a href = \"?page=$last\"><button type='button' class='btn btn-primary left'>Previous</button></a>";
          echo "<a href = \"?page=$page\"><button type='button' class='btn btn-primary right'>Next</button></a>";
        }else if( $page == 0 ) {
          echo "<a href = \"?page=$page\"><button type='button' class='btn btn-primary right'>Next</button></a>";
        }
       ?>
                                </div>
                            </div>
                        </div>
                        <!-- end of single origin -->

                        <div id="houseblend" class="tab-pane fade">
                            <ul>
                                <?php 
        require("config/config.php");
        $limit = 4;
        $sql = mysqli_query($conn, "SELECT count(idProduk) FROM tabel_produk WHERE idkategori='2'");
        $row = mysqli_fetch_array($sql, MYSQL_NUM);
        $rec_count = $row[0];
        if(isset($_GET['page'])){
          $page = $_GET['page'] + 1;
          $offset = $limit * $page;
        }else{
          $page = 0;
          $offset = 0;
        }
        $left_rec = $rec_count - ($page * $limit);
        $queryOrigin = "SELECT * FROM tabel_produk WHERE idKategori='2' LIMIT $offset,$limit";
        $query_Origin = mysqli_query($conn, $queryOrigin);

        while($arrayOrigin = mysqli_fetch_array($query_Origin)){
          echo '
            <li>
              <a href="#'.$arrayOrigin['idProduk'].'">
                <img src="image/produk/'.$arrayOrigin['path'].'" alt="'.$arrayOrigin['nama'].'">
                <span></span>
              </a>
              <div class="overlay" id="'.$arrayOrigin['idProduk'].'">
                <a href="#" class="close"><i class="glyphicon glyphicon-remove"></i></a>
                <img src="image/produk/'.$arrayOrigin['path'].'">
                <div class="keterangan">
                  <div class="container">
                    <h4><strong>'.$arrayOrigin['nama'].'</strong></h4>
                    <p>'.$arrayOrigin['deskripsi'].'</p>
                    <h5>Rp.'.$arrayOrigin['harga'].'</h5>
                    <button type="button" class="btn btn-success">Stock : '.$arrayOrigin['stok'].'</button>
                    ';
              if(isset($_SESSION['idUser'])){
                if($arrayOrigin['stock'] > 0){
                  echo '
                  <a href="proses/beli.php?idProduk='.$arrayOrigin['idProduk'].'&idUser='.$iduser.'"><button type="button" class="btn btn-info">Masukkan Keranjang</button></a>
                ';
                }else{
                  echo '
                  <button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
                ';
                }
              }else{
                echo '
                  <button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
                ';
              }
              echo '
            </div>
          </div>
        </div>
      </li>  
          ';
        }
        ?>
                                    <div class="clear"></div>
                            </ul>

                            <div class="container-fluid" id="paging">
                                <div class="paging">
                                    <?php 
      if($left_rec < $limit){
          $last = $page - 2;
          echo "<a href = \"?page=$last\"><button type='button' class='btn btn-primary left'>Previous</button></a>";
        }else if($page > 0){
          $last = $page - 2;
          echo "<a href = \"?page=$last\"><button type='button' class='btn btn-primary left'>Previous</button></a>";
          echo "<a href = \"?page=$page\"><button type='button' class='btn btn-primary right'>Next</button></a>";
        }else if( $page == 0 ) {
          echo "<a href = \"?page=$page\"><button type='button' class='btn btn-primary right'>Next</button></a>";
        }
       ?>
                                </div>
                            </div>
                        </div>

                      <!-- end of houseblend -->
                    </div>

                </div>
            </div>

            <?php include('component/footer.php'); ?>
                <script type="text/javascript" src="plugin/Javascript/jquery.min.js"></script>
                <script type="text/javascript" src="plugin/bootstrap/js/bootstrap.js"></script>
                <script type="text/javascript" src="asset/js/script.js"></script>
    </body>

    </html>