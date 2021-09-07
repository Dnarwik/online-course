  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Pembayaran</h1>
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
            <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Buat Pembayaran</h3>
                </div>
                <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="<?php echo site_url('admin/manajemen/edit_bayar/'.$id_pembayaran);?>">
                  <div class="form-group">
                     <label>Nama Peserta</label>
                    <div class="form-group">
                        <select name="id_peserta" class="form-control">
                          <?php 
                            foreach ($peserta as $key):
                              if($key->id==$pembayaran['id_peserta'])
                              {
                          ?>
                              <option value="<?php echo $key->id?>" selected='true'><?php echo $key->nama ?></option>";
                          <?php
                              }
                              else
                              {
                          ?> 
                              "<option value="<?php echo $key->id?>"><?php echo $key->nama ?></option>"; 
                          <?php 
                              }
                          endforeach; 
                          ?>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Nominal Pembayaran</label>
                    <input class="form-control"  name="nominal" placeholder="Nominal Pembayaran" value="<?php echo $pembayaran['nominal']?>">
                  </div>
                  <div class="form-group">
                    <label>Tanggal Membayar</label>
                    <input class="form-control" type="date" name="tgl_bayar" value="<?php echo $pembayaran['tgl_bayar']?>">
                  </div>
                  <div class="form-group">
                    <label>Bukti Pembayaran</label>
                  </div>
                  <div class="form-group">
                    <img src="<?php echo $pembayaran['bukti_pembayaran']?>" alt="Foto/Gambar Bukti pembayaran">
                  </div>
                  <div class="form-group">
                    <a href="<?php echo site_url('admin/manajemen/hapus_bukti/'.$id_pembayaran);?>" type="button" class="btn btn-danger">Hapus Bukti Pembayaran</a>
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="file" name="image">
                    <p>Catatan : Jika ingin mengubah Foto/Gambar bukti pembayaran. Silahkan dihapus terlebih dahulu. Lalu upload bukti pembayaran yang lain.</p>
                  </div>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
                  </div>
                  <!-- /.card-body -->
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
</body>
</html>
