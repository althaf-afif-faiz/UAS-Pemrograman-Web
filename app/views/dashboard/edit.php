<div class="container mt-4">
    <div class="card shadow border-0 rounded-4 p-4" style="max-width: 600px; margin: auto;">
        <h3 class="fw-bold text-primary mb-4">Edit Data HP</h3>
        
        <form action="<?= BASEURL; ?>/dashboard/update" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $data['product']['id']; ?>">
            <input type="hidden" name="gambarLama" value="<?= $data['product']['gambar']; ?>">

            <div class="mb-3">
                <label class="form-label">Merk</label>
                <input type="text" name="merk" class="form-control" value="<?= $data['product']['merk']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tipe HP</label>
                <input type="text" name="tipe" class="form-control" value="<?= $data['product']['tipe']; ?>" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-success">Harga Modal (Beli)</label>
                    <input type="number" name="modal_beli" class="form-control border-success" 
                           value="<?= $data['product']['modal_beli'] ?? 0; ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-primary">Harga Jual (Rp)</label>
                    <input type="number" name="harga" class="form-control border-primary" 
                           value="<?= $data['product']['harga']; ?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" class="form-control" value="<?= $data['product']['stok']; ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tahun Rilis</label>
                    <input type="number" name="tahun" class="form-control" value="<?= $data['product']['tahun']; ?>" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">RAM/ROM</label>
                <input type="text" name="ram_rom" class="form-control" value="<?= $data['product']['ram_rom']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Info Singkat</label>
                <textarea name="info_singkat" class="form-control" rows="2" required><?= $data['product']['info_singkat']; ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Gambar Saat Ini</label><br>
                <img src="<?= BASEURL; ?>/public/img/<?= $data['product']['gambar']; ?>" width="100" class="mb-2 rounded border shadow-sm">
            </div>

            <div class="mb-4">
                <label class="form-label">Ganti Gambar (Opsional)</label>
                <input type="file" name="gambar" class="form-control">
                <div class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</div>
            </div>

            <button type="submit" class="btn btn-primary w-100 rounded-pill py-2 fw-bold">Update Data</button>
            <a href="<?= BASEURL; ?>/dashboard" class="btn btn-link w-100 mt-2 text-decoration-none text-muted">Batal</a>
        </form>
    </div>
</div>