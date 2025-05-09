<h1>Laporan Kerja</h1>
<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>
<form action="<?= base_url('user/upload_laporan') ?>" method="POST" enctype="multipart/form-data">
    <label for="tanggal_laporan">Tanggal Laporan</label>
    <input type="date" name="tanggal_laporan" id="tanggal_laporan" class="form-control" required>

    <label for="deskripsi">Deskripsi</label>
    <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>

    <label for="file_deskripsi">Unggah File</label>
    <input type="file" name="file_deskripsi" id="file_deskripsi" class="form-control">
    <small class="form-text text-muted">Maksimal 10MB, format file yang diterima: JPG, JPEG, PNG, PDF, DOC, DOCX</small>

    <label for="kategori">Kategori</label>
    <select name="kategori" id="kategori" class="form-control" required>
        <option value="screenshoot_postingan">Screenshoot Postingan</option>
        <option value="harian_jobdesk">Harian Jobdesk</option>
        <option value="dokumentasi_foto">Dokumentasi Foto</option>
        <option value="penilaian_karyawan">Penilaian Karyawan</option>
    </select>

    <button type="submit" class="btn btn-primary mt-3">Kirim</button>
</form>
