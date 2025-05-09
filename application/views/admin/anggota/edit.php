<h2 class="mb-4">Edit Anggota</h2>

<form action="<?= base_url('anggota/edit/' . $user['id_users'] ) ?>" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?= $user['id_users'] ?>">

	<div class="form-group row">
		<label for="no_employee" class="col-sm-2 col-form-label">No Karyawan</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" name="no_employee" id="no_employee" value="<?= $user['no_employee'] ?>">
			<?= form_error('no_employee', '<small class="text-danger mt-1">', '</small>'); ?>
		</div>
	</div>

	<div class="form-group row">
		<label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>">
			<?= form_error('name', '<small class="text-danger mt-1">', '</small>'); ?>
		</div>
	</div>

	<div class="form-group row">
		<label for="username" class="col-sm-2 col-form-label">Username</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?>">
			<?= form_error('username', '<small class="text-danger mt-1">', '</small>'); ?>
		</div>
	</div>

	<!-- <div class="form-group row">
		<label for="password" class="col-sm-2 col-form-label">Password</label>
		<div class="col-sm-6">
			<input type="password" class="form-control" id="password" name="password" value="<?= $user['password'] ?>">
			<!-- <?= form_error('password', '<small class="text-danger mt-1">', '</small>'); ?> -->
		<!-- </div> -->
	<!-- </div> -->

	<div class="form-group row">
		<label for="name" class="col-sm-2 col-form-label">Jenis Kelamin</label>
		<div class="col-sm-6">
			<select name="gender" class="form-control">
				<option value="L" <?php if($user['gender'] == "L"){ print ' selected'; }?>>Laki-laki</option>
				<option value="P" <?php if($user['gender'] == "P"){ print ' selected'; }?>>Perempuan</option>
			</select>
		</div>
	</div>

	<div class="form-group row">
		<label for="nowa" class="col-sm-2 col-form-label">Nomor WhatsApp</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" id="nowa" name="nowa" value="<?= $user['no_wa'] ?>">
			<?= form_error('nowa', '<small class="text-danger mt-1">', '</small>'); ?>
		</div>
	</div>

	<div class="form-group row">
		<label for="email" class="col-sm-2 col-form-label">Email</label>
		<div class="col-sm-6">
			<input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>">
			<?= form_error('email', '<small class="text-danger mt-1">', '</small>'); ?>
		</div>
	</div>

	<div class="form-group row">
		<label for="alamat" class="col-sm-2 col-form-label">Alamat Lengkap</label>
		<div class="col-sm-6">
			<input type="alamat" class="form-control" id="alamat" name="alamat" value="<?= $user['alamat'] ?>">
			<?= form_error('alamat', '<small class="text-danger mt-1">', '</small>'); ?>
		</div>
	</div>
	
	<div class="form-group row">
		<label for="tgl_mulai_kerja" class="col-sm-2 col-form-label">Tanggal Mulai Kerja</label>
		<div class="col-sm-6">
			<input type="date" class="form-control" id="tgl_mulai_kerja" name="tgl_mulai_kerja" value="<?= $user['tgl_mulai_kerja'] ?>">
			<?= form_error('tgl_mulai_kerja', '<small class="text-danger mt-1">', '</small>'); ?>
		</div>
	</div>

	<div class="form-group row">
		<label for="position" class="col-sm-2 col-form-label">Divisi</label>
		<div class="col-sm-6">
		<select name="position_id" class="form-control">
			<?php foreach($position as $p) : ?>
				<option value="<?= $p['id_positions'] ?>" <?php if($user['position_id'] == $p['id_positions']){ print ' selected'; }?>><?= $p['position_name'] ?></option>
			<?php endforeach ?>
		</select>
		</div>
	</div>

	<div class="form-group row">
        <label for="photo" class="col-sm-2 col-form-label">Foto</label>
        <div class="col-sm-6">
            <!-- Menampilkan preview foto -->
            <?php if (!empty($user['photo']) && file_exists('./image/' . $user['photo'])) : ?>
                <img src="<?= base_url('image/' . $user['photo']) ?>" style="height: 100px; width: 100px; object-fit: cover; margin-bottom: 10px;">
            <?php else : ?>
                No Photo
				<?php endif; ?>
            
            <input type="file" class="form-control" id="photo" name="photo">
            <small class="text-muted">Unggah file gambar (jpg, jpeg, png) maksimal 2MB.</small>
        </div>
    </div>

	<div class="row mt-4">
		<div class="col-8">
			<button type="submit" class="btn btn-sm btn-primary float-right"><i class="fas fa-check mr-1"></i> Simpan</button>
		</div>
	</div>

</form>
