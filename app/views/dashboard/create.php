<div class="container mt-4 mb-5">
    <div class="card border-0 shadow-sm rounded-4" style="max-width: 700px; margin: auto;">
        <div class="card-header bg-white border-0 pt-4 px-4">
            <h4 class="fw-bold text-primary"><i class="bi bi-plus-circle-fill me-2"></i>Tambah HP Baru</h4>
        </div>
        <div class="card-body p-4">
            
            <form action="<?= BASEURL; ?>/dashboard/store" method="POST" enctype="multipart/form-data">
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Merk HP</label>
                        <input type="text" name="merk" class="form-control" placeholder="Contoh: Samsung" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Tipe HP</label>
                        <input type="text" name="tipe" class="form-control" placeholder="Contoh: Galaxy S24" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-success">Harga Modal (Beli)</label>
                        <div class="input-group">
                            <span class="input-group-text bg-success text-white">Rp</span>
                            <input type="number" name="modal_beli" class="form-control border-success" required>
                        </div>
                        <div class="form-text">Harga beli dari supplier.</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-primary">Harga Jual</label>
                        <div class="input-group">
                            <span class="input-group-text bg-primary text-white">Rp</span>
                            <input type="number" name="harga" class="form-control border-primary" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">Stok Awal</label>
                        <input type="number" name="stok" class="form-control" value="10" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">RAM/ROM</label>
                        <input type="text" name="ram_rom" class="form-control" placeholder="8/128 GB">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">Tahun Rilis</label>
                        <input type="number" name="tahun" class="form-control" value="2024">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Info Singkat</label>
                    <textarea name="info_singkat" class="form-control" rows="2" placeholder="Deskripsi singkat produk..."></textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">Upload Gambar</label>
                    <input type="file" name="gambar" class="form-control">
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary rounded-pill py-2 fw-bold shadow-sm">
                        <i class="bi bi-save me-2"></i>Simpan Data
                    </button>
                    <a href="<?= BASEURL; ?>/dashboard" class="btn btn-light rounded-pill py-2 text-muted">Batal</a>
                </div>

            </form>
        </div>
    </div>
</div>