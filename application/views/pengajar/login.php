<section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
              <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
          <div class="banner_content text-center">
            <h2>Masuk</h2>
            <div class="page_link">
              <a href="<?=base_url('welcome')?>">Beranda</a>
              <a href="<?=base_url('welcome/pengajar/login')?>">Masuk</a>
            </div>
          </div>
        </div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        
        <!-- Start Sample Area -->
      <section class="sample-text-area">
        <div class="container">
          <br>
          <h3 class="text-heading title_color"><center>LOGIN PENGAJAR</center></h3>
          <div class="row">
              <div class="col-md-4">
                <div class="single-defination">
                </div>
              </div>
              <div class="col-md-4">
                <div class="single-defination">
                  <form action="<?=base_url('pengajar/Login/masuk')?>" method="post">
                      <div class="input-group mb-3">
                        <input name="email" type="email" class="form-control" placeholder="Masukkan Email">
                        <div class="input-group-append">
                          <div class="input-group-text">
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input name="password" type="password" class="form-control" placeholder="Masukkan Password">
                        <div class="input-group-append">
                          <div class="input-group-text">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-8">
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                          <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                      </div>
                      <br>
                      <center><p>Belum punya akun? Daftar <a href="<?=base_url('pengajar/Login/daftar')?>">disini</a></p></center>
                    </form>
                </div>
              </div>
          </div>
          <br>
          <br>
          <br>
        </div>
      </section>