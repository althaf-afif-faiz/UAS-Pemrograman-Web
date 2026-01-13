<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?= $data['title'] ?? 'APSTORE'; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="<?= BASEURL; ?>/public/css/style.css">
    
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f8f9fa; }
        .navbar-custom { background-color: #fff; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
        .brand-text { font-weight: bold; color: #0d6efd; }
    </style>
</head>

<body class="<?= ($data['title'] == 'Login - Toko HP') ? 'login-body' : ''; ?>">

<?php 
if(isset($data['title']) && $data['title'] != 'Login - Toko HP') : 
?>
    <nav class="navbar navbar-expand-lg navbar-custom mb-4 py-3">
        <div class="container">
            <a class="navbar-brand brand-text fs-4" href="<?= BASEURL; ?>/dashboard">
                <i class="bi bi-phone-fill me-2"></i>APSTORE
            </a>
            <div class="ms-auto d-flex align-items-center">
                <span class="me-3 text-muted">Halo, <b><?= $_SESSION['username'] ?? 'Admin'; ?></b></span>
                
                <a href="<?= BASEURL; ?>/auth/logout" class="btn btn-outline-danger btn-sm rounded-pill px-3">
                    <i class="bi bi-box-arrow-right me-1"></i> Logout
                </a>
            </div>
        </div>
    </nav>
<?php endif; ?>