<h2 class="mb-4">Upload Pengumuman</h2>
<form action="<?= base_url('admin/pengumuman_upload_process') ?>" method="post" enctype="multipart/form-data">
    <div class="form-group row">
        <label for="judul" class="col-sm-2 col-form-label">Judul:</label>
        <div class="col-sm-6">
			<input type="text" class="form-control" id="judul" name="judul">
			<?= form_error('judul', '<small class="text-danger mt-1">', '</small>'); ?>
		</div>
    </div>

    <div class="form-group">
        <label for="foto" class="col-sm-2 col-form-label">Foto</label>
        <div class="col-sm-6">
			<input type="file" class="form-control" id="foto" name="foto">
			<?= form_error('foto', '<small class="text-danger mt-1">', '</small>'); ?>
		</div>
    </div>
    <div class="row mt-4">
		<div class="col-8">
			<button type="submit" class="btn btn-sm btn-primary float-right"><i class="fas fa-check mr-1"></i> Simpan</button>
		</div>
	</div>
</form>
	