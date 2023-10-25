<?php 
$title = 'Daftar Mahasiswa';

include 'layout/header.php';

// menampilkan data mahasiswa
$data_mahasiswa = select("SELECT * FROM mahasiswa ORDER BY id_mahasiswa DESC");
?>

<div class="container mt-5">
      <h2><i class="fa fa-mortar-board"></i> Data Mahasiswa</h2>
      <hr>
      <a href="tambah-mahasiswa.php" class="btn btn-primary mb-1"><i class="fa fa-user-plus"></i> Tambah Mahasiswa</a>
      <!-- Table -->
        <table class="table table-bordered table-striped mt-3" id="table">
          <thead>
              <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Prodi</th>
                  <th>Jenis Kelamin</th>
                  <th>Telepon</th>
                  <th>Aksi</th>
              </tr>
          </thead>
          <!-- table body -->
          <tbody>
            <?php $no = 1; ?>
            <?php foreach($data_mahasiswa as $mahasiswa) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $mahasiswa['nama']; ?></td>
                    <td><?= $mahasiswa['prodi']; ?></td>
                    <td><?= $mahasiswa['jk']; ?></td>
                    <td><?= $mahasiswa['telepon']; ?></td>
                    <td class="text-center" with="15%">
                        <a href="detail-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i> Detail</a>
                        <a href="ubah-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square"></i> Ubah</a>
                        <a href="hapus-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" 
                        class="btn btn-danger btn-sm" onclick="return confirm('Yakin Data Mahasiswa akan Di Hapus. ?')"><i class="fa fa-trash"></i> Hapus</a>
                    </td>
                </tr>

            <?php endforeach; ?>
          </tbody>
          <!-- End table body -->
        </table>
      <!-- End Table -->
    </div>

<?php include 'layout/footer.php'; ?>