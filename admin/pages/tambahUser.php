<?php 
  require('../config/db.php');

  if(isset($_POST['submit'])){

    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pass = md5($_POST['password']);
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
   
      $query = mysqli_query($conn, "INSERT INTO tabel_user (namaUser,email,password,alamat,telp) VALUES ('$nama', '$email', '$pass', '$alamat','$telp')");

      if($query){
        echo '
        <script>
        alert("User berhasil ditambahkan !");
        window.location = "../index.php";
        </script>
      ';
      }else{
        echo '
        <script>
        alert("Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data user.");
        window.location = "../index.php";
        </script>
      ';
      }
    
    mysqli_close($conn);
  }



?>