<h1>Selamat Datang, <?= $this->session->userdata('name') ?></h1>
<div class="container">
    <img src="<?= base_url('assets/') ?>img/dashboard.jpg" alt="Logo" class="img-fluid" style="width: 100%; min-height: 200px;">
</div>

<?php if($this->session->flashdata('message')) : ?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<?= $this->session->flashdata('message') ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php endif ?>
