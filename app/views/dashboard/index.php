<div class="container-fluid p-4">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-primary">Dashboard Admin</h2>
            <p class="text-muted">Laporan keuangan & manajemen stok</p>
        </div>
        <a href="<?= BASEURL; ?>/dashboard/create" class="btn btn-success rounded-pill px-4 shadow-sm">
            <i class="bi bi-plus-lg me-2"></i>Tambah HP Baru
        </a>
    </div>

    <div class="row g-3 mb-5">
        <div class="col-md-3">
            <div class="card bg-primary text-white border-0 shadow rounded-4 h-100">
                <div class="card-body p-4">
                    <h6 class="text-uppercase opacity-75 small fw-bold">Total Stok Fisik</h6>
                    <h2 class="fw-bold mb-0 display-6"><?= $data['total_stok'] ?? 0; ?> <span class="fs-6">Unit</span></h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card bg-warning text-dark border-0 shadow rounded-4 h-100">
                <div class="card-body p-4">
                    <h6 class="text-uppercase opacity-75 small fw-bold">Barang Terjual</h6>
                    <h2 class="fw-bold mb-0 display-6"><?= $data['terjual'] ?? 0; ?> <span class="fs-6">Unit</span></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-success text-white border-0 shadow rounded-4 h-100">
                <div class="card-body p-4">
                    <h6 class="text-uppercase opacity-75 small fw-bold">Omset (Kotor)</h6>
                    <h3 class="fw-bold mb-0">Rp <?= number_format($data['omset'] ?? 0, 0, ',', '.'); ?></h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-info text-white border-0 shadow rounded-4 h-100">
                <div class="card-body p-4">
                    <h6 class="text-uppercase opacity-75 small fw-bold">Profit (Bersih)</h6>
                    <h3 class="fw-bold mb-0">Rp <?= number_format($data['profit'] ?? 0, 0, ',', '.'); ?></h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-header bg-white border-0 pt-4 px-4">
                    <h5 class="fw-bold mb-0">Transaksi Terakhir</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light text-secondary small">
                                <tr>
                                    <th class="ps-4">Barang</th>
                                    <th>Waktu</th>
                                    <th class="text-end pe-4">Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($data['transaksi'])) : ?>
                                    <?php foreach($data['transaksi'] as $tr): ?>
                                    <tr>
                                        <td class="ps-4 fw-bold text-dark"><?= $tr['merk']; ?></td>
                                        <td class="small text-muted"><?= date('d/m H:i', strtotime($tr['tanggal'])); ?></td>
                                        <td class="text-end pe-4 text-success fw-bold">
                                            +<?= number_format($tr['total_bayar'] / 1000, 0); ?>k
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="3" class="text-center text-muted py-3">Belum ada transaksi</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8 mb-4">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-header bg-white border-0 pt-4 px-4">
                    <h5 class="fw-bold mb-0">Stok Gudang</h5>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead class="text-secondary small">
                                <tr>
                                    <th>No</th>
                                    <th style="width: 30%;">Produk</th>
                                    <th class="text-primary">Harga Jual</th>
                                    <th class="text-muted">Modal (Beli)</th>
                                    <th class="text-center">Stok</th>
                                    <th class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($data['products'] as $product) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="<?= BASEURL; ?>/public/img/<?= $product['gambar']; ?>" 
                                                 class="rounded border shadow-sm me-3" 
                                                 style="width: 45px; height: 45px; object-fit: cover;"
                                                 onerror="this.src='https://via.placeholder.com/45'">
                                            <div>
                                                <div class="fw-bold text-dark"><?= $product['merk']; ?></div>
                                                <div class="small text-muted"><?= $product['tipe']; ?></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="fw-bold text-primary">
                                        Rp <?= number_format($product['harga'], 0, ',', '.'); ?>
                                    </td>
                                    <td class="text-muted">
                                        Rp <?= number_format($product['modal_beli'] ?? 0, 0, ',', '.'); ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if($product['stok'] > 10): ?>
                                            <span class="badge bg-success rounded-pill px-3"><?= $product['stok']; ?> unit</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger rounded-pill px-3"><?= $product['stok']; ?> unit</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-end">
                                        <a href="<?= BASEURL; ?>/dashboard/edit/<?= $product['id']; ?>" class="btn btn-sm btn-info text-white rounded-circle shadow-sm me-1">
                                            Edit
                                        </a>
                                        <a href="<?= BASEURL; ?>/dashboard/hapus/<?= $product['id']; ?>" class="btn btn-sm btn-danger rounded-circle shadow-sm" onclick="return confirm('Yakin hapus?');">
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>