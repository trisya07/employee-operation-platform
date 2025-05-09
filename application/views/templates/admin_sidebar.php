<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin') ?>">
		<div class="mt-3">
			<img src="<?= base_url('assets/') ?>img/Logo brand.png" alt="Logo" style="width: 50px; height: 50px; margin-bottom: 20px;">
		</div>
		<div class="sidebar-brand-text mx-3">ISTANA SURAWISESA</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<li class="nav-item active">
		<a class="nav-link" href="<?= base_url('admin') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>

	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('anggota/add') ?>">
			<i class="fas fa-fw fa-user-plus"></i>
			<span>Tambah Anggota</span></a>
	</li>

	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDataAnggota" aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-fw fa-users"></i>
			<span>Data Anggota</span>
		</a>
		<div id="collapseDataAnggota" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?= base_url('anggota/direksi') ?>">Direksi</a>
				<a class="collapse-item" href="<?= base_url('anggota/manager') ?>">Manager</a>
				<a class="collapse-item" href="<?= base_url('anggota/HRD') ?>">HRD</a>
				<a class="collapse-item" href="<?= base_url('anggota/staffit') ?>">Staff IT</a>
				<a class="collapse-item" href="<?= base_url('anggota/staffdesain') ?>">Staff Desain</a>
				<a class="collapse-item" href="<?= base_url('anggota/staffvendor') ?>">Staff Vendor</a>
				<a class="collapse-item" href="<?= base_url('anggota/staffsupervisor') ?>">Staff Supervisor</a>
				<a class="collapse-item" href="<?= base_url('anggota/staffleaderdm') ?>">Staff Leader DM</a>
				<a class="collapse-item" href="<?= base_url('anggota/anggotadigitalmarketing') ?>">Anggota Digital Marketing</a>
			</div>
		</div>
	</li>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-fw fa-file-alt"></i>
			<span>Laporan Kerja</span>
		</a>
		<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-4 collapse-inner rounded">
				<a class="collapse-item" href="<?= base_url('admin/laporan_kerja/screenshoot_postingan') ?>">Screenshoot Postingan</a>
				<a class="collapse-item" href="<?= base_url('admin/laporan_kerja/harian_jobdesk') ?>">Harian Jobdesk</a>
				<a class="collapse-item" href="<?= base_url('admin/laporan_kerja/dokumentasi_foto') ?>">Dokumentasi Foto</a>
				<a class="collapse-item" href="<?= base_url('admin/laporan_kerja/penilaian_karyawan') ?>">Penilaian Karyawan</a>
			</div>
		</div>
	</li>


	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#kehadiran" aria-expanded="true" aria-controls="kehadiran">
			<i class="fas fa-fw fa-list"></i>
			<span>Kehadiran</span>
		</a>
		<div id="kehadiran" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?= base_url('kehadiran/tabel_kehadiran') ?>">Tabel Kehadiran</a>
				<a class="collapse-item" href="<?= base_url('kehadiran/rekap_kehadiran') ?>">Rekap Kehadiran</a>
			</div>
		</div>
	</li>

	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBahanPostingan" aria-expanded="true" aria-controls="collapseBahanPostingan">
			<i class="fas fa-fw fa-box"></i>
			<span>Bahan Postingan Produk</span>
		</a>
		<div id="collapseBahanPostingan" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?= base_url('admin/bahan_postingan/up_bahan') ?>">Upload Bahan</a>
				<a class="collapse-item" href="<?= base_url('admin/bahan_postingan/bahan_post') ?>">Bahan Postingan</a>
			</div>
		</div>
	</li>

	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePengumuman" aria-expanded="true" aria-controls="collapsePengumuman">
			<i class="fas fa-fw fa-bullhorn"></i>
			<span>Pengumuman</span>
		</a>
		<div id="collapsePengumuman" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?= base_url('admin/pengumuman_upload') ?>">Upload Pengumuman</a>
				<a class="collapse-item" href="<?= base_url('admin/pengumuman_list') ?>">List Pengumuman</a>
			</div>
		</div>
	</li>

	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('admin/list_pesanan') ?>">
			<i class="fas fa-fw fa-list"></i>
			<span>List Pesanan</span></a>
	</li>

	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('auth/logout') ?>">
			<i class="fas fa-fw fa-sign-out-alt"></i>
			<span>Keluar</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
