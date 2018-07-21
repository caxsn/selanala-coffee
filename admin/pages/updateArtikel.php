<?php
include('../config/db.php');

$id = $_POST['id'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$tanggal = Date('Y-m-d');

if(isset($_POST['ubah_gambar'])){
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $path = "../../image/artikel/".$gambar;

  if(move_uploaded_file($tmp, $path)){

    $query = mysqli_query($conn, "SELECT * FROM tabel_artikel WHERE idArtikel= '$id'");
    $data = mysqli_fetch_array($query);

    if(is_file("../../image/artikel/".$data['path'])) 
      unlink("../../image/artikel/".$data['path']);
    
    $querygmbr = mysqli_query($conn, "UPDATE tabel_artikel SET judul = '$judul', deskripsi = '$deskripsi', path = '$gambar', tanggal = '$tanggal'  WHERE idArtikel = '$id'");
    if($querygmbr){ 
      echo ' <script>
      alert("Artikel dan gambar berhasil diupdate !");
      window.location = "../index.php";
      </script>
      ';
    }else{
      echo ' <script>
      alert("Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.");
      window.location = "../index.php";
      </script>
      ';
    }
  }else{
    echo ' <script>
      alert("Artikel dan gambar GAGAL diupdate !");
      window.location = "../index.php";
      </script>
      ';
  }
}else{ 
  $queryupd = mysqli_query($conn,"UPDATE tabel_artikel SET judul = '$judul', deskripsi = '$deskripsi', tanggal = '$tanggal' WHERE idArtikel = '$id' ");
  if($queryupd){ 
    echo ' <script>
    alert("Artikel berhasil diupdate !");
    window.location = "../index.php";
    </script>
    ';
  }else{
    echo ' <script>
    alert("Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.");
    window.location = "../index.php";
    </script>
    ';
  }
}
$conn->close();
?>