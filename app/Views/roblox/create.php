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
        <form action="/roblox/store" method="post" class="card p-4 shadow-sm bg-white">
            <div class="mb-3">
                <label class="form-label">Nama Game</label>
                <input type="text" name="nama_game" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Genre</label>
                <input type="text" name="genre" class="form-control" placeholder="Contoh: Roleplay, RPG" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Developer</label>
                <input type="text" name="developer" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Pemain Aktif</label>
                <input type="number" name="pemain_aktif" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Data</button>
            <a href="/roblox" class="btn btn-secondary mt-2">Batal</a>
        </form>
    </div>
</body>
</html>