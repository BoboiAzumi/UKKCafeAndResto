<?php
$judul = "H O M E";
include "header.php";
include "koneksi.php";

?>

		<div class="col-9">
		  <div class="container">
		    <!-- Selamat Datang -->
			<div class="row mb-2">
			  <div class="col">
				<div class="jumbotron p-3 m-0 shadow">
				  	<h1 class="display-5">Selamat Datang <?= $nama_pegawai; ?></h1>
				  	<p class="lead">di Aplikasi Cafe Emilia ISK</p>
					<div class="flx" style="justify-content:center">
						<div class="card">
								<div class="flx" style="justify-content:center">
									<img src="<?=$photo?>" alt="profil" class="img-thumbnail m-2" width="200px">
								</div>
					  		<p class="text-center text-info ml-1 mr-1">(<?=$nama_pegawai?>'s Profile Photo)</p>
						</div>
					</div>
					<hr class="my-4">
				  	<p class="text-right text-success">UKK RPL SMK <?= date ('Y'); ?></p>
				  	<div class="flx" style="justify-content:right">
						<p class="text-right text-info">Jam : &nbsp</p>	
				  		<div id="jamKunjung" class="text-right text-success"></div>
					</div>
				</div>
			</div>
		  </div>
		  <!-- End Selamat Datang -->

		  <?php
		  if ($jabatan != "Admin") {?>
			<div class="row mb-3">
				<div class="card col-6" style="background: rgba(57, 192, 237, 0.5);">
			  		<div class="card my-2 bg-light">
						<div class="card-header"><h5 class="card-title pt-2 text-center">PENERIMAAN BULAN INI</h5></div>
			  			<div class="row">
			  	  			<div class="col-md-5 d-flex align-items-center pr-0">
			  	  				<img src="img/dollar.png" alt="money.jpg" alt="money" class="img-thumbnail ml-2">
			  	  			</div>
			  	  		<div class="col-md-7">
			  	  		<div class="card-body p-0 mr-1">
			  	  		<?php
			  	  	  		$sql ="SELECT sum(total_transaksi) as jml FROM tbl_transaksi where tgl_transaksi >= '$bulanIni' and tgl_transaksi <= '$tglHariIni'";
			  	  	  		$query = mysqli_query($koneksi, $sql);
			  	  	  		$data  =mysqli_fetch_array($query);
			  	  	  		$jml   = $data ['jml'];
			  	  		?>

			  	  		<p class="card-text display-4 text-center text-danger"><?=number_format($jml/1000000, 1);?> Jt</p>
						<div class="flx" style="justify-content:center" onclick="alert('Rp. <?=is_null($jml)?0 : $jml?>');">
							<button class="btn btn-info mb-3">?</button>
		  				</div>
						<p class="card-text text-center"><small class="text-muted">Jumlah dalam jutaan</small></p>
						<div class="flx" style="justify-content:center">
							<button class="btn btn-info mb-3" id="lihat_detail_bulanan" onclick="location.href='transaksi-laporan.php?detail=bulan_ini'">Lihat Detail</button>
		  				</div>
					</div>
			  	  </div>
			  	 </div>
			  	</div>
			  </div>

			  <div class="card col-6" style="background: rgba(57, 192, 237, 0.5);">
			  	<div class="card my-2">
					<div class="card-header"><h5 class="card-title pt-2 text-center">PENERIMAAN HARI INI</h5></div>
			  	  <div class="row">
			  	  	<div class="col-md-5 d-flex align-items-center pr-0">
			  	  	  <img src="img/dollar.png" alt="money" class="img-thumbnail ml-2">
			  	  	</div>
			  	  	<div class="col-md-7">
			  	  	  <div class="card-body p-0 mr-1">
			  	  	  	<?php
			  	  	  	  	$sql ="SELECT sum(total_transaksi) as jml FROM tbl_transaksi WHERE tgl_transaksi = '".date("Y-m-d", time())."'";
			  	  	  	  	$query =mysqli_query($koneksi, $sql);
			  	  	  	  	$data =mysqli_fetch_array($query);
			  	  	  	  	$jml = $data['jml'];
			  	  	  	  	?>
			  	  	  	  	<p class="card-text display-4 text-center text-danger"><?=number_format($jml/1000000, 1); ?> Jt</p>
							<div class="flx" style="justify-content:center" onclick="alert('Rp. <?=is_null($jml)?0 : $jml?>');">
								<button class="btn btn-info mb-3">?</button>
		  					</div>
			  	  	  	  	<p class="card-text text-center"><small class="text-muted">Jumlah dalam jutaan</small></p>
							<div class="flx" style="justify-content:center">
									<button class="btn btn-info mb-3" id="lihat_detail_harian" onclick="location.href='transaksi-laporan.php?detail=hari_ini'">Lihat Detail</button>
		  					</div>
			  	  	  	</div>
			  	  	  </div>
			  	  	</div>
			  	  </div>
			  	 </div>
				
				   <div class="card col-6" style="background: rgba(57, 192, 237, 0.5);">
			  	<div class="card my-2">
					<div class="card-header"><h5 class="card-title pt-2 text-center">PENERIMAAN TAHUN INI</h5></div>
			  	  <div class="row">
			  	  	<div class="col-md-5 d-flex align-items-center pr-0">
			  	  	  <img src="img/dollar.png" alt="money" class="img-thumbnail ml-2">
			  	  	</div>
			  	  	<div class="col-md-7">
			  	  	  <div class="card-body p-0 mr-1">
			  	  	  	<?php
			  	  	  	  	$sql ="SELECT sum(total_transaksi) as jml FROM tbl_transaksi WHERE tgl_transaksi >= '$tahunIni' and tgl_transaksi <= '$tglHariIni'";
			  	  	  	  	$query =mysqli_query($koneksi, $sql);
			  	  	  	  	$data =mysqli_fetch_array($query);
			  	  	  	  	$jml = $data['jml'];

			  	  	  	  	?>
			  	  	  	  	<p class="card-text display-4 text-center text-danger"><?=number_format($jml/1000000, 1); ?> Jt</p>
							<div class="flx" style="justify-content:center" onclick="alert('Rp. <?=is_null($jml)?0 : $jml?>');">
								<button class="btn btn-info mb-3">?</button>
		  					</div>
			  	  	  	  	<p class="card-text text-center"><small class="text-muted">Jumlah dalam jutaan</small></p>
							<div class="flx" style="justify-content:center">
									<button class="btn btn-info mb-3" id="lihat_detail_tahunan" onclick="location.href='transaksi-laporan.php?detail=tahun_ini'">Lihat Detail</button>
		  					</div>
			  	  	  	</div>
			  	  	  </div>
			  	  	</div>
			  	  </div>
			  	 </div>

				   <div class="card col-6" style="background: rgba(57, 192, 237, 0.5);">
			  	<div class="card my-2">
					<div class="card-header"><h5 class="card-title pt-2 text-center">PENERIMAAN KESELURUHAN</h5></div>
			  	  <div class="row">
			  	  	<div class="col-md-5 d-flex align-items-center pr-0">
			  	  	  <img src="img/dollar.png" alt="money" class="img-thumbnail ml-2">
			  	  	</div>
			  	  	<div class="col-md-7">
			  	  	  <div class="card-body p-0 mr-1">
			  	  	  	<?php
			  	  	  	  	$sql ="SELECT sum(total_transaksi) as jml FROM tbl_transaksi";
			  	  	  	  	$query =mysqli_query($koneksi, $sql);
			  	  	  	  	$data =mysqli_fetch_array($query);
			  	  	  	  	$jml = $data['jml'];
			  	  	  	  	?>
			  	  	  	  	<p class="card-text display-4 text-center text-danger"><?=number_format($jml/1000000, 1); ?> Jt</p>
							<div class="flx" style="justify-content:center" onclick="alert('Rp. <?=is_null($jml)?0 : $jml?>');">
								<button class="btn btn-info mb-3">?</button>
		  					</div>
			  	  	  	  	<p class="card-text text-center"><small class="text-muted">Jumlah dalam jutaan</p>
							<div class="flx" style="justify-content:center">
									<button class="btn btn-info mb-3" id="lihat_detail_keseluruhan" onclick="location.href='transaksi-laporan.php?detail=keseluruhan'">Lihat Detail</button>
		  					</div>
			  	  	  	</div>
			  	  	  </div>
			  	  	</div>
			  	  </div>
			  	 </div>
				   
			  	</div>

			  	<!-- Running Text -->
			  	<div class="row">
			  	  <div class="col p-0 m-0">
			  	  	<div class="alert alert-danger" role="alert">
			  	  	  <?php
			  	  	  $sql = "SELECT total_transaksi as total_transaksi FROM tbl_transaksi ORDER BY id_transaksi DESC";
			  	  	  $query = mysqli_query($koneksi, $sql);
			  	  	  if(mysqli_num_rows($query)> 0){
			  	  	  	$data = mysqli_fetch_array($query);
			  	  	  	$jml =number_format($data['total_transaksi'], 2);
			  	  	  }else{
			  	  	  	$jml=0;
			  	  	  }
			  	  	?>

			  	  	<marquee direction="left">Penerimaan terbaru : Rp. <?=$jml;?></marquee>
			  	  </div>
			  	</div>
			  </div>
			  <?php
			}?>
		  </div>
		</div>

		</div>
		</div>
	  </body>
	  </html>