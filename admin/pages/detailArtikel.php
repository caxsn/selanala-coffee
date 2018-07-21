<?php 
  require('../config/db.php');

  if($_POST['idArtikel']) {
    $id = $_POST['idArtikel'];
    $sqlart = mysqli_query($conn,"SELECT * FROM tabel_artikel WHERE idArtikel = $id");
    $data = mysqli_fetch_array($sqlart); }
?>

    <div class="row">
    <div class="col-lg-12">
        <form action="updateArtikel.php" method="post" enctype="multipart/form-data" id="FormArtikelUpdate">
            <input type="hidden" name="id" value="<?php echo $data['idArtikel']; ?>">
            <div class="form-group">
                <label>Judul</label>
                <input class="form-control" value="<?php echo $data['judul']; ?>" name="judul" required>
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea class="form-control" rows="5" name="deskripsi" style="resize:none" required><?php echo $data['deskripsi']; ?> </textarea>
            </div>
            <div class="row no-gutters">
                <div class="col-md-6">
                    <div class="form-group">
                    <input type="checkbox" name="ubah_gambar" value="true"> Ceklist jika ingin mengubah gambar.
                    </div>
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" class="form-control" name="gambar" id="gambar" onchange="readURL(this);">
                        <p class="help-block">Maksimal resolusi 300px x 300px. Format Gambar .jpg, .jpeg, dan .png</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Preview</label>
                    <img class="uploaded" src="../../image/artikel/<?php echo $data['path']; ?>" width="250px" height="150px" alt="">
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>