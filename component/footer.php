<!-- footer -->
  <div class="container-fluid" id="footer">
    <div class="row">
    <div class="col-xs-4 col-xs-offset-1 text-white">
      <h3 style="font-family:Roboto">Tentang Kami </h3>
      <hr>
        <p style="padding-left:0;margin-top: 8px; font-family: Eras Demi ITC; font-size: 17px">
        Selanala merupakan Toko online yang menyediakan berbagai jenis biji kopi pilihan.</p>
      </div>
  
      <div class="col-xs-4 col-xs-offset-1 text-white">
      <h3 style="font-family:Roboto">Komentar </h3>
      <hr>
      <br>
        <form action="./proses/komentar.php" method="post" role="form">
          <div class="form-group">
            <label for="nama">Nama : </label>
            <input type="text" class="form-control" name="nama" placeholder="Nama">
          </div>
          <div class="form-group">
            <label for="email">Email : </label>
            <input type="text" class="form-control" name="email" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="pesan">Pesan : </label>
            <textarea class="form-control" name="pesan" placeholder="Masukkan pesan "></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
      </div>

    </div>
    <div class="row" id="cpy">
      <div class="col-xs-12">
        <p style="color : white; text-align: center;">&copy; 2018 - Selanala</p>
      </div>
    </div>
  </div>
<!-- end of footer -->