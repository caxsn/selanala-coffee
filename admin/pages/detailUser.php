<?php 
   require('../config/db.php');
   
   if($_POST['idUser']) {
     $id = $_POST['idUser'];
     $sqlart = mysqli_query($conn,"SELECT * FROM tabel_user WHERE idUser = $id");
     $data = mysqli_fetch_array($sqlart); }
   ?>
<div class="row">
   <div class="col-lg-12">
      <form action="updateUser.php" method="post" role="form" enctype="multipart/form-data" id="FormUserUpdate">
         <input type="hidden" name="id" value="<?php echo $data['idUser']; ?>">
         <div class="form-group">
            <label>Nama User</label>
            <input class="form-control" name="nama" value="<?php echo $data['namaUser']; ?>" required>
         </div>
         <div class="form-group">
            <label>Email</label>
            <input class="form-control" name="email" value="<?php echo $data['email']; ?>" required>
         </div>
         <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" name="alamat" rows="5" placeholder="Masukkan alamat" style="resize:none" required><?php echo $data['alamat']; ?></textarea>
         </div>
         <div class="form-group">
            <label>Telp</label>
            <input class="form-control" name="telp" value="<?php echo $data['telp']; ?>" required>
         </div>
         <div class="modal-footer">
            <button type="reset" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" name="submit" class="btn btn-success">Simpan</button>
         </div>
      </form>
   </div>
</div>