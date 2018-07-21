<?php 
require('../config/config.php');

$idTrolly = $_GET['idTrolly'];

$query = mysqli_query($conn, "DELETE FROM tabel_trolly WHERE idTrolly='$idTrolly' ");

if($query){
  header('location: ../keranjang.php');
}


 ?>