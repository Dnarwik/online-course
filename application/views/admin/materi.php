  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Materi</h1>
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
                  <h3 class="card-title">Daftar Materi</h3>
                </div>
                <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Nama Kelas</th>
                        <th>Step</th>
                        <th>Judul Materi</th>
                        <th>Aksi</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php 
                        foreach ($materi as $key): 
                      ?>
                      <tr>
                        <td>
                          <?php
                          foreach($kelas as $kel)
                            {
                              if ( $kel->id == $key->id_kelas )
                                echo $kel->nama_kelas;
                            }
                          ?>
                        </td>
                        <td><?php echo $key->step ?></td>
                        <td><?php echo $key->judul_materi ?></td>
                        <td>
                          <a href="<?php echo site_url('admin/manajemen/h_materi_edit/'.$key->id);?>" type="button" class="btn btn-info">
                            edit
                          </a>
                          <a href="<?php echo site_url('admin/manajemen/hapus_materi/'.$key->id);?>" type="button" class="btn btn-danger">
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
                  <h3 class="card-title">Buat Materi</h3>
                </div>
                <div class="card-body">
                <form action="<?php echo site_url('admin/manajemen/buat_materi/');?>" method="post">
                  <div class="form-group">
                     <label>Nama Kelas</label>
                    <div class="form-group">
                        <select name="id_kelas" class="form-control">
                          <?php
                            foreach ($kelas as $key) 
                            {
                          ?>
                            <option value="<?php echo $key->id ?>"><?php echo $key->nama_kelas ?></option>
                          <?php
                            }
                          ?>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                     <label>Step</label>
                    <div class="form-group">
                        <select name="step" class="form-control">
                          <?php
                              for ($i=1; $i < 26 ; $i++) { 
                            ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                            <?php
                              }
                            ?>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Judul Materi</label>
                    <input class="form-control" id="email" name="judul_materi" placeholder="Judul Materi">
                  </div>
                  <div class="form-group">
                    <label>Isi Materi</label>
                    <textarea id="summernote" name="isi_materi"></textarea>
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
<script type="text/javascript" src="<?=base_url('assets/')?>adminlte/plugins/summernote/summernote-bs4.min.js"></script>
<!-- page script -->
<script type="text/javascript">
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

  $(document).ready(function(){
    $('#summernote').summernote({
      height: "300px",
      callbacks: {
        onImageUpload: function(image) {
          uploadImage(image[0]);
        },
        onMediaDelete : function(target) {
          deleteImage(target[0].src);
        }
      }
    });
   
    function uploadImage(image) {
      var data = new FormData();
      data.append("image", image);
      $.ajax({
        url: "<?php echo site_url('admin/manajemen/upload_image')?>",
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: "POST",
        success: function(url) {
          $('#summernote').summernote("insertImage", url);
        },
        error: function(data) {
          console.log(data);
        }
      });
    }
   
    function deleteImage(src) {
      $.ajax({
        data: {src : src},
        type: "POST",
        url: "<?php echo site_url('admin/manajemen/delete_image')?>",
        cache: false,
        success: function(response) {
          console.log(response);
        }
      });
    }
  });
</script>
</body>
</html>
