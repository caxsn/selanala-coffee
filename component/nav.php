<!-- navbar -->
<nav class="navbar navbar-fixed">
  
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">
        <img style="width:10vw; height:7vh; padding-top:0px;" alt="Brand" src="asset/img/selanala.png">
      </a>
    </div>
    <div class="col-xs-6">
      <ul class="nav nav-pills kategori2">
        <li><a href="index.php">Home</a></li>
        <li><a href="tentang-kami.php">Tentang Kami</a></li>
        <li><a href="produk.php">Produk</a></li>
        <li><a href="artikel.php" >Artikel</a></li>
        <li><a href="kontak.php">Kontak</a></li>
      </ul>
    </div>

    <ul class="nav navbar-nav navbar-right" >
      <li class='visitor'>
      <?php 
          require('config/config.php');
          //$conn = mysqli_connect('localhost', 'root', 'zeldax27', 'kopi2');
          if(isset($_SESSION['idUser'])){
            $iduser = $_SESSION['idUser'];
            $queryUser = mysqli_query($conn, "SELECT * FROM tabel_user WHERE idUser='$_SESSION[idUser]'");
            $arrayUser = mysqli_fetch_array($queryUser);
            echo '
                Selamat Datang, '.$arrayUser['namaUser'].'
            ';
          }else{
            echo ''
            ;
          }
       ?>
      </li>
      <li>
        <?php
        require('config/config.php');
          //$conn = mysqli_connect('localhost', 'root', 'zeldax27', 'kopi2');
          if(isset($_SESSION['idUser'])){
            $iduser = $_SESSION['idUser'];
            $queryUser = mysqli_query($conn, "SELECT * FROM tabel_user WHERE idUser='$_SESSION[idUser]'");
            $arrayUser = mysqli_fetch_array($queryUser);
           // echo '
           //     <a href="proses/logout.php"><button class="btn navbar-btn" id="btn-logout" style="color:#7986cb;margin-top:-0.8vh;
            //    background-color: white;"><b>Logout</b></button></a>
           // ';
           echo '
           <div class="dropdown show" style="margin-right: 15px;">
           <a class="btn navbar-btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#7986cb;background-color: white;">
             Menu
           </a>
         
           <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
             <a class="dropdown-item" href="pesananku.php">Pesananku</a>
             <a class="dropdown-item" href="proses/logout.php">Logout</a>
           </div>
         </div>
           ';
          }else{
            echo '
                <button class="btn navbar-btn" id="btn-login"><b>Login</b></button>
            ';
          }
       ?>
      </li>
      <li style="border-left: 1px solid white">
      <?php 
      require('config/config.php');
        //$conn = mysqli_connect('localhost', 'root', 'zeldax27', 'kopi2');
        if(isset($_SESSION['idUser'])){
          echo '
            <a class="not-active" href="keranjang.php" data-toggle="tooltip" data-placement="bottom" title="Keranjang"  ><i class="glyphicon glyphicon-shopping-cart" id="trolly"></i></a>
          ';
        }else{
          echo '
            <a class="not-active" href="#" data-toggle="tooltip" data-placement="bottom" title="Keranjang"  ><i class="glyphicon glyphicon-shopping-cart" id="trolly"></i></a>
          ';
        }
       ?>


        
      </li>
      
    </ul>

  <!-- userLog -->
  <div class="container" id="log">
    <ul class="nav nav-tabs nav-justified">
      <li<a href="#flogin" data-toggle="tab" style="font-style:bold;font-size: 1.2em; color:#1c6def">Login</a></li>
    </ul>
    <div class="tab-content">
        <form action="proses/login.php" method="post" role="form" id="flogin" style="padding-top: 10px" class="tab-pane fade in active">
        <div class="form-group">
          <label for="email">Email :</label>
          <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
          <label for="pwd">Password :</label>
          <input type="password" class="form-control" id="pwd" name="password">
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
      </form>
    </div>
  </div>
</nav>
<!-- end of navbar -->