        <!-- Start Sample Area -->
			<section class="sample-text-area">
				<div class="container">
					<div class="section-top-border">
						<h3 class="mb-30 title_color"><center>SELAMAT DATANG <?php echo strtoupper($nama);?></center></h3>
						<br>
						<div class="row">
							<div class="col-md-4">
								<div class="single-defination">
									<center>
									<h4 class="mb-20">Kelas</h4>
									<p>Untuk membuat, mengedit, atau menghapus kelas, silahkan klik tombol dibawah ini :</p>
									<br>
									<a href="<?=base_url('pengajar/kelola_kelas/k_kelas')?>" class="genric-btn success circle arrow">Kelas<span class="lnr lnr-arrow-right"></span></a>
									</center>
									<br>
								</div>
							</div>
							<div class="col-md-4">
								<div class="single-defination">
									<center>
									<h4 class="mb-20">Materi</h4>
									<p>Untuk membuat, mengedit, atau menghapus Materi, silahkan klik tombol dibawah ini :</p>
									<p><b>(Catatan : Sebelum membuat materi, Silahkan buat kelas terlebih dahulu!)</b></p>
									<a href="<?=base_url('pengajar/kelola_kelas/k_materi_buat')?>" class="genric-btn primary circle arrow">Materi<span class="lnr lnr-arrow-right"></span></a>
									</center>
									<br>
								</div>
							</div>
							<div class="col-md-4">
								<div class="single-defination">
									<center>
									<h4 class="mb-20"><center>Akun</center></h4>
									<p>Untuk mengedit Nama, Email, atau Password, silahkan klik tombol dibawah ini :</p>
									<br>
									<a href="<?=base_url('pengajar/kelola_kelas/akun_pengajar')?>" class="genric-btn warning circle arrow">Akun<span class="lnr lnr-arrow-right"></span></a>
									</center>
									<br>
								</div>
							</div>
						</div>
						<br>
						<br>
					</div>
				</div>
			</section>