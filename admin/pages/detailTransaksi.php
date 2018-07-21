<?php 
  require('../config/db.php');

  if($_POST['idTransaksi']) {
    $id = $_POST['idTransaksi'];
    $sqltrx = mysqli_query($conn,"SELECT idTransaksi, kdTransaksi, c.idUser, namaUser, alamat, telp, daftarBarang, level, jumlah, tanggal, total, status FROM tabel_user c JOIN tabel_transaksi s USING (idUser) WHERE idTransaksi = '$id' ");
    $data = mysqli_fetch_array($sqltrx); }
?>

    <div class="row">
        <div class="col-lg-12">
            <table class="table">
                <tbody>
                    <tr>
                        <th>Kode Transaksi</th>
                        <td>
                            <?php echo $data['kdTransaksi']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Nama Pembeli</th>
                        <td>
                            <?php echo $data['namaUser']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>
                            <?php echo $data['alamat']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Telepon</th>
                        <td>
                            <?php echo $data['telp']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Produk</th>
                        <td>
                            <?php echo $data['daftarBarang']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Level</th>
                        <td>
                            <?php echo $data['level']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td>
                            <?php echo $data['jumlah']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Tanggal Pembelian</th>
                        <td>
                            <?php echo $data['tanggal']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <td>
                            <?php echo $data['total']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <form id="updatetrx" method="POST" action="updateTransaksi.php">
                                <input type="hidden" name="id" value="<?php echo $data['idTransaksi']; ?>">
                                <select class="form-control input-xs" name="statustrx">
                                    <option value="Belum Diproses">Belum Diproses</option>
                                    <option value="Sedang Diproses">Sedang Diproses</option>
                                    <option value="Sudah Dikirim">Sudah Dikirim</option>
                                </select>
                                <div class="modal-footer">
                                            <button type="reset" class="btn btn-default" data-dismiss="modal">Batal</button>
                                            <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                                        </div>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>