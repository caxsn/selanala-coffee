<?php 
  require('config/config.php');
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Selanala Coffee - Toko Biji Kopi Online</title>
  <link rel="stylesheet" type="text/css" href="plugin/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="asset/css/main.css">
  <link rel="icon" type="image/gif/png" href="asset/img/icons.png">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>

<?php include('component/nav.php'); ?>
<div class="container-fluid" id="isi" >
  

  <div class="row">
    <div class="col-xs-2 col-xs-offset-5" id="bijikopi">
      <h3 style="font-family: Roboto; font-size:2.2em;"><strong>Biji Kopi Terbaru</strong></h3>
    </div>
  </div>
  
  <div class="container" id="produk">
    <div class="tab-content">
      <!-- Produk Kopi -->
      <div id="kopi" class="tab-pane fade in active">
      <ul>
      <?php 
        require("config/config.php");
        $limit = 4;
        $sql = mysqli_query($conn, "SELECT count(no) FROM tabel_produk");
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
        $queryKopi = "SELECT * FROM tabel_produk ORDER BY idProduk DESC LIMIT $offset,$limit";
        $query_Kopi = mysqli_query($conn, $queryKopi);

        while($arrayKopi = mysqli_fetch_array($query_Kopi)){
          echo '
            <li>
              <a href="#'.$arrayKopi['no'].'">
                <img style="height = 5px; width=5px;" src="image/produk/'.$arrayKopi['path'].'" alt="'.$arrayKopi['nama'].'">
                <span class="produkhover">'.$arrayKopi['nama'].'</span>
              </a>
              <div class="overlay" id="'.$arrayKopi['no'].'">
                <a href="#" class="close"><i class="glyphicon glyphicon-remove"></i></a>
                <img src="image/produk/'.$arrayKopi['path'].'">
                <div class="keterangan">
                  <div class="container">
                    <h4><strong>'.$arrayKopi['nama'].'</strong></h4>
                    <p>'.$arrayKopi['deskripsi'].'</p>
                    <h5>Rp.'.$arrayKopi['harga'].'</h5>
                    <button type="button" class="btn btn-success">Stock : '.$arrayKopi['stok'].'</button>
                    ';
              if(isset($_SESSION['idUser'])){
                if($arrayKopi['stok'] > 0){
                  echo '
                  <a href="proses/beli.php?idProduk='.$arrayKopi['idProduk'].'&idUser='.$iduser.'"><button type="button" class="btn btn-info">Masukkan Keranjang</button></a>
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

<div class="row">
    <div class="col-xs-2 col-xs-offset-5" id="bijikopi">
      <h3 style="font-family: Roboto; font-size:2.2em;"><strong>Artikel Terbaru</strong></h3>
    </div>
</div>

<div class="container">
 <div class="artikelindex">
    <?php
    require("config/config.php");
    $queryartikel = mysqli_query($conn,"SELECT * FROM tabel_artikel ORDER BY idArtikel DESC LIMIT 2" );
    $num = mysqli_num_rows($queryartikel);

    if($num < 1){
			echo'<center>Tidak Ada Artikel</center>';
			} else {
    while($data = mysqli_fetch_array($queryartikel)) {
      $artikelcut = substr($data['deskripsi'],0,150);
      echo '
            <div class="col-md-6">
            <div class="card mb-4">
            <img class="card-img-top" width="300px" height="300px" src="image/artikel/'.$data['path'].'" alt="'.$data['judul'].'">
            <div class="card-body">
              <h2 class="card-title">'.$data['judul'].'</h2>
              <p class="card-text">'.$artikelcut.'</p>
              <a href="readmore.php?p='.$data['idArtikel'].'" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
            Diposting pada '.$data['tanggal'].'
            </div>
            </div>
            </div>
      ';
    }
  }
    ?>
  
</div>
</div>

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
    <!-- end of index -->
    </div>
    
      </div>
</div>




<?php include('component/footer.php'); ?>


<script type="text/javascript" src="plugin/Javascript/jquery.min.js"></script>
<script type="text/javascript" src="plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="asset/js/script.js"></script>
</body>
</html>