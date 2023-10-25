<?php 
include 'config/app.php';

// menerima id akun yang dipilih pengguna
$id_akun = (int)$_GET['id_akun'];

if(delete_akun($id_akun) > 0) {
    echo "<script>
            alert('Data Akun Berhasil Dihapus');
            document.location.href = 'crud-modal.php';
         </script>";
} else {
    echo "<script>
            alert('Data Akun tidak berhasil Dihapus');
            document.location.href = 'crud-modal.php';
        </script>";
}
?>

   
