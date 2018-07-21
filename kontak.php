<?php 
  require('config/config.php');
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Kontak - Selanala Coffee</title>
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
      <h3 style="font-family: Roboto; font-size:2.2em;"><strong>Kontak</strong></h3>
    </div>
  </div>
  <div class="kontak">
    <div class="container">
    <div class="col-xs-6">
  <h1>Kontak Kami</h1>
  <form method="post" action="sendkontak.php">
    <div class="form-group">
      <label for="nama">Nama Anda:</label>
      <input name="nama" id="nama" type="text" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="email">Email Anda:</label>
      <input name="email" id="email" type="email" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="pesan">Pesan anda:</label>
      <textarea name="pesan" type="text" class="form-control" id="pesan"></textarea>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
  </form>
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