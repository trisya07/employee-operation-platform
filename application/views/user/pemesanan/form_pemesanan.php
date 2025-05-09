<h2 class="mb-4">Form Pemesanan</h2>

<form action="<?= base_url('user/pesanan') ?>" method="post" enctype="multipart/form-data">
	<div class="form-group row">
		<label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" name="nama" id="nama" >
			<?= form_error('nama', '<small class="text-danger mt-1">', '</small>'); ?>
		</div>
	</div>

	<div class="form-group row">
		<label for="no_wa" class="col-sm-2 col-form-label">Nomor WhatsApp</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" id="no_wa" name="no_wa">
			<?= form_error('no_wa', '<small class="text-danger mt-1">', '</small>'); ?>
		</div>
	</div>

    <div class="form-group row">
		<label for="alamat" class="col-sm-2 col-form-label">Alamat Lengkap</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" id="alamat" name="alamat">
			<?= form_error('alamat', '<small class="text-danger mt-1">', '</small>'); ?>
		</div>
	</div>

    <div class="form-group row">
        <label for="jenis_kaos" class="col-sm-2 col-form-label">Jenis Kaos</label>
        <div class="col-sm-6">
            <select name="jenis_kaos[]" class="form-control" multiple>
                <option value="30s">30s</option>
                <option value="24s">24s</option>
            </select>
        </div>
    </div>

	<div class="form-group row">
		<label for="warna_kaos" class="col-sm-2 col-form-label">Warna Kaos</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" id="warna_kaos" name="warna_kaos">
			<?= form_error('warna_kaos', '<small class="text-danger mt-1">', '</small>'); ?>
		</div>
	</div>

    <div class="form-group row">
        <label for="ukuran" class="col-sm-2 col-form-label">Ukuran</label>
        <div class="col-sm-6">
            <select name="ukuran[]" class="form-control" multiple>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>
            </select>
        </div>
    </div>

	<div class="form-group row">
		<label for="jmlh_pesanan" class="col-sm-2 col-form-label">Jumlah Pesanan</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" id="jmlh_pesanan" name="jmlh_pesanan">
			<?= form_error('jmlh_pesanan', '<small class="text-danger mt-1">', '</small>'); ?>
		</div>
	</div>

    <div class="form-group row">
		<label for="t_sablon" class="col-sm-2 col-form-label">Teknik Sablon</label>
		<div class="col-sm-6">
			<select name="t_sablon" class="form-control">
				<option value="dtf">DTF</option>
				<option value="plastisol">Plastisol</option>
			</select>
		</div>
	</div>

	<div class="form-group row">
		<label for="catatan" class="col-sm-2 col-form-label">Catatan</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" id="catatan" name="catatan">
			<?= form_error('catatan', '<small class="text-danger mt-1">', '</small>'); ?>
		</div>
	</div>

	<div class="form-group row">
		<label for="foto_desain" class="col-sm-2 col-form-label">Upload Desain</label>
		<div class="col-sm-6">
			<input type="file" class="form-control" name="foto_desain" id="foto_desain" accept="image/*">
			<?= form_error('foto_desain', '<small class="text-danger mt-1">', '</small>'); ?>
		</div>
	</div>

	<div class="row mt-4">
		<div class="col-8">
			<button type="submit" class="btn btn-sm btn-primary float-right"><i class="fas fa-check mr-1"></i> Simpan</button>
		</div>
	</div>
</form>
