<?php 
  session_start();
  if(!isset($_SESSION['idAdmin'])){
    header('location: ../index.php');
  } else {
  include('../config/db.php');

  $id = $_GET['idProduk'];

  $query = mysqli_query($conn, "SELECT * FROM tabel_produk WHERE idProduk = '$id'");
  $data = mysqli_fetch_array($query);

  if(is_file("../../image/produk/".$data['path'])) 
    unlink("../../image/produk/".$data['path']);

  $query2 = mysqli_query($conn, "DELETE FROM tabel_produk WHERE idProduk = '$id'");
  if($query2){
    echo '
      <script>
      alert("Produk berhasil dihapus !");
      window.location = "../index.php";
      </script>
    ';
  }
}
 ?>