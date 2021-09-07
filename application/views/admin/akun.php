  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kelola Akun Admin</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Edit Akun</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Ganti Password</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Buat Akun Admin</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                     <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Edit Akun</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <form action="<?php echo site_url('admin/manajemen/edit_akun_admin/'.$akun['id']);?>" method="post">
                            <div class="form-group">
                              <label>Username</label>
                              <input class="form-control" id="username" name="edit_akun_username" placeholder="Username" value="<?php echo $akun['username'];?>">
                            </div>
                            <div class="form-group">
                              <label>Email</label>
                              <input class="form-control" id="email" name="edit_akun_email" placeholder="Email" value="<?php echo $akun['email'];?>">
                            </div>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </form>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                     <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Ganti Password</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <form action="<?php echo site_url('admin/manajemen/edit_pass_admin/'.$akun['id']);?>" method="post">
                            <div class="form-group">
                              <label>Password Lama</label>
                              <input class="form-control" id="password" name="ganti_pass_lama" placeholder="Password Lama" type="password">
                            </div>
                            <div class="form-group">
                              <label>Password Baru</label>
                              <input class="form-control" id="password" name="ganti_pass_baru" placeholder="Password Baru" type="password">
                            </div>
                            <div class="form-group">
                              <label>Konfirmasi Password Baru</label>
                              <input class="form-control" id="password" name="ganti_pass_konfirm" placeholder="Konfirmasi Password Baru" type="password">
                            </div>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </form>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                     <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Buat Akun Admin</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <form action="<?php echo site_url('admin/manajemen/buat_akun_admin/');?>" method="post">
                            <div class="form-group">
                              <label>Username</label>
                              <input class="form-control" id="username" name="buat_akun_username" placeholder="Username">
                            </div>
                            <div class="form-group">
                              <label>Email</label>
                              <input class="form-control" id="email" name="buat_akun_email" placeholder="Email">
                            </div>
                            <div class="form-group">
                              <label>Password</label>
                              <input class="form-control" id="password" name="buat_akun_pass" placeholder="Password" type="password">
                            </div>
                            <div class="form-group">
                              <label>Konfirmasi Password</label>
                              <input class="form-control" id="password" name="buat_akun_pass_konfirm" placeholder="Konfirmasi Password" type="password">
                            </div>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </form>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                    <!-- /.col -->
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=base_url('assets/adminlte/')?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets/adminlte/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?=base_url('assets/adminlte/')?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url('assets/adminlte/')?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url('assets/adminlte/')?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url('assets/adminlte/')?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/adminlte/')?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('assets/adminlte/')?>dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#example2").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
