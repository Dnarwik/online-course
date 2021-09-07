
        <!--================Courses Area =================-->
        <section class="courses_area p_120">
        	<div class="container">
        		<div class="main_title">
        			<h2><?php echo $kelas['nama_kelas'];?></h2>
        			<p><?php echo $kelas['deskripsi'];?></p>
        		</div>
        		<p><center><b>PROGRESS BELAJAR</b></center></p>
        		<div class="progress">
        			<?php
        				$jumlah_materi = 0;
        				foreach ($materi as $key){$jumlah_materi++;}
        				$persentase = (($progress[0]->step)/$jumlah_materi)*100;
        			?>
					<div class="progress-bar" role="progressbar" style="width: <?php echo $persentase;?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $persentase;?>%</div>
				</div>
				<br>
		        <div class="row courses_inner">
		        	<?php 
		        		$i=0;
						foreach (array_slice($materi, 0, $progress[0]->step) as $key):
							$i++;
							if ($i>=$jumlah_materi) {
								$i=$jumlah_materi-1;
							}
					?>
		            <div class="col-md-6">
		              	<div class="single-defination">
		              		<div class="courses_item">
								<img src="<?=base_url('assets/')?>img/courses/book.jpg" alt="">
								<div class="hover_text">
									<a href="#"><h4><?php echo $key->judul_materi ?></h4></a>
									<h4>Step : <?php echo $key->step ?></h4>
									<br>
									<br>
									<br>
									<a class="cat" style="background: #170970; border: #170970;" href="<?php echo site_url('peserta/kelas/tampil_materi/'.$jumlah_materi.'/'.$key->id.'/'.$i) ?>">Pelajari</a>
									<br>
								</div>
							</div>
		              	</div>
		              	<br>
		            </div>
		            <?php 
						endforeach; 
					?>
		       	</div>
        	</div>
        </section>
        <!--================End Courses Area =================-->
        