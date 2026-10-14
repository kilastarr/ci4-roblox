<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Game Roblox</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">🎮 Daftar Game Roblox Popular</h4>
                <a href="<?= base_url('roblox/create') ?>" class="btn btn-light btn-sm fw-bold">+ Tambah Game Baru</a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Game</th>
                            <th>Genre</th>
                            <th>Developer</th>
                            <th>Pemain Aktif</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($game as $g) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><strong><?= $g['nama_game']; ?></strong></td>
                            <td><span class="badge bg-secondary"><?= $g['genre']; ?></span></td>
                            <td><?= $g['developer']; ?></td>
                            <td><?= number_format($g['active_players']); ?> Players</td>
                            <td class="text-center">
                                <a href="<?= base_url('roblox/edit/' . $g['id_game']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= base_url('roblox/delete/' . $g['id_game']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus game ini?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>