<?php

class DashboardController extends Controller {

    public function index() {
        $this->cekAdmin();
        $data['title'] = 'Dashboard Admin'; 

        $data['products'] = $this->model('ProductModel')->getAllProducts();

        $data['total_stok'] = $this->model('ProductModel')->getTotalStok();
        $data['terjual']    = $this->model('ProductModel')->getTotalTerjual();
        $data['omset']      = $this->model('ProductModel')->getOmset();
        $data['profit']     = $this->model('ProductModel')->getProfit();
        $data['transaksi']  = $this->model('ProductModel')->getLatestTransactions();

        $this->view('templates/header', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }

    public function cari() {
        $this->cekAdmin();
        $data['title'] = 'Hasil Pencarian';

        $keyword = $_POST['keyword'];

        $data['products'] = $this->model('ProductModel')->cariProduk($keyword);

        $data['total_stok'] = $this->model('ProductModel')->getTotalStok();
        $data['terjual']    = $this->model('ProductModel')->getTotalTerjual();
        $data['omset']      = $this->model('ProductModel')->getOmset();
        $data['profit']     = $this->model('ProductModel')->getProfit();
        $data['transaksi']  = $this->model('ProductModel')->getLatestTransactions();

        $this->view('templates/header', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }

    public function create() {
        $this->cekAdmin();
        $data['title'] = 'Tambah Data HP';
        
        $this->view('templates/header', $data);
        $this->view('dashboard/create', $data); 
        $this->view('templates/footer');
    }

    public function store() {
        $this->cekAdmin();

        $folderTujuan = 'public/img';
        if (!is_dir($folderTujuan)) {
            mkdir($folderTujuan, 0777, true);
        }

        $gambar = $this->uploadImage();
        if (!$gambar) {
            return false; 
        }

        $_POST['gambar'] = $gambar;

        try {
            if ($this->model('ProductModel')->tambahDataProduct($_POST) > 0) {
                echo "<script>
                        alert('✅ Data Berhasil Ditambahkan!');
                        document.location.href = '" . BASEURL . "/dashboard';
                      </script>";
            } else {
                echo "<script>alert('❌ Gagal menambahkan data ke Database.'); window.history.back();</script>";
            }
        } catch (Exception $e) {
            echo "<h3>Terjadi Error Sistem!</h3>";
            echo "<p>Pesan: " . $e->getMessage() . "</p>";
            echo "<pre>"; var_dump($_POST); echo "</pre>";
            die();
        }
    }

    public function edit($id) {
        $this->cekAdmin();
        $data['title'] = 'Edit Data HP';
        $data['product'] = $this->model('ProductModel')->getProductById($id);
        
        $this->view('templates/header', $data);
        $this->view('dashboard/edit', $data);
        $this->view('templates/footer');
    }

    public function update() {
        $this->cekAdmin();
        
        $gambarLama = $_POST['gambarLama'];

        if ($_FILES['gambar']['error'] === 4) {
            $gambar = $gambarLama; 
        } else {
            $gambar = $this->uploadImage();
            if (!$gambar) return false; 
            
            if ($gambarLama != 'default.jpg' && file_exists('public/img/' . $gambarLama)) {
                unlink('public/img/' . $gambarLama);
            }
        }

        $_POST['gambar'] = $gambar;

        if ($this->model('ProductModel')->ubahDataProduct($_POST) > 0) {
            echo "<script>
                    alert('✅ Data Berhasil Diupdate!');
                    document.location.href = '" . BASEURL . "/dashboard';
                  </script>";
        } else {
            header('Location: ' . BASEURL . '/dashboard');
        }
    }

    public function hapus($id) {
        $this->cekAdmin();
        
        $produk = $this->model('ProductModel')->getProductById($id);
        
        if ($this->model('ProductModel')->hapusDataProduct($id) > 0) {
            if ($produk['gambar'] != 'default.jpg' && file_exists('public/img/' . $produk['gambar'])) {
                unlink('public/img/' . $produk['gambar']);
            }
            
            echo "<script>
                    alert('🗑️ Data Berhasil Dihapus!');
                    document.location.href = '" . BASEURL . "/dashboard';
                  </script>";
        }
    }

    
    public function uploadImage() {
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        if ($error === 4) {
            return 'default.jpg'; 
        }
        
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>alert('❌ Yang Anda upload bukan gambar valid! (Gunakan jpg, jpeg, png, webp)'); window.history.back();</script>";
            return false;
        }

        if ($ukuranFile > 5000000) {
            echo "<script>alert('❌ Ukuran gambar terlalu besar! Maksimal 5MB'); window.history.back();</script>";
            return false;
        }

        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        $folderTujuan = 'public/img/';
        
        if (move_uploaded_file($tmpName, $folderTujuan . $namaFileBaru)) {
            return $namaFileBaru;
        } else {
            echo "<script>alert('❌ Gagal mengupload file ke folder public/img.'); window.history.back();</script>";
            return false;
        }
    }

    public function cekAdmin() {
        if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }
    }
}