<?php 
  require('../config/db.php');

  if(isset($_POST['submit'])){

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
   
      $query = mysqli_query($conn, "UPDATE tabel_user SET namaUser = '$nama', email = '$email', alamat = '$alamat', telp='$telp' WHERE idUser = '$id'");

      if($query){
        echo '
        <script>
        alert("User berhasil diupdate !");
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