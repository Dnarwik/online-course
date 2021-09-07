

      <!-- Start Sample Area -->
      <section class="sample-text-area">
        <div class="container">
          <br>
          <h3 class="text-heading title_color"><center>Pembayaran</center></h3>
          <div class="row">
              <div class="col-md-4">
                <div class="single-defination">
                </div>
              </div>
              <div class="col-md-4">
                <div class="single-defination">
                  <form method="post" enctype="multipart/form-data" action="<?php echo site_url('peserta/login/bayar/');?>">
                    <p>Nominal Pembayaran :</p>
                    <div class="input-group mb-3">
                      <input name="nominal" class="form-control" placeholder="Masukkan nominal pembayaran" value="0">
                    </div>
                    <p>Tanggal membayar :</p>
                    <div class="input-group mb-3">
                      <input type="date" name="tgl_bayar" class="form-control">
                    </div>
                    <p>Upload Bukti Pembayaran :</p>
                    <div class="input-group mb-3">
                      <input class="form-control" type="file" name="image">
                    </div>
                    <div class="row">
                      <div class="col-8">
                      </div>
                      <!-- /.col -->
                      <div class="col-4">
                        <input type="submit" value="Simpan"/>
                      </div>
                      <!-- /.col -->
                    </div>
                  </form>
                  <br>
                  <h4><b>QnA</b></h4>
                  <p>Q : Kenapa ketika login muncul halaman pembayaran? <br>A : Ada dua kemungkinan. Anda belum melakukan pembayaran. Atau mungkin ada kesalahan teknis seperti Admin lupa, error, dll.</p>
                  <p>Q : Apa yang harus saya lakukan jika ada kesalahan teknis seperti admin lupa, error, dll ?<br>A : Silahkan menghubungi admin atau yang bersangkutan melalui kontak yang telah disediakan.</p>
                </div>
              </div>
          </div>
          <br>
          <br>
          <br>
        </div>
      </section>