<?php 
  require('../config/db.php');

  if(isset($_POST['submit'])){

    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $path = "../../image/produk/".$gambar;
  
    if(move_uploaded_file($tmp, $path)){ 
      $query = mysqli_query($conn, "INSERT INTO tabel_produk (idProduk, idKategori, nama, harga, stok, path, deskripsi) VALUES ('$kode', '$kategori','$nama','$harga','$stok','$gambar','$deskripsi')");

      if($query){
        echo '
        <script>
        alert("Produk berhasil ditambahkan !");
        window.location = "../index.php";
        </script>
      ';
      }else{
        echo '
        <script>
        alert("Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data produk.");
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