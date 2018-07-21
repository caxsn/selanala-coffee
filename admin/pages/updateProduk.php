<?php
include('../config/db.php');

$id = $_POST['id'];
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$deskripsi = $_POST['deskripsi'];

if(isset($_POST['ubah_gambar'])){
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $path = "../../image/produk/".$gambar;

  if(move_uploaded_file($tmp, $path)){

    $query = mysqli_query($conn, "SELECT * FROM tabel_produk WHERE idProduk = '$id'");
    $data = mysqli_fetch_array($query);

    if(is_file("../../image/produk/".$data['path'])) 
      unlink("../../image/produk/".$data['path']);
    
    $querygmbr = mysqli_query($conn, "UPDATE tabel_produk SET kdProduk = '$kode', nama = '$nama', idKategori = '$kategori', harga = '$harga', stok = '$stok', deskripsi = '$deskripsi', path = '$gambar'  WHERE idProduk = '$id'");
    if($querygmbr){ 
      echo ' <script>
      alert("Produk dan gambar berhasil diupdate !");
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
      alert("Produk dan gambar GAGAL diupdate !");
      window.location = "../index.php";
      </script>
      ';
  }
}else{ 
  $queryupd = mysqli_query($conn,"UPDATE tabel_produk SET kdProduk = '$kode', nama = '$nama', idKategori = '$kategori', harga = '$harga', stok = '$stok', deskripsi = '$deskripsi' WHERE idProduk = '$id'");
  if($queryupd){ 
    echo ' <script>
    alert("Produk berhasil diupdate !");
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