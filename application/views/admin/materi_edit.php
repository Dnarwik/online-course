  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Materi</h1>
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
              <div class="card-body">
                <form action="<?php echo site_url('admin/manajemen/edit_materi/'.$id_materi);?>" method="post">
                  <div class="form-group">
                     <label>Nama Kelas</label>
                    <div class="form-group">
                        <select name="id_kelas" class="form-control">
                          <?php 
                            foreach ($kelas as $key):
                              if($key->id==$materi['id_kelas'])
                              {
                          ?>
                              <option value="<?php echo $key->id?>" selected='true'><?php echo $key->nama_kelas?></option>";
                          <?php
                              }
                              else
                              {
                          ?> 
                              "<option value="<?php echo $key->id?>"><?php echo $key->nama_kelas?></option>"; 
                          <?php 
                              }
                          endforeach; 
                          ?>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                     <label>Step</label>
                    <div class="form-group">
                        <select name="step" class="form-control">
                          <?php
                            for ($i=1; $i < 26 ; $i++) 
                            { 
                              if($i==$materi['step'])
                              {
                          ?>
                            <option value="<?php echo $i?>" selected='true'><?php echo $i?></option>";
                          <?php
                              }
                              else
                              {
                          ?> 
                            "<option value="<?php echo $i?>"><?php echo $i?></option>"; 
                          <?php 
                              }
                            }
                          ?>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Judul Materi</label>
                    <input class="form-control" id="email" name="judul_materi" placeholder="Judul Materi" value="<?php echo($materi['judul_materi']);?>">
                  </div>
                  <div class="form-group">
                    <label>Isi Materi</label>
                    <textarea id="summernote" name="isi_materi"><?php echo($materi['isi_materi']);?></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->

      <!-- modal -->
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
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
<script type="text/javascript" src="<?=base_url('assets/')?>adminlte/plugins/summernote/summernote-bs4.min.js"></script>
<!-- page script -->
<script type="text/javascript">
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
