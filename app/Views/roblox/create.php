<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Game Roblox</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5" style="max-width: 600px;">
        <h3 class="mb-4">Tambah Game Roblox Baru</h3>

        <!-- Notifikasi Error jika Nama Game Duplikat -->
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('error'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <form action="/roblox/store" method="post" class="card p-4 shadow-sm bg-white">
            
            <!-- Nama Game: Harus Diawali Huruf -->
            <div class="mb-3">
                <label class="form-label">Nama Game</label>
                <input type="text" 
                       name="nama_game" 
                       class="form-control" 
                       pattern="[A-Za-z].*" 
                       title="Nama game harus diawali dengan huruf!" 
                       placeholder="Contoh: Bloxburg 2" 
                       required>
            </div>

            <!-- Genre: Hanya Huruf dan Spasi -->
            <div class="mb-3">
                <label class="form-label">Genre</label>
                <input type="text" 
                       name="genre" 
                       class="form-control" 
                       pattern="[A-Za-z\s]+" 
                       title="Genre hanya boleh berisi huruf dan spasi!" 
                       placeholder="Contoh: Roleplay, RPG" 
                       required>
            </div>

            <!-- Developer: Harus Diawali Huruf -->
            <div class="mb-3">
                <label class="form-label">Developer</label>
                <input type="text" 
                       name="developer" 
                       class="form-control" 
                       pattern="[A-Za-z].*" 
                       title="Nama developer harus diawali dengan huruf!" 
                       placeholder="Contoh: Kila Studios" 
                       required>
            </div>

            <!-- Pemain Aktif -->
            <div class="mb-3">
                <label class="form-label">Pemain Aktif</label>
                <input type="number" name="pemain_aktif" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Data</button>
            <a href="/roblox" class="btn btn-secondary mt-2">Batal</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>