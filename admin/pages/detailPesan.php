<?php 
  require('../config/db.php');

  if($_POST['idPesan']) {
    $id = $_POST['idPesan'];
    $sqlpesan = mysqli_query($conn,"SELECT * FROM tabel_pesan WHERE idPesan = '$id' ");
    $data = mysqli_fetch_array($sqlpesan); }
?>

    <div class="row">
    <div class="col-lg-12">
    <table class="table">
    <tbody>
        <tr>
          <th>Nama</th>
            <td><?php echo $data['nama']; ?></td>
        </tr>
        <tr>
          <th>Email</th>
            <td><?php echo $data['email']; ?></td>
        </tr>
        <tr>
          <th>Pesan</th>
            <td><?php echo $data['pesan']; ?></td>
        </tr>
    </tbody>
    </table>
    </div>
</div>