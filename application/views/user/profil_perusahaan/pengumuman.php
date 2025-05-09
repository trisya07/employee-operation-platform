<div class="container mt-4">
    <h2 class="text-center mb-4">Pengumuman</h2>
    <div class="row">
        <?php if (!empty($dftr_pengumuman)) : ?>
            <?php foreach ($dftr_pengumuman as $p) : ?>
                <div class="col-lg-6 col-md-8 col-sm-12 mx-auto mb-4">
                    <div class="card shadow">
                        <img 
                            src="<?= base_url('uploads/pengumuman/' . $p['foto']) ?>" 
                            alt="<?= htmlspecialchars($p['judul']) ?>"
                            class="card-img-top img-fluid"
                            style="object-fit: cover; width: 100%; height: 250px;">
                        <div class="card-body">
                            <h5 class="card-title text-center"><?= htmlspecialchars($p['judul']) ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="col-12">
                <p class="text-center text-muted">Belum ada pengumuman yang tersedia.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
