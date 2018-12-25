<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Tables</title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url(''); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(''); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="<?php echo base_url(''); ?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(''); ?>assets/css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.html">Start Bootstrap</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">9+</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">7</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url(''); ?>index.php/laporan/anggota">
            <i class="fas fa-fw fa-table"></i>
            <span>ANGGOTA</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url(''); ?>index.php/laporan/buku">
            <i class="fas fa-fw fa-table"></i>
            <span>BUKU</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url(''); ?>index.php/laporan/member">
            <i class="fas fa-fw fa-table"></i>
            <span>MEMBER</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url(''); ?>index.php/laporan/pinjam">
            <i class="fas fa-fw fa-table"></i>
            <span>PINJAM</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url(''); ?>index.php/laporan/user">
            <i class="fas fa-fw fa-table"></i>
            <span>ADMIN</span></a>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">ANGGOTA</li>
          </ol>


	<?php echo form_open('laporan/simpan_user') ?>
			  
			  <div class="form-group">
			    <label for="text">Firstname</label>
			    <input type="text" name="firstname" class="form-control" placeholder="Masukkan Kode Buku">
			  </div>

			  <div class="form-group">
			    <label for="text">Lastname</label>
			    <input type="text" name="lastname" class="form-control" placeholder="Masukkan Judul Buku">
			  </div>

			  <div class="form-group">
			    <label for="text">Email</label>
			    <input type="text" name="email" class="form-control">
			  </div>

			  <div class="form-group">
			    <label for="text">Password</label>
			    <input type="text" name="password" class="form-control">
			  </div>
        
			  <button type="submit" class="btn btn-md btn-success">Simpan</button>
			  <button type="reset" class="btn btn-md btn-warning">reset</button>
			<?php echo form_close() ?>
		</div>
	</div>
</div>

<footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url(''); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(''); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(''); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url(''); ?>assets/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(''); ?>assets/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(''); ?>assets/js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="<?php echo base_url(''); ?>assets/js/demo/datatables-demo.js"></script>

  </body>

</html>
