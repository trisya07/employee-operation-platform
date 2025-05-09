<div class="container">
    <h2>Daftar Pengumuman</h2>
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pengumuman as $key => $item): ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $item['judul'] ?></td>
                    <td>
                        <img src="<?= base_url('uploads/pengumuman/' . $item['foto']) ?>" alt="<?= $item['judul'] ?>" style="width: 100px;">
                    </td>
                    <td>
                        <a href="<?= base_url('admin/pengumuman/delete/' . $item['id_pengumuman']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus pengumuman ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
