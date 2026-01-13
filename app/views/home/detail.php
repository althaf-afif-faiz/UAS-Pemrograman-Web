<div class="container mt-5 mb-5">
    <a href="<?= BASEURL; ?>/home" class="text-decoration-none text-muted mb-3 d-inline-block">
        &laquo; Kembali ke Katalog
    </a>

    <div class="card shadow border-0 rounded-4 overflow-hidden">
        <div class="row g-0">
            
            <div class="col-md-5 bg-white d-flex align-items-center justify-content-center p-4 border-end">
                <img src="<?= BASEURL; ?>/public/img/<?= $data['product']['gambar']; ?>" class="img-fluid rounded" style="max-height: 400px; object-fit: contain;">
            </div>

            <div class="col-md-7">
                <div class="card-body p-4 p-md-5">
                    
                    <h2 class="fw-bold text-dark mb-1"><?= $data['product']['merk']; ?></h2>
                    <h4 class="text-muted fw-normal mb-3"><?= $data['product']['tipe']; ?></h4>
                    
                    <h3 class="text-primary fw-bold mb-4">Rp <?= number_format($data['product']['harga'], 0, ',', '.'); ?></h3>

                    <hr>

                    <div class="row mb-4">
                        <div class="col-6 mb-3">
                            <small class="text-muted fw-bold d-block" style="font-size: 0.75rem;">RAM / PENYIMPANAN</small>
                            <span class="fs-5 text-dark">💾 <?= isset($data['product']['ram_rom']) ? $data['product']['ram_rom'] : '-'; ?></span>
                        </div>
                        <div class="col-6 mb-3">
                            <small class="text-muted fw-bold d-block" style="font-size: 0.75rem;">TAHUN RILIS</small>
                            <span class="fs-5 text-dark">📅 <?= isset($data['product']['tahun']) ? $data['product']['tahun'] : '-'; ?></span>
                        </div>
                    </div>

                    <div class="mb-4 bg-light p-3 rounded-3">
                        <small class="text-muted fw-bold d-block mb-2">FITUR UNGGULAN & DESKRIPSI</small>
                        <p class="text-secondary mb-0" style="line-height: 1.6;">
                            "<?= isset($data['product']['info_singkat']) ? $data['product']['info_singkat'] : 'Belum ada deskripsi.'; ?>"
                        </p>
                    </div>

                    <div class="d-flex align-items-center gap-3 mt-4">
                        <div class="me-auto">
                            <small class="text-muted d-block">Sisa Stok:</small>
                            <span class="fw-bold text-dark fs-5"><?= $data['product']['stok']; ?> Unit</span>
                        </div>
                        
                        <form action="<?= BASEURL; ?>/home/prosesBeli/<?= $data['product']['id']; ?>" method="POST">
                            <?php if($data['product']['stok'] > 0) : ?>
                                <button type="submit" class="btn btn-success rounded-pill px-5 py-2 fw-bold shadow-sm" onclick="return confirm('Yakin ingin membeli barang ini? Stok akan berkurang.');">
                                    🛒 Beli Sekarang
                                </button>
                            <?php else : ?>
                                <button type="button" class="btn btn-secondary rounded-pill px-5 py-2 fw-bold" disabled>
                                    ❌ Stok Habis
                                </button>
                            <?php endif; ?>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>