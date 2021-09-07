<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="<?=base_url('assets/')?>img/favicon.png" type="image/png">
        <title>Learn IT Education</title>
        <!-- Bootstrap CSS -->
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?=base_url('assets/')?>css/bootstrap.css">
        <link rel="stylesheet" href="<?=base_url('assets/')?>vendors/linericon/style.css">
        <link rel="stylesheet" href="<?=base_url('assets/')?>css/font-awesome.min.css">
        <link rel="stylesheet" href="<?=base_url('assets/')?>vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="<?=base_url('assets/')?>vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="<?=base_url('assets/')?>vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="<?=base_url('assets/')?>vendors/animate-css/animate.css">
        <link rel="stylesheet" href="<?=base_url('assets/')?>vendors/popup/magnific-popup.css">
        <!-- main css -->
        <link rel="stylesheet" href="<?=base_url('assets/')?>css/style.css">
        <link rel="stylesheet" href="<?=base_url('assets/')?>css/responsive.css">
        <!-- summernote -->
        <link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>adminlte/plugins/summernote/summernote-bs4.css">
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
        <header class="header_area">
           	<div class="top_menu row m0">
           		<div class="container">
					<div class="float-left">
						<ul class="list header_social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
							<li><a href="#"><i class="fa fa-behance"></i></a></li>
						</ul>
					</div>
					<div class="float-right">
						<a class="dn_btn" href="tel:+4400123654896">+440 012 3654 896</a>
						<a class="dn_btn" href="mailto:support@colorlib.com">support@colorlib.com</a>
					</div>
           		</div>	
           	</div>	
            <div class="main_menu">
            	<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<a class="navbar-brand logo_h" href="<?=base_url('welcome')?>"><img src="<?=base_url('assets/')?>img/logo.png" alt=""></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav ml-auto">
                                <li class="nav-item active"><a class="nav-link" href="<?=base_url('pengajar/kelola_kelas')?>">Beranda</a></li>
								<li class="nav-item"><a class="nav-link text-danger" href="<?=base_url('pengajar/login/logout')?>">Keluar</a></li>
							</ul>
						</div> 
					</div>
            	</nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->

