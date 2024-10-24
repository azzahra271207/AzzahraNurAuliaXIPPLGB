<?php
// Kelas Barang
class Barang {
    public $idBarang;
    public $namaBarang;
    public $stok;
    public $pembelian;
    public $harga;
    public $dataPembelian = []; 
    // Konstruktor untuk inisialisasi properti/atribut
    public function __construct($idBarang = '', $namaBarang = '', $stok = 0, $harga = 0) {
        $this->idBarang = $idBarang;
        $this->namaBarang = $namaBarang;
        $this->stok = $stok;
        $this->harga = $harga;
    }

    // Fungsi untuk menambahkan data pembelian
    public function tambahPembelian($jumlah) {
        $this->pembelian = $jumlah; 
        $this->stok = $this->stok - $jumlah; 
        $this->dataPembelian[] = [
            'jumlah' => $jumlah,
            'tanggal' => date("Y-m-d"), 
        ]; // Simpan data pembelian
    }

    // Fungsi untuk menghitung stok akhir barang
    public function stokAkhirBarang() {
        return $this->stok; 
    }
}

// Inisialisasi variabel
$barang = null;
$stokAkhir = null;

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Buat instance Barang dengan data dari form
    $barang = new Barang(
        $_POST['idBarang'], 
        $_POST['namaBarang'],
        intval($_POST['stok']),
        floatval($_POST['harga'])
    );
    
    // Ambil data dari form dan tambahkan pembelian
    $jumlahPembelian = intval($_POST['pembelian']);
    
    // Tambahkan pembelian dan hitung stok akhir
    $barang->tambahPembelian($jumlahPembelian);
    $stokAkhir = $barang->stokAkhirBarang();
}
?>

<!-- Form input untuk menguji -->
<form method="POST" action="">
    <h3>Data Barang</h3>
    Tanggal: <input type="date" name="tanggal" required><br>
    ID Barang: <input type="number" name="idBarang" required><br>
    Nama Barang: <input type="text" name="namaBarang" required><br>
    Stok Awal: <input type="number" name="stok" required><br>
    Jumlah Pembelian: <input type="number" name="pembelian" required><br>
    Harga: <input type="number" step="0.01" name="harga" required><br>
    <input type="submit" value="Hitung Stok Akhir">
</form>

<!-- Output data barang dan stok akhir -->
<?php
if ($barang !== null) {
    echo "<h3>Informasi Barang</h3>";
    echo "ID Barang: " . $barang->idBarang . "<br>";
    echo "Nama Barang: " . $barang->namaBarang . "<br>";
    echo "Stok Awal: " . $barang->stok . "<br>";
    echo "Jumlah Pembelian: " . $barang->pembelian . "<br>";
    echo "Harga: Rp" . number_format($barang->harga, 2) . "<br>";
    echo "<h3>Stok Akhir: " . $stokAkhir . "</h3>";
    echo "<h3>Data Pembelian</h3>";
    foreach ($barang->dataPembelian as $pembelian) {
        echo "Jumlah: " . $pembelian['jumlah'] . ", Tanggal: " . $pembelian['tanggal'] . "<br>";
    }
}
?>
