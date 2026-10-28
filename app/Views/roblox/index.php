<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Game Roblox</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">

        <!-- FITUR BARU 1: Card Ringkasan Statistik -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card bg-primary text-white p-3 shadow-sm border-0">
                    <h6 class="mb-1 text-uppercase opacity-75">Total Game Terdaftar</h6>
                    <h2 class="mb-0 fw-bold"><?= count($game); ?> Game</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-success text-white p-3 shadow-sm border-0">
                    <h6 class="mb-1 text-uppercase opacity-75">Total Akumulasi Pemain Aktif</h6>
                    <h2 class="mb-0 fw-bold">
                        <?php 
                            $totalPemain = array_sum(array_column($game, 'active_players'));
                            echo number_format($totalPemain);
                        ?> Players
                    </h2>
                </div>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">🎮 Daftar Game Roblox Popular</h4>
                <a href="<?= base_url('roblox/create') ?>" class="btn btn-light btn-sm fw-bold">+ Tambah Game Baru</a>
            </div>
            <div class="card-body">

                <!-- FITUR BARU 2: Form Pencarian Data -->
                <form action="<?= base_url('roblox') ?>" method="get" class="mb-3 d-flex gap-2">
                    <input type="text" name="keyword" class="form-control" placeholder="Cari nama game, genre, atau developer..." value="<?= esc($_GET['keyword'] ?? '') ?>">
                    <button type="submit" class="btn btn-primary">Cari</button>
                    <?php if (!empty($_GET['keyword'])): ?>
                        <a href="<?= base_url('roblox') ?>" class="btn btn-outline-secondary">Reset</a>
                    <?php endif; ?>
                </form>

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
                        <?php if (empty($game)) : ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">Data game tidak ditemukan.</td>
                            </tr>
                        <?php else : ?>
                            <?php $no = 1; foreach ($game as $g) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><strong><?= $g['nama_game']; ?></strong></td>
                                <td><span class="badge bg-secondary"><?= $g['genre']; ?></span></td>
                                <td><?= $g['developer']; ?></td>
                                <td>
                                    <!-- FITUR BARU 3: Badge Keramaian Server -->
                                    <?php 
                                        $p = (int)$g['active_players'];
                                        if ($p >= 50000) {
                                            echo '<span class="badge bg-danger">🔥 ' . number_format($p) . ' Players</span>';
                                        } else if ($p >= 5000) {
                                            echo '<span class="badge bg-success">⭐ ' . number_format($p) . ' Players</span>';
                                        } else {
                                            echo '<span class="badge bg-secondary">💤 ' . number_format($p) . ' Players</span>';
                                        }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('roblox/edit/' . $g['id_game']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="<?= base_url('roblox/delete/' . $g['id_game']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus game ini?')">Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>