<!-- Start Sample Area -->
			<section class="sample-text-area">
				<div class="container">
					<div class="section-top-border">
						<h3 class="mb-30 title_color"><center>EDIT MATERI</center></h3>
						<br>
										<form action="<?php echo site_url('pengajar/kelola_kelas/edit_materi/'.$id_materi);?>" method="post">
											<center><h4>Kelas yang dipilih</h4></center>
											<div class="input-group-icon mt-10">
												<div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
												<div class="form-select" id="default-select">
													<select name="id_kelas" value="<?php echo($materi['nama_kelas']);?>">
														<?php 
															foreach ($kelas as $key): 
															if ($key->id_pengajar == $user['id'])
															{
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
															}
														endforeach; 
														?>
													</select>
												</div>
											</div>
											<center><h4>Step</h4></center>
											<div class="input-group-icon mt-10">
												<div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
												<div class="form-select" id="default-select">
													<select name="step">
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
						                  	<div class="mt-10">
												<center><h4>Judul Materi</h4></center>
												<input type="text" name="judul_materi" placeholder="Masukkan judul materi" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan judul materi'" required class="single-input" value="<?php echo($materi['judul_materi']);?>">
											</div>
							                <div class="form-group">
						                    	<center><h4>Isi Materi</h4></center>
						                    	<textarea id="summernote" name="isi_materi"><?php echo($materi['isi_materi']);?></textarea>
						                  	</div>
						                  	<button type="submit" class="btn btn-primary">Edit Materi</button>
						                </form>
        			</div>
        		</div>
				<br>
				<br>
			</section>
	<!--
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <form action="<?php echo site_url('pengajar/kelola_kelas/save');?>" method="post">
                  <div class="form-group">
                    <label>Judul</label>
                    <input type="text" name="judul_materi" class="form-control" placeholder="Title" required>
                  </div>
                  <div class="form-group">
                    <label>Isi Materi</label>
                    <textarea id="summernote" name="isi_materi"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <br>
            </div>
        </div>
    </div>
	-->

            <!--================ start footer Area  =================-->	
        <footer class="footer-area p_120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2  col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
                           <h6 class="footer_title">Top Products</h6>
                            <ul class="list">
                            	<li><a href="#">Managed Website</a></li>
                            	<li><a href="#">Manage Reputation</a></li>
                            	<li><a href="#">Power Tools</a></li>
                            	<li><a href="#">Marketing Service</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2  col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
                           <h6 class="footer_title">Quick Links</h6>
                            <ul class="list">
                            	<li><a href="#">Jobs</a></li>
                            	<li><a href="#">Brand Assets</a></li>
                            	<li><a href="#">Investor Relations</a></li>
                            	<li><a href="#">Terms of Service</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2  col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
                           <h6 class="footer_title">Features</h6>
                            <ul class="list">
                            	<li><a href="#">Jobs</a></li>
                            	<li><a href="#">Brand Assets</a></li>
                            	<li><a href="#">Investor Relations</a></li>
                            	<li><a href="#">Terms of Service</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2  col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
                           <h6 class="footer_title">Resources</h6>
                            <ul class="list">
                            	<li><a href="#">Guides</a></li>
                            	<li><a href="#">Research</a></li>
                            	<li><a href="#">Experts</a></li>
                            	<li><a href="#">Agencies</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <aside class="f_widget news_widget">
        					<div class="f_title">
        						<h3 class="footer_title">Newsletter</h3>
        					</div>
        					<p>Stay updated with our latest trends</p>
        					<div id="mc_embed_signup">
                                <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative">
                                	<div class="input-group d-flex flex-row">
                                        <input name="EMAIL" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
                                        <button class="btn sub-btn"><span class="lnr lnr-arrow-right"></span></button>		
                                    </div>				
                                    <div class="mt-10 info"></div>
                                </form>
                            </div>
        				</aside>
                    </div>
                </div>
                <div class="row footer-bottom d-flex justify-content-between align-items-center">
                    <p class="col-lg-8 col-md-8 footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    <div class="col-lg-4 col-md-4 footer-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
        </footer>
		<!--================ End footer Area  =================-->
        
        
        
        
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="<?=base_url('assets/')?>js/jquery-3.3.1.min.js"></script>
        <script src="<?=base_url('assets/')?>js/popper.js"></script>
        <script src="<?=base_url('assets/')?>js/bootstrap.min.js"></script>
        <script src="<?=base_url('assets/')?>js/stellar.js"></script>
        <script src="<?=base_url('assets/')?>vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="<?=base_url('assets/')?>vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="<?=base_url('assets/')?>vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="<?=base_url('assets/')?>vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="<?=base_url('assets/')?>vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="<?=base_url('assets/')?>vendors/popup/jquery.magnific-popup.min.js"></script>
        <script src="<?=base_url('assets/')?>js/jquery.ajaxchimp.min.js"></script>
        <script src="<?=base_url('assets/')?>vendors/counter-up/jquery.waypoints.min.js"></script>
        <script src="<?=base_url('assets/')?>vendors/counter-up/jquery.counterup.js"></script>
        <script src="<?=base_url('assets/')?>js/mail-script.js"></script>
        <script src="<?=base_url('assets/')?>js/theme.js"></script>
	    <script type="text/javascript" src="<?=base_url('assets/')?>adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	    <script type="text/javascript" src="<?=base_url('assets/')?>adminlte/plugins/summernote/summernote-bs4.min.js"></script>
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
	                    url: "<?php echo site_url('pengajar/kelola_kelas/upload_image')?>",
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
	                    url: "<?php echo site_url('pengajar/kelola_kelas/delete_image')?>",
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
 
    