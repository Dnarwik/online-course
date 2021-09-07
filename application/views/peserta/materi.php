		<section class="courses_area p_120">
        	<div class="container">
        		<div class="main_title">
        			<h2><?php echo $materi['judul_materi'];?></h2>
        		</div>
        		<div class="row justify-content-md-center">
		            <div class="col-md-8">
		                <p><?php echo $materi['isi_materi'];?></p>
		            </div>
        		</div>
        		<br>
        		<br>
        		<?php
        			if ($materi_sebelum !== null) {
        		?>
        		<a style="background: #170970; border: #170970;" href="<?php echo site_url('peserta/kelas/tampil_materi/'.$jumlah_materi.'/'.$materi_sebelum[0]->id.'/'.$materi_sebelum[0]->step) ?>"class="genric-btn primary circle">< Sebelum</a>
        		<?php
        			}
        			if ($materi_sesudah !== null) {
        				$i=$materi_sesudah[0]->step;
        				if ($i>=$jumlah_materi) {
								$i=$jumlah_materi-1;
							}
        		?>
        		<a style="background: #170970; border: #170970; float: right;" href="<?php echo site_url('peserta/kelas/tampil_materi/'.$jumlah_materi.'/'.$materi_sesudah[0]->id.'/'.$i) ?>"class="genric-btn primary circle">Sesudah ></a>
        		<?php
        			}
        		?>
        	</div>
        </section>