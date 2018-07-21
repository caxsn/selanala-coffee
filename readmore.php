<?php 
   require('config/config.php');
   session_start();
   ?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Selanala Coffee</title>
        <link rel="stylesheet" type="text/css" href="plugin/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="asset/css/main.css">
        <link rel="icon" type="image/gif/png" href="asset/img/selanala.png">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>

    <body>
        <?php include('component/nav.php'); ?>
            <div class="container" style="margin-top:40px">
                <div class="row">
                    <div class="col-md-9">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php 
         require("config/config.php");
         $id = $_GET['p'];
         $hasil = mysqli_query($conn, "select * from tabel_artikel where idArtikel='$id'");
         $data=mysqli_fetch_array($hasil);
         $file = 'tabel_artikel'.$data['path'].'';
         if ($file =="tabel_artikel"){
         echo '

         <h3>'.$data['judul'].'</h3>
         <p>'.$data['tanggal'].'</p> 
         <p>'.$data['deskripsi'].'</p> 

         ';}
         else {
         echo '

         <img width="330" height="280" src="image/artikel/'.$data['path'].'" alt="" />

         <h3>'.$data['judul'].'</h3>
          <br> 
         <p>'.$data['tanggal'].'</p> 
         <p>'.$data['deskripsi'].'</p> 

         ';}
		 ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('component/footer.php'); ?>
    </body>
    <script type="text/javascript" src="plugin/Javascript/jquery.min.js"></script>
    <script type="text/javascript" src="plugin/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="asset/js/script.js"></script>

    </html>