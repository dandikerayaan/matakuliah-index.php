<?php
// Koneksi ke database
$conn = mysqli_connect("localhost","root","","siakad");

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

echo "<a href='./index.php'>Kembali ke halaman list matakuliah</a>";

// Memproses data yang dikirim dari form
$id = $_GET["id"];

// Query untuk menghapus data dari tabel matakuliah
$sql = "DELETE FROM matakuliah WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    echo "Data berhasil dihapus.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Menutup koneksi
mysqli_close($conn);
?>