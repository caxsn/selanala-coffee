<?php
require("config/config.php");
$nama   = $_POST['nama'];
$email  = $_POST['email'];
$pesan = $_POST['pesan'];

$input = mysqli_query($conn, "INSERT INTO tabel_pesan(nama,email,pesan) VALUES ('$nama','$email','$pesan')");

if ($input)
{
header("location:index.php");
}
else
{
echo "Kirim Pesan Gagal";
}
?>