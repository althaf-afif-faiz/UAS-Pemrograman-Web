<?php
class HomeController extends Controller {
    
    public function index($halaman = 1) {
        if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }

        $limit = 4;
        $halaman = (int)$halaman;
        
        if ($halaman < 1) {
            $halaman = 1;
        }

        $mulai = ($halaman - 1) * $limit;

        $totalData = $this->model('ProductModel')->countAllProducts();
        $totalHalaman = ceil($totalData / $limit);

        $data['title'] = 'Katalog HP';
        $data['products'] = $this->model('ProductModel')->getAllProducts($mulai, $limit);
        $data['halaman_aktif'] = $halaman;
        $data['total_halaman'] = $totalHalaman;
        $data['is_search'] = false;
        
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    public function cari() {
        if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }

        $data['title'] = 'Hasil Pencarian';
        $keyword = $_POST['keyword'];
        $data['products'] = $this->model('ProductModel')->cariProduk($keyword);
        $data['is_search'] = true;
        
        $data['halaman_aktif'] = 1; 
        $data['total_halaman'] = 1;
        
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id) {
        if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }

        $data['title'] = 'Detail Produk';
        $data['product'] = $this->model('ProductModel')->getProductById($id);
        
        if (!$data['product']) {
            header('Location: ' . BASEURL . '/home');
            exit;
        }

        $this->view('templates/header', $data);
        $this->view('home/detail', $data);
        $this->view('templates/footer');
    }
    public function prosesBeli($id) {
        if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }

        if ($this->model('ProductModel')->beliBarang($id) > 0) {
            echo "<script>
                    alert('✅ Pembelian Berhasil! Terima kasih sudah berbelanja.');
                    document.location.href = '" . BASEURL . "/home/detail/$id';
                  </script>";
        } else {
            echo "<script>
                    alert('❌ Maaf, Stok barang ini sudah habis!');
                    document.location.href = '" . BASEURL . "/home/detail/$id';
                  </script>";
        }
    }
}