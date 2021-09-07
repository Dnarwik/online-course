
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>Kelas</h2>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Courses Area =================-->
        <section class="courses_area p_120">
        	<div class="container">
        		<div class="main_title">
        			<h2>Kelas yang tersedia</h2>
        			<p>Silahkan pilih kelas yang Anda inginkan.</p>
        		</div>

		        <div class="row courses_inner">
		        	<?php 
						foreach ($kelas as $key):
					?>
		            <div class="col-md-6">
		              	<div class="single-defination">
		              		<div class="courses_item">
								<img src="<?=base_url('assets/')?>img/courses/book.jpg" alt="">
								<div class="hover_text">
									<a href="<?php echo site_url('peserta/kelas/detail_kelas/'.$key->id) ?>"><h4><?php echo $key->nama_kelas ?></h4></a>
									<br>
									<br>
									<a class="cat" style="background: #170970; border: #170970;" href="<?php echo site_url('peserta/kelas/detail_kelas/'.$key->id) ?>">Pelajari sekarang</a>
									<br>
									<ul class="list">
										<li><a href="#"><i class="lnr lnr-user"></i>
											<?php
												foreach($pengajar as $pen)
											   	{
											    	if ( $pen->id == $key->id_pengajar )
											        echo $pen->nama;
											   	}
											?>
										</a></li>
									</ul>
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
        