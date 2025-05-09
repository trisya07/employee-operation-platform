<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Puskesmas - Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body style="background-color: #000000;">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-5 col-lg-5 col-md-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
					<div class="col">
						<div class="p-5">
						<div class="text-center">
            <h1 class="h4 text-gray-900 mb-4" style="font-family: 'Montserrat', sans-serif;">ISTANA SURAWISESA</h1>

    <img src="<?= base_url('assets/') ?>img/Logo brand.png" alt="Logo" style="width: 200px; height: 200px; margin-bottom: 20px;">

</div>

<?= $this->session->flashdata('message') ?>

<form action="<?= base_url('auth') ?>" method="post" class="user">
    <div class="form-group">
        <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukkan email..." name="email">
        <?= form_error('email', '<small class="text-danger ml-3 mt-1">', '</small>'); ?>
    </div>
    <div class="form-group">
        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Masukkan password..." name="password">
        <?= form_error('password', '<small class="text-danger ml-3 mt-1">', '</small>'); ?>
    </div>
    
    <button type="submit" class="btn btn-success btn-user btn-block">
        Login
    </button>
</form>

						</div>
					</div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

</body>

</html>
