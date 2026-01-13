<div class="login-card">
    <h2 class="mb-4 fw-bold text-primary">Selamat Datang</h2>
    <p class="text-muted mb-4">Silakan login untuk melanjutkan</p>
    
    <form action="<?= BASEURL; ?>/auth/login" method="POST">
        <div class="mb-3 text-start">
            <label class="form-label small fw-bold">Username</label>
            <input type="text" name="username" class="form-control rounded-pill p-2 px-3" placeholder="" required>
        </div>
        <div class="mb-4 text-start">
            <label class="form-label small fw-bold">Password</label>
            <input type="password" name="password" class="form-control rounded-pill p-2 px-3" required>
        </div>
        <button type="submit" class="btn btn-primary w-100 rounded-pill py-2 fw-bold">LOGIN SEKARANG</button>
        
    </form>
</div>