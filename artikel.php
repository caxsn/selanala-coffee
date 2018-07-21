<?php 
  require('config/config.php');
  session_start();
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Artikel - Selanala Coffee</title>
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
                        <h3 style="font-family: Roboto; font-size:2.2em;"><strong>Artikel</strong></h3>
                    </div>
                </div>
                <div class="container">
                    <div class="artikelindex">
    <?php
    require("config/config.php");
    $queryartikel = mysqli_query($conn,"SELECT * FROM tabel_artikel ORDER BY tanggal DESC" );
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
            </div>
            <?php include('component/footer.php'); ?>
                <script type="text/javascript" src="plugin/Javascript/jquery.min.js"></script>
                <script type="text/javascript" src="plugin/bootstrap/js/bootstrap.js"></script>
                <script type="text/javascript" src="asset/js/script.js"></script>
    </body>

    </html>