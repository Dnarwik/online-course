      <!-- Start Sample Area -->
      <section class="sample-text-area">
        <div class="container">
          <br>
          <h3 class="text-heading title_color"><center>Edit Akun</center></h3>
          <div class="row">
              <div class="col-md-4">
                <div class="single-defination">
                </div>
              </div>
              <div class="col-md-4">
                <div class="single-defination">
                  <form action="<?=base_url('peserta/kelas/edit_akun/'.$akun['id'])?>" method="post">
                    <div class="input-group mb-3">
                      <input name="nama" class="form-control" placeholder="Masukkan Nama" value="<?php echo($akun['nama']);?>">
                    </div>
                    <div class="input-group mb-3">
                      <input name="email" type="email" class="form-control" placeholder="Masukkan Email" value="<?php echo($akun['email']);?>">
                    </div>
                    <p><b>Note : Kolom dibawah ini tidak perlu diisi jika tidak ingin mengganti password!!</b></p>
                    <div class="input-group mb-3">
                      <input name="password_lama" type="password" class="form-control" placeholder="Masukkan Password Lama">
                    </div>
                    <div class="input-group mb-3">
                      <input name="password_baru" type="password" class="form-control" placeholder="Masukkan Password Baru">
                    </div>
                    <div class="input-group mb-3">
                      <input name="password_konfirm" type="password" class="form-control" placeholder="Masukkan Konfirmasi Password Baru">
                    </div>
                    <div class="row">
                      <div class="col-8">
                      </div>
                      <!-- /.col -->
                      <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                      </div>
                      <!-- /.col -->
                    </div>
                  </form>
                </div>
              </div>
          </div>
          <br>
          <br>
          <br>
        </div>
      </section>