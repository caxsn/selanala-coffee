<?php 

  require('../config/config.php');
  $idUser = $_GET['idUser'];
  $total = $_GET['total'];
  $level = $_GET['level'];
  $queryTrolly = mysqli_query($conn, "SELECT * FROM tabel_trolly WHERE idUser='$idUser'");
  $tanggal = date("Y-m-d H:i:s");
  $kode = "TRX-".$idUser.date("his");

  $barang = "";
  while($data = mysqli_fetch_array($queryTrolly)){
    $queryBarang = mysqli_query($conn, "SELECT * FROM tabel_produk WHERE idProduk='$data[idProduk]'");
    $arrayBarang = mysqli_fetch_array($queryBarang);
    $kategori = $arrayBarang['kategori'];
    $nama = $arrayBarang['nama'];
    $jumlah = $data['jumlah'];
    $jumlahBarang = $arrayBarang['stock'] - $data['jumlah'];
    $updateJumlah = mysqli_query($conn, "UPDATE tabel_produk SET stock='$jumlahBarang' WHERE idProduk='$data[idProduk]'");
  }

  $queryInsert = mysqli_query($conn, "INSERT INTO tabel_transaksi (kdTransaksi, idUser, daftarBarang, level, jumlah, tanggal, total, status) VALUES ('$kode','$idUser', '$nama', '$level', '$jumlah', '$tanggal', '$total','Belum Diproses')");

  $query = mysqli_query($conn, "DELETE FROM tabel_trolly WHERE idUser='$idUser'");
  
  if($query){
    echo '
      <script>
      alert("Terima Kasih sudah Berbelanja, Barang anda akan segera kami kirim setelah pembayaran dilakukan. Semoga anda nyaman dengan layanan kami.!");
      window.location = "../index.php";
      </script>
    ';
  }
 ?>