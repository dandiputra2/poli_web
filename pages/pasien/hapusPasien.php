<?php
include("../../config/koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $id = $_POST["id"];

    // Hapus data pasien
    $query = "DELETE FROM pasien WHERE id = $id";

    if (mysqli_query($mysqli, $query)) {
        echo '<script>';
        echo 'alert("Data pasien berhasil dihapus!");';
        echo 'window.location.href = "../../tampilPasien.php";';
        echo '</script>';
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
}

// Tutup koneksi
mysqli_close($mysqli);
?>
