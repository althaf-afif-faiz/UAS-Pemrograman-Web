<div class="container mt-4">
    
    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <div class="search-container text-center">
                <h4 class="mb-3 fw-bold" style="color: var(--primary);">Cari Handphone Impianmu</h4>
                <form action="<?= BASEURL; ?>/home/cari" method="POST" class="d-flex gap-2">
                    <input type="text" name="keyword" class="form-control search-input" placeholder="Cari merk atau tipe HP..." required value="<?= isset($_POST['keyword']) ? $_POST['keyword'] : ''; ?>">
                    <button type="submit" class="btn btn-primary rounded-pill px-4">Cari</button>
                    
                    <?php if(isset($data['is_search'])) : ?>
                        <a href="<?= BASEURL; ?>/home" class="btn btn-secondary rounded-pill px-3 d-flex align-items-center">Reset</a>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <?php if(empty($data['products'])) : ?>
            <div class="col-12 text-center text-muted py-5">
                <h3>🚫 Barang tidak ditemukan</h3>
                <a href="<?= BASEURL; ?>/home" class="btn btn-outline-primary mt-3 rounded-pill">Lihat Semua Barang</a>
            </div>
        <?php else : ?>
            <?php foreach($data['products'] as $hp) : ?>
                <div class="col-lg-3 col-md-4 col-6 mb-4">
                    <div class="card card-hp h-100 shadow-sm border-0">
                        
                        <div class="img-wrapper d-flex align-items-center justify-content-center bg-white p-3" style="height: 180px;">
                            <img src="<?= BASEURL; ?>/public/img/<?= $hp['gambar']; ?>" class="img-fluid" style="max-height: 100%; object-fit: contain;">
                        </div>
                        
                        <div class="card-body p-3 text-center">
                            <h6 class="card-title fw-bold text-dark mb-1" style="font-size: 1rem;">
                                <?= $hp['merk']; ?> <span class="fw-normal small"><?= $hp['tipe']; ?></span>
                            </h6>
                            
                            <div class="mb-2 mt-2">
                                <span class="badge bg-light text-dark border rounded-pill" style="font-size: 0.75rem;">
                                    💾 <?= isset($hp['ram_rom']) ? $hp['ram_rom'] : '-'; ?>
                                </span>
                                <span class="badge bg-light text-dark border rounded-pill" style="font-size: 0.75rem;">
                                    📅 <?= isset($hp['tahun']) ? $hp['tahun'] : '-'; ?>
                                </span>
                            </div>

                            <p class="text-muted small mb-2 fst-italic text-truncate" style="font-size: 0.8rem;">
                                "<?= isset($hp['info_singkat']) ? $hp['info_singkat'] : '-'; ?>"
                            </p>
                            
                            <h5 class="text-primary fw-bold mb-0">Rp <?= number_format($hp['harga'], 0, ',', '.'); ?></h5>
                        </div>
                        
                        <div class="card-footer bg-white border-0 p-3 pt-0">
                            <a href="<?= BASEURL; ?>/home/detail/<?= $hp['id']; ?>" class="btn btn-outline-primary w-100 rounded-pill btn-sm" style="font-size: 0.8rem;">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <?php if (!$data['is_search'] && $data['total_halaman'] > 1) : ?>
    <div class="row mt-4 mb-5">
        <div class="col-12 d-flex justify-content-center">
            <nav>
                <ul class="pagination">
                    
                    <?php if ($data['halaman_aktif'] > 1) : ?>
                        <li class="page-item">
                            <a class="page-link rounded-pill px-3 me-2" href="<?= BASEURL; ?>/home/index/<?= $data['halaman_aktif'] - 1; ?>">&laquo; Prev</a>
                        </li>
                    <?php else : ?>
                        <li class="page-item disabled">
                            <span class="page-link rounded-pill px-3 me-2">&laquo; Prev</span>
                        </li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $data['total_halaman']; $i++) : ?>
                        <?php if ($i == $data['halaman_aktif']) : ?>
                            <li class="page-item active">
                                <a class="page-link rounded-circle mx-1" href="<?= BASEURL; ?>/home/index/<?= $i; ?>"><?= $i; ?></a>
                            </li>
                        <?php else : ?>
                            <li class="page-item">
                                <a class="page-link rounded-circle mx-1" href="<?= BASEURL; ?>/home/index/<?= $i; ?>"><?= $i; ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php if ($data['halaman_aktif'] < $data['total_halaman']) : ?>
                        <li class="page-item">
                            <a class="page-link rounded-pill px-3 ms-2" href="<?= BASEURL; ?>/home/index/<?= $data['halaman_aktif'] + 1; ?>">Next &raquo;</a>
                        </li>
                    <?php else : ?>
                        <li class="page-item disabled">
                            <span class="page-link rounded-pill px-3 ms-2">Next &raquo;</span>
                        </li>
                    <?php endif; ?>

                </ul>
            </nav>
        </div>
    </div>
    <?php endif; ?>

</div>