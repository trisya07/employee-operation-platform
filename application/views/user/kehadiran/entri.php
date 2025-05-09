<?php if ($this->session->flashdata('message')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('message') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<form action="" method="POST">

    <div class="card">
        <h5 class="card-header">Entri Kehadiran</h5>
        <div class="card-body">  
            <div class="form-group row">
                <label for="time" class="col-sm-2 col-form-label">Jam</label>
                <div class="col-sm-6">
                    <?php date_default_timezone_set('Asia/Jakarta'); ?>
                    <input type="text" class="form-control-plaintext" name="time" value="<?= date('H:i') ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="date" class="col-sm-2 col-form-label">Tgl/Bln/Thn</label>
                <div class="col-sm-6">
                    <?php date_default_timezone_set('Asia/Jakarta'); ?>
                    <input type="text" class="form-control-plaintext" name="date" value="<?= date('d-M-Y') ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="information" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-6">
                    <a href="<?= base_url('absensi/masuk') ?>" class="btn btn-success mr-3" <?= $sudah_absen ? 'disabled' : ''; ?>>Masuk</a>
                    <button type="button" class="btn btn-warning text-light mr-3" data-toggle="modal" data-target="#uploadModal" <?= $sudah_absen ? 'disabled' : ''; ?>>Ijin</button>
                    <button type="button" class="btn btn-danger mr-3" data-toggle="modal" data-target="#uploadModal" <?= $sudah_absen ? 'disabled' : ''; ?>>Sakit</button>
                </div>
            </div>
        </div>
    </div>

</form>

<!-- Modal Upload -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url('absensi/upload') ?>" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Upload Surat Ijin/Sakit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="information">Keterangan</label>
                        <select name="information" id="information" class="form-control" required>
                            <option value="I">Ijin</option>
                            <option value="S">Sakit</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="file">Upload Surat</label>
                        <input type="file" name="file" id="file" class="form-control-file" required>
                        <small class="form-text text-muted">Format file: PDF, JPG, JPEG, PNG (Max: 2MB)</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </div>
        </form>
    </div>
</div>
