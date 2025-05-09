<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posting IG</title>
</head>
<body>
    <h1>Posting Instagram</h1>
    <form method="POST" enctype="multipart/form-data" action="<?= base_url('digital_marketing/share_instagram') ?>">
        <label for="file">Pilih Gambar:</label>
        <input type="file" name="file" id="file" required>
        <button type="submit">Kirim ke Instagram</button>
    </form>
</body>
</html>
