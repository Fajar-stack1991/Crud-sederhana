<?php 

$title = 'Ubah Barang';

include 'layout/header.php';

// mengambil id_barang dari url
$id_barang = (int)$_GET['id_barang'];

$barang = select("SELECT * FROM barang WHERE id_barang = $id_barang")[0];

// cek apakah tombol tambah ditekan
if (isset($_POST['ubah'])) {
    if (update_barang($_POST) > 0) {
        echo "<script>
            alert('Data Barang Berhasil Diubah')
            document.location.href = 'index.php';
             </script>";

    } else {
        echo "<script>
            alert('Data Barang tidak Berhasil Diubah')
            document.location.href = 'index.php';
            </script>";
    }
}

?>

    <div class="container mt-5">
      <h2>Edit Barang</h2>
      <hr>
      <!-- Form -->
      <form action="" method="post">

        <input type="hidden" name="id_barang" value="<?= $barang['id_barang']; ?>">

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $barang['nama']; ?>"  placeholder="Masukan Nama Barang ..." required>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $barang['jumlah']; ?>"  placeholder="Masukan Jumlah Barang ..." required>
        </div>

        
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="<?= $barang['harga']; ?>"   placeholder="Masukan Harga Barang ..." required>
        </div>

        <button type="submit" name="ubah" class="btn btn-primary" style="float: right;">Ubah</button>

      </form> 
      <!-- End Form -->
    </div>

<?php include 'layout/footer.php'; ?>

