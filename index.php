<?php 
// membatasi sebelum login
// if (!isset($_SESSION["login"])) {
//   echo "<script>
//         alert('login terlebih dahulu');
//         document.location.href = 'login.php';
//         </script>";
//   exit;
// }

$title = 'Daftar Barang';

include 'layout/header.php';

// data barang
$data_barang = select("SELECT * FROM barang ORDER BY id_barang DESC");

?>

    <div class="container mt-5">
      <h2><i class="fa fa-list-ul"></i> Data Barang</h2>
      <hr>
      <a href="tambah_barang.php" class="btn btn-primary mb-1"><i class="fa fa-plus-square"></i> Tambah Barang</a>
      <!-- Table -->
        <table class="table table-bordered table-striped mt-3" id="table">
          <thead>
              <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Jumlah</th>
                  <th>Harga</th>
                  <th>Tanggal</th>
                  <th>Aksi</th>
              </tr>
          </thead>
          <!-- table body -->
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data_barang as $barang) :?>
              <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $barang['nama']; ?></td>
                  <td><?= $barang['jumlah']; ?></td>
                  <td>Rp. <?= number_format($barang['harga'],0,',','.'); ?></td>
                  <td><?= date('d/m/y | H:i:s', strtotime($barang['tanggal'])); ?></td>
                  <td with="10%" class="text-center">
                    <a href="ubah_barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-primary"><i class="fa fa-pencil-square"></i> Ubah</a>
                    <a href="hapus_barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-danger" 
                    onclick="return confirm('Yakin data barang di hapus. ?'); "><i class="fa fa-trash"></i> Hapus</a>
                  </td>
              </tr>
              <?php endforeach; ?>
          </tbody>
          <!-- End table body -->
        </table>
      <!-- End Table -->
    </div>

<?php include 'layout/footer.php'; ?>

