<?php 
// Menyimpan file berdasarkan tanggal
$filesByDate = [];
foreach ($files as $file) {
    $filesByDate[$file['upload_date']][] = $file;
}
?>

<?php foreach ($filesByDate as $uploadDate => $files): ?>
    <div class="file-group">
        <!-- Tanggal -->
        <div class="file-date">
            <span>Date: <?= $uploadDate ?></span>
        </div>

        <!-- Gambar atau Video -->
        <div class="file-items">
            <?php foreach ($files as $file): ?>
                <div class="file-item">
                    <div class="file-preview">
                        <?php if (in_array($file['file_type'], ['image/jpeg', 'image/png', 'image/gif'])): ?>
                            <img src="<?= base_url('uploads/bahan_postingan/' . $file['file_name']) ?>" 
                                 width="100" class="file-view" data-file="<?= base_url('uploads/bahan_postingan/' . $file['file_name']) ?>" data-type="image">
                        <?php elseif (in_array($file['file_type'], ['video/mp4', 'video/avi', 'video/mov'])): ?>
                            <video width="100" class="file-view" data-file="<?= base_url('uploads/bahan_postingan/' . $file['file_name']) ?>" data-type="video">
                                <source src="<?= base_url('uploads/bahan_postingan/' . $file['file_name']) ?>" type="<?= $file['file_type'] ?>">
                            </video>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endforeach; ?>

<!-- CSS dan JavaScript disatukan di bawah ini -->
<style>
/* Modal styles */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8);
    justify-content: center;
    align-items: center;
}

.modal-content {
    max-width: 90%;
    max-height: 90%;
    margin: auto;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
}

.modal img, .modal video {
    max-width: 100%; /* Membatasi gambar/video agar tidak lebih besar dari modal */
    max-height: 100%; /* Menjaga agar gambar/video tidak keluar dari modal */
    object-fit: contain; /* Memastikan gambar/video tidak terpotong */
    transition: transform 0.25s ease;
}

.close {
    position: absolute;
    top: 10px;
    right: 25px;
    color: white;
    font-size: 35px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* Mengelompokkan file berdasarkan tanggal */
.file-group {
    margin-bottom: 30px;
}

.file-date {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 10px;
}

.file-items {
    display: flex;
    flex-wrap: wrap; /* Agar gambar/video berada di bawah tanggal dan bisa berbaris */
    gap: 15px; /* Menambahkan jarak antar gambar/video */
}

.file-item {
    width: 100px;
}

.file-preview img, .file-preview video {
    width: 100%; /* Ukuran gambar/video sesuai dengan container */
    height: auto;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var modal = document.createElement('div');
    modal.classList.add('modal');
    modal.innerHTML = `
        <span class="close">&times;</span>
        <div class="modal-content"></div>
    `;
    document.body.appendChild(modal);

    var closeModal = modal.querySelector('.close');
    closeModal.onclick = function () {
        modal.style.display = 'none';
    }

    var fileViews = document.querySelectorAll('.file-view');
    fileViews.forEach(function (fileView) {
        fileView.onclick = function () {
            var fileType = fileView.getAttribute('data-type');
            var fileUrl = fileView.getAttribute('data-file');

            var modalContent = modal.querySelector('.modal-content');
            modalContent.innerHTML = '';

            if (fileType === 'image') {
                var img = document.createElement('img');
                img.src = fileUrl;
                modalContent.appendChild(img);
            } else if (fileType === 'video') {
                var video = document.createElement('video');
                video.controls = true;
                var source = document.createElement('source');
                source.src = fileUrl;
                video.appendChild(source);
                modalContent.appendChild(video);
            }

            modal.style.display = 'flex';

            // Menambahkan fitur zoom in/out untuk gambar dan video
            var scale = 1;  // Zoom level awal
            modalContent.onwheel = function (e) {
                if (e.deltaY < 0) {
                    scale += 0.1;  // Zoom in
                } else {
                    scale -= 0.1;  // Zoom out
                }

                // Batasi zoom agar tidak terlalu kecil atau besar
                if (scale < 0.5) scale = 0.5;
                if (scale > 3) scale = 3;

                modalContent.querySelector('img, video').style.transform = `scale(${scale})`;
            };
        }
    });
});
</script>
