  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Jumlah User Pengajar</span>
                <span class="info-box-number">
                  <?php
                    $pengajar_all = 0;
                    $pengajar_aktif = 0;
                    foreach ($pengajar as $key) {
                      if($key->aktif == 1){
                        $pengajar_aktif++;
                      }
                      $pengajar_all++;
                    }
                    echo $pengajar_all;
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">User Pengajar yang Aktif</span>
                <span class="info-box-number">
                  <?php
                    echo $pengajar_aktif;
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah User Peserta</span>
                <span class="info-box-number">
                  <?php
                    $peserta_all = 0;
                    $peserta_aktif = 0;
                    foreach ($peserta as $key) {
                      if($key->aktif == 1){
                        $peserta_aktif++;
                      }
                      $peserta_all++;
                    }
                    echo $peserta_all;
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">User Peserta yang Aktif</span>
                <span class="info-box-number">
                  <?php
                    echo $peserta_aktif;
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-12">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-two-pengajar-tab" data-toggle="pill" href="#custom-tabs-two-pengajar" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Daftar User Pengajar</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-peserta-tab" data-toggle="pill" href="#custom-tabs-two-peserta" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Daftar User Peserta</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  <div class="tab-pane fade" id="custom-tabs-two-peserta" role="tabpanel" aria-labelledby="custom-tabs-two-peserta-tab">
                    <!-- Table Peserta-->
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Daftar user Peserta</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>Nama</th>
                              <th>Email</th>
                              <th>Status</th>
                              <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                              foreach ($peserta as $key): 
                            ?>
                            <tr>
                              <td><?php echo $key->nama ?></td>
                              <td><?php echo $key->email ?></td>
                              <td>
                                <?php
                                  if ($key->aktif == 1) {
                                    echo "Aktif";
                                  }
                                  elseif ($key->aktif == 0) {
                                    echo "Tidak Aktif";
                                  }
                                ?>
                              </td>
                              <td>
                                <a href="<?php echo site_url('admin/manajemen/h_user_edit/1/'.$key->id);?>" type="button" class="btn btn-info">
                                  edit
                                </a>
                                <a href="<?php echo site_url('admin/manajemen/hapus_user/1/'.$key->id);?>" type="button" class="btn btn-danger">
                                  Hapus
                                </a>
                              </td>
                            </tr>
                            <?php 
                              endforeach; 
                            ?>
                            </tfoot>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <!-- /.Table Peserta-->
                  </div>
                  <div class="tab-pane fade show active" id="custom-tabs-two-pengajar" role="tabpanel" aria-labelledby="custom-tabs-two-pengajar-tab">
                    <!-- Table Pengajar-->
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Daftar user Pengajar</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example2" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>Nama</th>
                              <th>Email</th>
                              <th>Status</th>
                              <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                              foreach ($pengajar as $key): 
                            ?>
                            <tr>
                              <td><?php echo $key->nama ?></td>
                              <td><?php echo $key->email ?></td>
                              <td>
                                <?php
                                  if ($key->aktif == 1) {
                                    echo "Aktif";
                                  }
                                  elseif ($key->aktif == 0) {
                                    echo "Tidak Aktif";
                                  }
                                ?>
                              </td>
                              <td>
                                <a href="<?php echo site_url('admin/manajemen/h_user_edit/2/'.$key->id);?>" type="button" class="btn btn-info">
                                  edit
                                </a>
                                <a href="<?php echo site_url('admin/manajemen/hapus_user/2/'.$key->id);?>" type="button" class="btn btn-danger">
                                  Hapus
                                </a>
                              </td>
                            </tr>
                            <?php 
                              endforeach; 
                            ?>
                            </tfoot>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <!-- /.Table Pengajar-->
                  </div>
                </div>
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
