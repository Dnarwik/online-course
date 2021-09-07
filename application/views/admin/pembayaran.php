  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Pembayaran</h1>
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
                  <h3 class="card-title">Daftar Pembayaran</h3>
                </div>
                <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Nama Peserta</th>
                        <th>Tanggal Membayar</th>
                        <th>Nominal Pembayaran</th>
                        <th>Bukti Pembayaran</th>
                        <th>Aksi</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php 
                        foreach ($pembayaran as $key): 
                      ?>
                      <tr>
                        <td>
                          <?php
                          foreach($peserta as $pes)
                            {
                              if ( $pes->id == $key->id_peserta )
                                echo $pes->nama;
                            }
                          ?>
                        </td>
                        <td><?php echo $key->tgl_bayar ?></td>

                        <td><?php echo $key->nominal ?></td>
                        <td>
                          <button class="open-homeEvents btn btn-primary" data-id="<?php echo $key->bukti_pembayaran; ?>"  data-toggle="modal" data-target="#modalHomeEvents"><i class="nav-icon far fa-image"></i></button>
                        </td>
                        <td>
                          <a href="<?php echo site_url('admin/manajemen/h_pembayaran_edit/'.$key->id);?>" type="button" class="btn btn-info">
                            edit
                          </a>
                          <a href="<?php echo site_url('admin/manajemen/hapus_pembayaran/'.$key->id);?>" type="button" class="btn btn-danger">
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
                  <h3 class="card-title">Buat Pembayaran</h3>
                </div>
                <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="<?php echo site_url('admin/manajemen/bayar');?>">
                  <div class="form-group">
                     <label>Nama Peserta</label>
                    <div class="form-group">
                        <select name="id_peserta" class="form-control">
                          <?php
                            foreach ($peserta as $key) 
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
                    <label>Nominal Pembayaran</label>
                    <input class="form-control"  name="nominal" placeholder="Nominal Pembayaran">
                  </div>
                  <div class="form-group">
                    <label>Tanggal Membayar</label>
                    <input class="form-control" type="date" name="tgl_bayar">
                  </div>
                  <div class="form-group">
                    <label>Bukti Pembayaran</label>
                    <input class="form-control" type="file" name="image">
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
      <!-- Modal -->
      <div id="modalHomeEvents" class="modal fade" role="dialog">
        <div class="modal-dialog modal-xl">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="height:50px;">
              <h4 class="modal-title">Bukti Pembayaran</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="eventId" id="eventId"/>
              <center><span id="idHolder"></span></center>
            </div>
          </div>
        </div>
      </div>  
      <!-- /.modal -->
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
  $(document).on("click", ".open-homeEvents", function () {
     var eventId = "<img src=\""+$(this).data('id')+"\" alt=\"bukti_pembayaran\">";
     $('#idHolder').html( eventId );
  });
</script>
</body>
</html>
