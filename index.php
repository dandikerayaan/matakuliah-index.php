<?php
// Koneksi ke database
$conn = mysqli_connect("localhost","root","","siakad");

//ambil data dari tabel matakuliah
$result = mysqli_query($conn, "SELECT * FROM matakuliah");

echo"<a href='add.php'>tambah mata_kuliah</a>";

if (mysqli_num_rows($result) > 0) {
    // Menampilkan data dalam bentuk tabel
    echo "<table>";
    echo "<tr><th>ID</th><th>Nama</th><th>kode_matakuliah</th><th>deskripsi</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["nama"]."</td>";
        echo "<td>".$row["kode_matakuliah"]."</td>";
        echo "<td>".$row["deskripsi"]."</td>";
        echo "<td><a href='/siakad/matakuliah/edit.php?id=".$row["id"]."'>Edit</a> | <a href='/siakad/matakuliah/delete.php?id=".$row["id"]."'>Hapus</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data.";
}

// Menutup koneksi
mysqli_close($conn);

?>