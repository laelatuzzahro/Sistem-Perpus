<!DOCTYPE html>
<html>
<head>
	<?php 
	session_start();
	include 'cek.php';
	include 'config.php';
	?>
	<link rel="icon" type="image/png" sizes="16x16" href="../foto/logo.png">
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.js"></script>	
	<script src="../assets/Chart/Chart.bundle.js"></script>
	
</head>
<body>
	<div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="../admin/index.php" class="navbar-brand">Perpustakaan Stasiun Klimatologi</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
		</div>
	</div>

	<!-- modal input -->
	<div id="modalpesan" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
				</div>
				<div class="modal-footer">
					
				</div>
				
			</div>
		</div>
	</div>

	<div class="col-md-2">
		<div class="row">
				<div class="col-xs-6 col-md-12">
					<a class="thumbnail">
						<img class="img-responsive" src="foto/logo.png" width="100px" height="150px">
					</a>
				</div>
		</div>                                                                                                                                                                                                                                                                                                                                 

		<div class="row"></div>
		<ul class="nav nav-pills nav-stacked">
			<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>  Dashboard</a></li>			
			<li><a href="anggota.php"><span class="glyphicon glyphicon-briefcase"></span>  Data Anggota</a></li>
			<li><a href="buku.php"><span class="glyphicon glyphicon-briefcase"></span>  Data Buku </a></li>        												
			<li><a href="peminjaman.php"><span class="glyphicon glyphicon-briefcase"></span>  Data Peminjaman </a></li>
			<li><a href="peminjaman_riwayat.php"><span class="glyphicon glyphicon-time"></span>  Riwayat Peminjaman </a></li>
			<li><a href="ganti_pass.php"><span class="glyphicon glyphicon-lock"></span> Ganti Password</a></li>
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>			
		</ul>
	</div>
	<div class="col-md-10">