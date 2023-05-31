<?php
// Koneksi ke database
$conn = mysqli_connect("localhost","root","","siakad");

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

echo "<a href='./index.php'>Kembali ke halaman list matakuliah</a>";

// Memproses data yang dikirim dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $kode_matakuliah = $_POST["kode_matakuliah"];
    $deskripsi = $_POST["deskripsi"];

    // Query untuk mengubah data dalam tabel matakuliah
    $sql = "UPDATE matakuliah SET nama='$nama', kode_matakuliah='$kode_matakuliah', deskripsi='$deskripsi' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil diubah.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    $id = $_GET['id'];
    // Query untuk melihat data dalam tabel matakuliah berdasarkan id
    $sql = "SELECT * FROM  matakuliah WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $nama = $row['nama'];
        $kode_matakuliah = $row['kode_matakuliah'];
        $deskripsi = $row['deskripsi'];
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

 // Menutup koneksi
 mysqli_close($conn);
?>

<!-- Form untuk mengubah data matakuliah -->
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label for="nama">Nama:</label>
    <input type="text" name="nama" id="nama" value="<?php echo $nama; ?>" required>
    <br>
    <label for="kode_matakuliah">kode_matakuliah:</label>
    <input type="text" name="kode_matakuliah" id="kode_matakuliah" value="<?php echo $kode_matakuliah; ?>" required>
    <br>
    <label for="deskripsi">deskripsi:</label>
    <input type="text" name="deskripsi" id="deskripsi" value="<?php echo $deskripsi; ?>" required>
    <br>
    <input type="submit" value="Ubah">
</form>