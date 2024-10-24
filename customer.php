<?php
// Kelas Customer
class Customer {
    public $tanggal; // Ditambahkan atribut baru untuk tanggal
    public $idBarang; // Diubah dari idCustomer menjadi idBarang
    public $namaCustomer;
    public $telepon;
    public $email;
    public $pembelian;

    // Konstruktor untuk inisialisasi properti/atribut
    public function __construct($tanggal = '', $idBarang = 0, $namaCustomer = '', $telepon = '', $email = '', $pembelian = 0) {
        $this->tanggal = $tanggal; // Inisialisasi atribut tanggal
        $this->idBarang = $idBarang; // Diubah dari idCustomer menjadi idBarang
        $this->namaCustomer = $namaCustomer;
        $this->telepon = $telepon;
        $this->email = $email;
        $this->pembelian = $pembelian;
    }

    // Fungsi untuk menampilkan data pelanggan
    public function tampilkanDataCustomer() {
        return "ID Barang: $this->idBarang, Nama: $this->namaCustomer, Telepon: $this->telepon, Email: $this->email, Jumlah Pembelian: $this->pembelian, Tanggal: $this->tanggal";
    }
}

// Inisialisasi variabel customer dan hasil
$customer = null;
$outputCustomer = "";

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Buat instance Customer dengan data dari form
    $customer = new Customer(
        $_POST['tanggal'], // Ambil tanggal dari form
        intval($_POST['idBarang']), // Diubah dari idCustomer menjadi idBarang
        $_POST['namaCustomer'],
        $_POST['telepon'],
        $_POST['email'],
        intval($_POST['pembelian'])
    );

    // Menampilkan data customer
    $outputCustomer = $customer->tampilkanDataCustomer();
}
?>

<!-- Form input untuk menguji -->
<form method="POST" action="">
    <h3>Data Customer</h3>
    Tanggal: <input type="date" name="tanggal" required><br> <!-- Input tanggal baru -->
    ID Barang: <input type="number" name="idBarang" required><br> <!-- Diubah dari ID Customer menjadi ID Barang -->
    Nama: <input type="text" name="namaCustomer" required><br>
    Telepon: <input type="text" name="telepon" required><br>
    Email: <input type="email" name="email" required><br>
    Jumlah Pembelian: <input type="number" name="pembelian" required><br>
    <input type="submit" value="Simpan Data Customer">
</form>

<!-- Output data customer -->
<?php
if ($outputCustomer !== "") {
    echo "<h3>Informasi Customer</h3>";
    echo $outputCustomer;
}
?>
