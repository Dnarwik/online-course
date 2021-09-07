  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kelas</h1>
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
          <!-- Table kelas-->
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Daftar Kelas</h3>
                </div>
                <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Nama Kelas</th>
                        <th>Nama Pengajar</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php 
                        foreach ($kelas as $key): 
                      ?>
                      <tr>
                        <td><?php echo $key->nama_kelas ?></td>
                        <td>
                          <?php
                          foreach($pengajar as $pen)
                            {
                              if ( $pen->id == $key->id_pengajar )
                                echo $pen->nama;
                            }
                          ?>
                        </td>
                        <td><?php echo substr($key->deskripsi, 0, 60) ?></td>
                        <td>
                          <a href="<?php echo site_url('admin/manajemen/h_kelas_edit/'.$key->id);?>" type="button" class="btn btn-info">
                            edit
                          </a>
                          <a href="<?php echo site_url('admin/manajemen/hapus_kelas/'.$key->id);?>" type="button" class="btn btn-danger">
                            Hapus
                          </a>
                          </td>
                        </tr>
                        <?php 
                          endforeach; 
                        ?>
                      </tfoot>
                    </table>
                  <!-- /.Table kelas-->
                  </div>
                  <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
              <!-- /.col -->
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Buat Kelas</h3>
                </div>
                <div class="card-body">
                <form action="<?php echo site_url('admin/manajemen/buat_kelas/');?>" method="post">
                  <div class="form-group">
                     <label>Nama Pengajar</label>
                    <div class="form-group">
                        <select name="id_pengajar" class="form-control">
                          <?php
                            foreach ($pengajar as $key) 
                            {
                          ?>
                            <option value="<?php echo $key->id ?>"><?php echo $key->nama ?></option>
                          <?php
                            }
                          ?>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Nama kelas</label>
                    <input class="form-control" id="email" name="nama_kelas" placeholder="Kelas">
                  </div>
                  <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea class="form-control" rows="3" name="deskripsi" placeholder="Masukkan Deskripsi"></textarea>
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
