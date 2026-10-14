<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Game Roblox</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5" style="max-width: 600px;">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0">Edit Data Game Roblox</h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url('roblox/update/' . $game['id_game']) ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label">Nama Game</label>
                        <input type="text" name="nama_game" value="<?= $game['nama_game'] ?>" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Genre</label>
                        <input type="text" name="genre" value="<?= $game['genre'] ?>" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Developer</label>
                        <input type="text" name="developer" value="<?= $game['developer'] ?>" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Pemain Aktif</label>
                        <input type="number" name="active_players" value="<?= $game['active_players'] ?>" class="form-control" required>
                    </div>
                    <div class="d-flex justify-content-between mt-4">
                        <a href="<?= base_url('roblox') ?>" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-warning">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>