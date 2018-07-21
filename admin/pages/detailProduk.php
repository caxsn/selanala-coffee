<?php 
  require('../config/db.php');

  if($_POST['idProduk']) {
    $id = $_POST['idProduk'];
    $sqlprod = mysqli_query($conn,"SELECT * FROM tabel_produk WHERE idProduk = $id");
    $data = mysqli_fetch_array($sqlprod); }
?>

    <div class="row">
        <div class="col-lg-12">
            <form action="updateProduk.php" method="POST" enctype="multipart/form-data" id="FormProdukUpdate">
                <input type="hidden" name="id" value="<?php echo $data['idProduk']; ?>">
                <div class="form-group">
                    <label>Kode Produk</label>
                    <input class="form-control" name="kode" id="kodeproduk" maxlength="6" value="<?php echo $data['kdProduk']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Nama Produk</label>
                    <input class="form-control" value="<?php echo $data['nama']; ?>" name="nama" required>
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" name="kategori" required>
                        <option value="1">Single Origin</option>
                        <option value="2">Houseblend</option>
                        <option value="3">Langganan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input class="form-control" name="harga" value="<?php echo $data['harga']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Stok</label>
                    <input class="form-control" name="stok" value="<?php echo $data['stok']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" rows="5" style="resize:none" required><?php echo $data['deskripsi']; ?></textarea>
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
                            <img class="uploaded" src="../../image/produk/<?php echo $data['path']; ?>" width="250px" height="150px" alt="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                                            <button type="reset" class="btn btn-default" data-dismiss="modal">Batal</button>
                                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                        </div>
            </form>
        </div>
    </div>