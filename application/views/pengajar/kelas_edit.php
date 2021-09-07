<section class="sample-text-area">
	<div class="container">
		<form action="<?php echo site_url('pengajar/kelola_kelas/edit_kelas/'.$id_kelas);?>" method="post">
			<div class="mt-10">
				<center><h4>Nama Kelas</h4></center>
				<input type="text" name="nama_kelas" placeholder="Nama Kelas" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Kelas'" required class="single-input" value="<?php echo($kelas['nama_kelas']);?>">
			</div>
			<div class="mt-10">
				<center><h4>Deskripsi</h4></center>
				<textarea name="deskripsi" class="single-textarea" placeholder="Deskripsi Kelas" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Deskripsi Kelas'" required><?php echo($kelas['deskripsi']);?></textarea>
			</div>
			<br>
			<button type="submit" class="btn btn-primary">Edit Kelas</button>
			</form>
	</div>
</section>