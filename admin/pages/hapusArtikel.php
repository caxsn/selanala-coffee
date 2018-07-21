<?php 
  session_start();
  if(!isset($_SESSION['idAdmin'])){
    header('location: ../index.php');
  } else {
  include('../config/db.php');

  $id = $_GET['idArtikel'];

  $query = mysqli_query($conn, "SELECT * FROM tabel_artikel WHERE idArtikel= '$id'");
  $data = mysqli_fetch_array($query);

  if(is_file("../../image/artikel/".$data['path'])) 
    unlink("../../image/artikel/".$data['path']);

  $query2 = mysqli_query($conn, "DELETE FROM tabel_artikel WHERE idArtikel = '$id'");
  if($query2){
    echo '
      <script>
      alert("Artikel berhasil dihapus !");
      window.location = "../index.php";
      </script>
    ';
  }
}
 ?>