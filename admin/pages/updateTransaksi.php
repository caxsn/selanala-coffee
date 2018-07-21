<?php
include('../config/db.php');

$id = $_POST['id'];
$stat = $_POST['statustrx'];

    $sql = "UPDATE tabel_transaksi SET status = '$stat' WHERE no = '$id'";
    $ex = $conn->query($sql);
    if ($ex) {
      echo ' <script>
      alert("Transaksi berhasil diupdate !");
      window.location = "../index.php";
      </script>
      ';
    } else {
      echo ' <script>
      alert("Transaksi GAGAL diupdate!");
      window.location = "../index.php";
      </script>
      ';
    }
$conn->close();
?>