<?php 
  require('../config/db.php');

  if($_POST['no']) {
    $id = $_POST['no'];
    $sqltrx = mysqli_query($conn,"SELECT no, idTransaksi, c.idUser, namaUser, alamat, telp, daftarBarang, jumlah, tanggal, total, status FROM tabel_user c JOIN tabel_transaksi s USING (idUser) WHERE no = '$id' ");
    $data = mysqli_fetch_array($sqltrx); }
?>

    <div class="row">
        <div class="col-lg-12">
            <table class="table">
                <tbody>
                    <tr>
                        <th>Id Transaksi</th>
                        <td>
                            <?php echo $data['idTransaksi']; ?>
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
                                <input type="hidden" name="id" value="<?php echo $data['no']; ?>">
                                <select class="form-control input-xs" name="statustrx">
                                    <option value="Belum Diproses">Belum Diproses</option>
                                    <option value="Sedang Diproses">Sedang Diproses</option>
                                    <option value="Sudah Dikirim">Sudah Dikirim</option>
                                </select>
                                <div class="modal-footer">
                                            <button type="reset" class="btn btn-default" data-dismiss="modal">Batal</button>
                                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>