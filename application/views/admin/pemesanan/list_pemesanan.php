<h2 class="mb-4">Daftar Pesanan</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Nomor WhatsApp</th>
            <th>Alamat</th>
            <th>Jenis Kaos</th>
            <th>Warna Kaos</th>
            <th>Ukuran</th>
            <th>Jumlah Pesanan</th>
            <th>Teknik Sablon</th>
            <th>Catatan</th>
            <th>Desain</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($pesanan as $p): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= htmlspecialchars($p['nama']); ?></td>
            <td><?= htmlspecialchars($p['no_wa']); ?></td>
            <td><?= htmlspecialchars($p['alamat']); ?></td>
            <td><?= htmlspecialchars($p['jenis_kaos']); ?></td>
            <td><?= htmlspecialchars($p['warna_kaos']); ?></td>
            <td><?= htmlspecialchars($p['ukuran']); ?></td>
            <td><?= htmlspecialchars($p['jmlh_pesanan']); ?></td>
            <td><?= htmlspecialchars($p['t_sablon']); ?></td>
            <td><?= htmlspecialchars($p['catatan']); ?></td>
            <td>
                <?php if ($p['foto_desain']): ?>
                    <a href="<?= base_url('uploads/desain/' . $p['foto_desain']); ?>" target="_blank">Lihat Desain</a>
                <?php else: ?>
                    Tidak ada desain
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="<?= base_url('admin/export_excel'); ?>" class="btn btn-success mt-3">
    <i class="fas fa-file-excel"></i> Download Excel
</a>
