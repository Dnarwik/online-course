
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>Kelas</h2>
						<div class="page_link">
							<a href="<?=base_url('welcome')?>">Beranda</a>
							<a href="<?=base_url('welcome/kelas')?>">Kelas</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Courses Area =================-->
        <section class="courses_area p_120">
        	<div class="container">
        		<div class="main_title">
        			<h2>Beberapa Kelas yang Tersedia</h2>
        			<p>Berikut ini adalah contoh beberapa dari semua kelas yang disediakan. Pastikan anda mempunyai akun peserta agar bisa mengakses kelas yang disediakan.</p>
        		</div>
        		<?php
        			$i = 0;
        			foreach ($kelas as $key) {
        				if ($i >= 5) {
        					break;
        				}
        				else{
        					$nama_kelas[$i] = $key->nama_kelas;
	        				foreach($pengajar as $pen)
							{
						    	if ( $pen->id == $key->id_pengajar )
							    $nama_pengajar[$i] = $pen->nama;
						   	}
						   	$i++;
						}	
        			}
        		?>
        		<div class="row courses_inner">
        			<div class="col-lg-9">
						<div class="grid_inner">
							<div class="grid_item wd55">
								<div class="courses_item">
									<img src="<?=base_url('assets/')?>img/courses/course-1.jpg" alt="">
									<div class="hover_text">
										<a href="#"><h4><?php echo $nama_kelas[0] ?></h4></a>
										<ul class="list">
											<li><a href="#"><i class="lnr lnr-user"></i><?php echo $nama_pengajar[0] ?></a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="grid_item wd44">
								<div class="courses_item">
									<img src="<?=base_url('assets/')?>img/courses/course-2.jpg" alt="">
									<div class="hover_text">
										<a href="#"><h4><?php echo $nama_kelas[1] ?></h4></a>
										<ul class="list">
											<li><a href="#"><i class="lnr lnr-user"></i><?php echo $nama_pengajar[1] ?></a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="grid_item wd44">
								<div class="courses_item">
									<img src="<?=base_url('assets/')?>img/courses/course-4.jpg" alt="">
									<div class="hover_text">
										<a href="#"><h4><?php echo $nama_kelas[2] ?></h4></a>
										<ul class="list">
											<li><a href="#"><i class="lnr lnr-user"></i><?php echo $nama_pengajar[2] ?></a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="grid_item wd55">
								<div class="courses_item">
									<img src="<?=base_url('assets/')?>img/courses/course-5.jpg" alt="">
									<div class="hover_text">
										<a href="#"><h4><?php echo $nama_kelas[3] ?></h4></a>
										<ul class="list">
											<li><a href="#"><i class="lnr lnr-user"></i><?php echo $nama_pengajar[3] ?></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
        			</div>
        			<div class="col-lg-3">
        				<div class="course_item">
							<img src="<?=base_url('assets/')?>img/courses/course-3.jpg" alt="">
							<div class="hover_text">
								<a href="#"><h4><?php echo $nama_kelas[4] ?></h4></a>
								<ul class="list">
									<li><a href="#"><i class="lnr lnr-user"></i><?php echo $nama_pengajar[4] ?></a></li>
								</ul>
							</div>
						</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Courses Area =================-->
        