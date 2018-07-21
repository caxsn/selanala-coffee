<?php 
  require('../config/db.php');

  if(isset($_POST['submit'])){

    $tanggal = Date('Y-m-d');
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $path = "../../image/artikel/".$gambar;
  
    if(move_uploaded_file($tmp, $path)){ 
      $query = mysqli_query($conn, "INSERT INTO tabel_artikel (judul, deskripsi, path, tanggal) VALUES ('$judul', '$deskripsi', '$gambar', '$tanggal')");

      if($query){
        echo '
        <script>
        alert("Artikel berhasil ditambahkan !");
        window.location = "../index.php";
        </script>
      ';
      }else{
        echo '
        <script>
        alert("Maaf, Terjadi kesalahan saat mencoba untuk menyimpan artikel.");
        window.location = "../index.php";
        </script>
      ';
      }
    }else{
      echo '
        <script>
        alert(Maaf, Gambar gagal untuk diupload.);
        window.location = "../index.php";
        </script>
      ';
    
    mysqli_close($conn);
  }
}



?>