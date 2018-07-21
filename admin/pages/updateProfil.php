<?php
include('../config/db.php');

$id = $_POST['id'];
$deskripsi = $_POST['deskripsi'];
$tmp_name = "../../temp/";

if(isset($_POST['ubah_gambar'])){
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $path = "../../image/".$gambar;

  if(move_uploaded_file($tmp, $path)){
    chmod($path, 0755);
    $query = mysqli_query($conn, "SELECT * FROM tabel_profil WHERE idProfil = '$id'");
    $data = mysqli_fetch_array($query);

    if(is_file("../../image/".$data['path'])) 
      unlink("../../image/".$data['path']);
    
    $querygmbr = mysqli_query($conn, "UPDATE tabel_profil SET deskripsi = '$deskripsi', path = '$gambar' WHERE idProfil = '$id'");
    if($querygmbr){ 
      echo ' <script>
      alert("Profil dan gambar berhasil diupdate !");
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
      alert("Profil dan gambar GAGAL diupdate !");
      window.location = "../index.php";
      </script>
      ';
  }
}else{ 
  $queryupd = mysqli_query($conn, "UPDATE tabel_profil SET deskripsi = '$deskripsi' WHERE idProfil = '$id' ");
  if($queryupd){ 
    echo ' <script>
    alert("Profil berhasil diupdate !");
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