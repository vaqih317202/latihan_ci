<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?></title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
</head>
<body>

	<div class="container" style="margin-top: 80px">
		<?php echo $this->session->flashdata('notif') ?>
		<a href="<?php echo base_url('index.php/laporan/tambah') ?>" class="btn btn-md btn-success">Tambah Data</a>
		<hr>
		
		<div class="table-responsive">
			<table border=1 id="table" class="table table-striped table-bordered table-hover">
			    <thead>
			      <tr>
			        <th>No.</th>
			        <th>Tanggal</th>
			        <th>Waktu</th>
			        <th>Mata_kuliah</th>
			        <th>Kelas</th> 
			        <th>SKS</th>
			        <th>Kode instruktur</th>
			        <th>Paraf instruktur</th>
			      </tr>
			    </thead>
			    <tbody>

			    <?php
			  		$no=1;
			    	foreach($data_laporan as $hasil){ 
			    ?>
			   
			      <tr>
			        <td><?php echo $no++?></td>
			        <td><?php echo $hasil->tanggal ?></td>
			        <td><?php echo $hasil->waktu ?></td>
			        <td><?php echo $hasil->mata_kuliah ?></td>
			        <td><?php echo $hasil->kelas ?></td>
			        <td><?php echo $hasil->sks ?></td>
			        <td><?php echo $hasil->kode_instruktur ?></td>
			        <td></td>
			        <td>
			        	<a href="<?php echo base_url() ?>index.php/laporan/edit/<?php echo $hasil->noid ?>" class="btn btn-sm btn-danger">Edit</a>
			        	<a href="<?php echo base_url() ?>index.php/laporan/hapus/<?php echo $hasil->noid ?>" class="btn btn-sm btn-danger">Hapus</a>
			        </td>
			      </tr>

			    <?php } ?>

			    </tbody>
			  </table>
		</div>

	</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script>
	$('#table').DataTable( {
    autoFill: true
} );
</script>
</body>
</html>