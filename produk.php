<?php
class Produk {
    public $namaProduk;
    public $jenisProduk;
    public $jumlahProduk;
    public $stok;
    public $pembelian;

    public function stokAkhirProduk() {
        $this->stok = ($this->stok - $this->pembelian);
        return $this->stok;
    }
}

// Membuat objek dari kelas Produk
$panggilProduk = new Produk();

// Mengatur nilai properti
$panggilProduk->stok = 50;        
$panggilProduk->pembelian = 10;    

// Menghitung dan menampilkan stok akhir
echo $panggilProduk->stokAkhirProduk(); 
?>
