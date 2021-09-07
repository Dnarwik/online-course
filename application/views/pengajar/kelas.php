        <!-- Start Sample Area -->
			<section class="sample-text-area">
				<div class="container">
					<div class="section-top-border">
						<h3 class="mb-30 title_color"><center>KELAS</center></h3>
						<br>
						<div class="row about_inner">
        			<div class="col-lg-12">
						<div id="accordionExample">
							<div class="card">
								<div class="card-header" id="headingOne">
									<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									List Kelas
									</button>
								</div>

								<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
									<div class="card-body">
										<!-- DataTables -->
										<div class="table-responsive">
											<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
												<th>Nama Kelas</th>
												<th>Deskripsi</th>
												<th>Aksi</th>
												<?php 
												foreach ($kelas as $key): 
												?>
												<tr>
												<td width="20%">
													<?php echo $key->nama_kelas ?>
												</td>
												<td width="60%" class="small">
													<?php echo $key->deskripsi ?>		
												</td>
												<td width="20%">
													<a href="<?php echo site_url('pengajar/kelola_kelas/k_kelas_edit/'.$key->id) ?>"
													 class="genric-btn primary circle">Edit</a>
													<a onclick=""
													 href="<?php echo site_url('pengajar/kelola_kelas/hapus_kelas/'.$key->id) ?>" class="genric-btn danger circle">Hapus</a>
												</td>
												</tr>
												<?php 
												endforeach; 
												?>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingTwo">
									<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									Buat Kelas
									</button>
								</div>
								<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
									<div class="card-body">
										<form action="<?php echo site_url('pengajar/kelola_kelas/buat_kelas');?>" method="post">
											<div class="mt-10">
												<center><h4>Nama kelas</h4></center>
												<input type="text" name="nama_kelas" placeholder="Masukkan nama kelas" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan nama kelas'" required class="single-input">
											</div>
											<div class="mt-10">
												<center><h4>Deskripsi</h4></center>
												<textarea name="deskripsi" class="single-textarea" placeholder="Masukkan Deskripsi Kelas" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan deskripsi kelas'" required></textarea>
											</div>
											<br>
											<button type="submit" class="btn btn-primary">Buat Kelas</button>
										</form>
									</div>
								</div>
							</div>
						</div>
        			</div>
        		</div>
				<br>
				<br>
			</section>