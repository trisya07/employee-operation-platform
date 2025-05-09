<?php echo form_open_multipart('admin/upload_bahan'); ?>

<div class="form-group">
    <label for="upload_date">Tanggal</label>
    <input type="date" class="form-control" id="upload_date" name="upload_date" required>
</div>

<div class="form-group">
    <label for="file_upload">Upload Foto/Video</label>
    <input type="file" class="form-control" id="file_upload" name="file_upload" accept="image/*,video/*" required>
</div>

<button type="submit" class="btn btn-primary">Simpan</button>

<?php echo form_close(); ?>