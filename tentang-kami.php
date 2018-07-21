<?php 
require('config/config.php');
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Tentang Kami - Selanala Coffee
    </title>
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
          <h3 style="font-family: Roboto; font-size:2.2em;">
            <strong>Profil Selanala
            </strong>
          </h3>
        </div>
      </div>
      <div class="tentangkami">
        <div class="panel-body">
          <?php
          require('config/config.php');
          $sqlmsg = mysqli_query($conn,"SELECT * FROM tabel_profil");
          $data = mysqli_fetch_array($sqlmsg);
          echo '
          <div class="col-md-3">
          <img src="image/'.$data['path'].'" class="rounded img-thumbnail"" width="300px" height="300px">
          </div>
          <div class="col-md-9">
          <p>'.$data['deskripsi'].'</p>
          </div>
          ';
          ?>
        </div>
      </div>
    </div>
    <?php include('component/footer.php'); ?>
    <script type="text/javascript" src="plugin/Javascript/jquery.min.js">
    </script>
    <script type="text/javascript" src="plugin/bootstrap/js/bootstrap.js">
    </script>
    <script type="text/javascript" src="asset/js/script.js">
    </script>
  </body>
</html>
