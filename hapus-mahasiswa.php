<?php 
include 'config/app.php';

// menerima id mahasiswa yang dipilih pengguna
$id_mahasiswa = (int)$_GET['id_mahasiswa'];

if(delete_mahasiswa($id_mahasiswa) > 0) {
    echo "<script>
            alert('Data Mahasiswa Berhasil Dihapus');
            document.location.href = 'mahasiswa.php';
         </script>";
} else {
    echo "<script>
            alert('Data Mahasiswa tidak berhasil Dihapus');
            document.location.href = 'mahasiswa.php';
        </script>";
}
?>

   
