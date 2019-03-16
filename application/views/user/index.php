<?php
$page = 'Beranda';
?>

<!DOCTYPE html>
<html>
<head>
	<title>SMA Mekar Arum Bandung</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/tampilan.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/slider.css">
	<style type="text/css">
		body{
			font-size: 12px;
			font-family: Verdana;
			background: silver;
		}
	</style>
</head>
<body>
	<div class="max-width-4 mx-auto" style="background: #f9f7fc"> 
	  <div class="clearfix">
	  	<div class="col col-12 " style="background: black">
	  		<div class="clearfix p1">
	  			<div class="col col-9" style="color: white"><small><?php echo date("d/m/Y"); ?></small></div>
	  			<div class="col col-3 center">
	  				<form action="<?php echo base_url() ?>user/cari" method="post">
					  <input id="search" type="search" class="input" placeholder="cari disini" name="cari">
					</form>
	  			</div>
	  		</div>
	  	</div>
	  </div>
	  <div class="clearfix">
	  	<div class="col col-12 ">

	  		  <!-- header -->
			  <?php $this->load->view('user/layout/header'); ?>

	  	</div>
	  </div>	
	  <div class="clearfix">
	  	<div class="col col-12 ">

	  		<!-- menu -->
	  		<div class="clearfix" style="background: #097c09; font-weight: bold; padding-left: 10px">
				<ul class="list-reset">
					<li class="inline-block mr1"><a href="<?php echo base_url() ?>user/index" <?php if($page == 'Beranda'){?> style="color: yellow" <?php }else{?> style="color: white" <?php } ?> >Beranda</a></li>
					<li class="inline-block mr1"><a href="<?php echo base_url() ?>user/profil" <?php if($page == 'Profil'){?> style="color: yellow" <?php }else{?> style="color: white" <?php } ?> >Profil</a></li>
					<li class="inline-block mr1"><a href="<?php echo base_url() ?>user/artikel" <?php if($page == 'Artikel'){?> style="color: yellow" <?php }else{?> style="color: white" <?php } ?> >Artikel</a></li>
					<li class="inline-block mr1"><a href="<?php echo base_url() ?>user/galeri" <?php if($page == 'Galeri'){?> style="color: yellow" <?php }else{?> style="color: white" <?php } ?> >Galeri</a></li>
					<li class="inline-block mr1"><a href="<?php echo base_url() ?>user/data_guru" <?php if($page == 'Data Guru'){?> style="color: yellow" <?php }else{?> style="color: white" <?php } ?> >Data Guru</a></li>
					<li class="inline-block mr1"><a href="<?php echo base_url() ?>user/data_siswa" <?php if($page == 'Data Siswa'){?> style="color: yellow" <?php }else{?> style="color: white" <?php } ?> >Data Siswa</a></li>
					<li class="inline-block mr1"><a href="<?php echo base_url() ?>user/mata_pelajaran" <?php if($page == 'Mata Pelajaran'){?> style="color: yellow" <?php }else{?> style="color: white" <?php } ?> >Mata Pelajaran</a></li>
					<li class="inline-block mr1"><a href="<?php echo base_url() ?>user/kontak" <?php if($page == 'Kontak'){?> style="color: yellow" <?php }else{?> style="color: white" <?php } ?> >Kontak</a></li>
				</ul>
			</div>

	  	</div>
	  </div>
	  <div class="clearfix mt1">
	  	<div class="col col-3 p1">

	  		<!-- konten kiri -->
	  		<?php $this->load->view('user/layout/konten_kiri'); ?>

	  	</div>
	  	<div class="col col-6 mt1">
	  		<div class="clearfix">
	  			<div class="col col-12">
			  	<img src="<?php echo base_url() ?>assets/slider/3.jpg" class="" height="300px"/>
			  	</div>
			</div>
	        <div class="overflow-hidden rounded mt1">
		        <div class="p1 bold center" style="background: #03c129; color: white">
				    Artikel Terbaru
				</div>
				<div class="p1" style="background: #e4e3e5">
					<?php foreach($hasil_artikel as $row) 
                    {
                    ?>
					<div class="clearfix">
				   		<div class="col col-3"><img class="rounded" src="<?php echo base_url() ?><?php echo $row->gambar ?>" width="110" height="90"></div>
				   		<div class="col col-9">
				   			<b><?php echo $row->judul ?></b>
				   			<p style="text-align: justify;"><?php echo substr($row->isi, 0,200) ?>... <b style="color: #03c129 ">[<a href="<?php echo base_url() ?>user/detail_artikel/<?php echo $row->id_artikel ?>" style="color: #03c129 ">Read More</a>]</b></p>
				   		</div>
				   		<hr>
				    </div>
				    <?php 
                    } ?>
				</div>
			</div>

	  	</div>
	  	<div class="col col-3 p1">
	  		<div class="overflow-hidden rounded">
			  <div class="p1 bold center" style="background: #03c129; color: white">
			    Kepala Sekolah
			  </div>
			  <div class="p2" style="background: #e4e3e5; text-align: center;">
			    <img src="<?php echo base_url() ?>assets/img/kepala sekolah.jpg"
				  width="150"
				  class="block mx-auto" />
				<div class="mt1"><small>Rd. Dasep Nana Permana</small></div>

			  </div>
			</div>

			<div class="overflow-hidden rounded mt1">
			  <div class="p1 bold center" style="background: #03c129; color: white">
			    Total Pengunjung
			  </div>
			  <div class="p2" style="background: #e4e3e5; text-align: center;">
				<p>website ini telah dikunjungi</p>
				<h3><?php $count_my_page = ("hitcounter.txt"); $hits = file($count_my_page); $hits[0] ++; $fp = fopen($count_my_page , "w"); fputs($fp , "$hits[0]"); fclose($fp); echo $hits[0]; ?></h3>
				<p>Kali</p>

			  </div>
			</div>
	  	</div>
	  </div>	
	  <div class="clearfix">
	  	<div class="col col-12 ">

	  		<!-- footer -->
	  		<?php $this->load->view('user/layout/footer'); ?>

	  	</div>
	  </div>
	</div>
</div>
</body>
</html>