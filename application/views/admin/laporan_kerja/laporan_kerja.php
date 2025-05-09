<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Karyawan</th>
            <th>Tanggal</th>
            <th>Deskripsi</th>
            <th>File</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach ($laporan as $l): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $this->db->get_where('users', ['id_users' => $l['id_users']])->row()->name; ?></td>
                <td><?= $l['tanggal_laporan']; ?></td>
                <td><?= $l['deskripsi']; ?></td>
                <td>
                    <?php if ($l['file_deskripsi']): ?>
                        <a href="<?= base_url('uploads/laporan_kerja/' . $l['file_deskripsi']); ?>" target="_blank">
                            <i class="fas fa-download"></i>
                        </a>
                    <?php else: ?>
                        Tidak Ada File
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
