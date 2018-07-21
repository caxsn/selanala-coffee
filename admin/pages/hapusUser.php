<?php 
  session_start();
  if(!isset($_SESSION['idAdmin'])){
    header('location: ../index.php');
  } else {
  include('../config/db.php');

  $id = $_GET['idUser'];

  $query = mysqli_query($conn, "DELETE FROM tabel_user WHERE idUser = '$id'");
  if($query){
    echo '
      <script>
      alert("User berhasil dihapus !");
      window.location = "../index.php";
      </script>
    ';
  }
}
 ?>