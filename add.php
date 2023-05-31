<?php
// Koneksi ke database
$conn = mysqli_connect("localhost","root","","siakad");

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Memproses data yang dikirim dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $kode_matakuliah = $_POST["kode_matakuliah"];
    $deskripsi = $_POST["deskripsi"];
    
    // Query untuk menambahkan data ke tabel mahasiswa
    $sql = "INSERT INTO matakuliah (nama, kode_matakuliah, deskripsi) VALUES ('$nama', '$kode_matakuliah', '$deskripsi')";

    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    // Menutup koneksi
    mysqli_close($conn);
}
?>
<a href="index.php">Kembali ke halaman list matakuliah</a>
<!-- Form untuk menambahkan data matakuliah -->
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <label for="nama">Nama:</label>
    <input type="text" name="nama" id="nama" required>
    <br>
    <label for="kode_matakuliah">kode_matakuliah:</label>
    <input type="text" name="kode_matakuliah" id="kode_matakuliah" required>
    <br>
    <label for="deskripsi">deskripsi:</label>
    <input type="text" name="deskripsi" id="deskripsi" required>
    <br>
    <input type="submit" value="Tambahkan">
</form>