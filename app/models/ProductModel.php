<?php

class ProductModel {
    private $table = 'products';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllProducts($start = 0, $limit = 9999) {
        $query = "SELECT * FROM " . $this->table . " LIMIT :start, :limit";
        $this->db->query($query);
        $this->db->bind('start', $start);
        $this->db->bind('limit', $limit);
        return $this->db->resultSet();
    }

    public function countAllProducts() {
        $this->db->query('SELECT COUNT(*) as total FROM ' . $this->table);
        $result = $this->db->single();
        return $result['total'];
    }

    public function getProductById($id) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function cariProduk($keyword) {
        $query = "SELECT * FROM " . $this->table . " WHERE merk LIKE :keyword OR tipe LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }

    public function getTotalStok() {
        $this->db->query('SELECT SUM(stok) as total FROM ' . $this->table);
        $hasil = $this->db->single();
        return $hasil['total'] ?? 0;
    }

    public function getTotalTerjual() {
        $this->db->query('SELECT SUM(jumlah) as total FROM transaksi');
        $hasil = $this->db->single();
        return $hasil['total'] ?? 0;
    }

    public function getOmset() {
        $this->db->query('SELECT SUM(total_bayar) as total FROM transaksi');
        $hasil = $this->db->single();
        return $hasil['total'] ?? 0;
    }

    public function getProfit() {
        $this->db->query('SELECT SUM(keuntungan) as total FROM transaksi');
        $hasil = $this->db->single();
        return $hasil['total'] ?? 0;
    }

    public function getLatestTransactions() {
        $query = "SELECT t.*, p.merk, p.tipe 
                  FROM transaksi t 
                  JOIN " . $this->table . " p ON t.product_id = p.id 
                  ORDER BY t.tanggal DESC LIMIT 5";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function tambahDataProduct($data) {
        $query = "INSERT INTO " . $this->table . " 
                    (merk, tipe, harga, modal_beli, stok, ram_rom, tahun, info_singkat, gambar) 
                  VALUES 
                    (:merk, :tipe, :harga, :modal_beli, :stok, :ram_rom, :tahun, :info_singkat, :gambar)";
        
        $this->db->query($query);
        $this->db->bind('merk', $data['merk']);
        $this->db->bind('tipe', $data['tipe']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('modal_beli', $data['modal_beli'] ?? 0);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('ram_rom', $data['ram_rom']);
        $this->db->bind('tahun', $data['tahun']);
        $this->db->bind('info_singkat', $data['info_singkat']);
        $this->db->bind('gambar', $data['gambar']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataProduct($data) {
        $query = "UPDATE " . $this->table . " SET 
                    merk = :merk,
                    tipe = :tipe,
                    harga = :harga,
                    modal_beli = :modal_beli, 
                    stok = :stok,
                    ram_rom = :ram_rom,
                    tahun = :tahun,
                    info_singkat = :info_singkat,
                    gambar = :gambar
                  WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('merk', $data['merk']);
        $this->db->bind('tipe', $data['tipe']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('modal_beli', $data['modal_beli']); 
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('ram_rom', $data['ram_rom']);
        $this->db->bind('tahun', $data['tahun']);
        $this->db->bind('info_singkat', $data['info_singkat']);
        $this->db->bind('gambar', $data['gambar']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataProduct($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function beliBarang($id) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id = :id");
        $this->db->bind('id', $id);
        $produk = $this->db->single();

        if($produk['stok'] > 0) {
            $this->db->query("UPDATE " . $this->table . " SET stok = stok - 1 WHERE id = :id");
            $this->db->bind('id', $id);
            $this->db->execute();

            $modal = $produk['modal_beli'] ?? 0; 
            $profit = $produk['harga'] - $modal;

            $queryTrans = "INSERT INTO transaksi (product_id, jumlah, total_bayar, tanggal, keuntungan) 
                           VALUES (:pid, 1, :bayar, NOW(), :untung)";
            
            $this->db->query($queryTrans);
            $this->db->bind('pid', $id);
            $this->db->bind('bayar', $produk['harga']);
            $this->db->bind('untung', $profit);
            $this->db->execute();

            return 1; 
        } else {
            return 0; 
        }
    }
}