<?php
class Produk {
    public $namaProduk;
    public $jenisProduk;
    public $jumlahProduk;
    public $stok;
    public $pembelian;

    // Constructor untuk inisialisasi properties/atribut
    public function __construct($namaProduk = '', $jenisProduk = '', $jumlahProduk = 0, $stok = 0, $pembelian = 0) {
        $this->namaProduk = $namaProduk;
        $this->jenisProduk = $jenisProduk;
        $this->jumlahProduk = $jumlahProduk;
        $this->stok = $stok;
        $this->pembelian = $pembelian;
    }

    // Fungsi untuk menghitung stok akhir produk
    public function stokAkhirProduk() {
        $this->stok = ($this->stok - $this->pembelian);
        return $this->stok;
    }
}

// Inisialisasi variabel untuk perhitungan stok
$Stokakhir = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Membentuk instance/objek baru dari class Produk
    $panggilProduk = new Produk();
    
    // Mengisi properti stok dan pembelian dari form POST
    $panggilProduk->stok = intval($_POST['stok']);         
    $panggilProduk->pembelian = intval($_POST['pembelian']); 

    // Perhitungan akhir sebuah produk
    $Stokakhir = $panggilProduk->stokAkhirProduk();
}
?>

<!-- Form input untuk menguji -->
<form method="POST" action="">
    Stok Awal: <input type="number" name="stok" required><br>
    Jumlah Pembelian: <input type="number" name="pembelian" required><br>
    <input type="submit" value="Hitung Stok Akhir">
</form>

<!-- Output stok akhir -->
<?php
if ($Stokakhir !== null) {
    echo "Stok Akhir Produk: " . $Stokakhir;
}
?>
