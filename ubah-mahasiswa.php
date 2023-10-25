<?php 

$title = 'Ubah Mahasiswa';

include 'layout/header.php';

// cek apakah tombol tambah ditekan
if (isset($_POST['ubah'])) {
    if (update_mahasiswa($_POST) > 0) {
        echo "<script>
            alert('Data Mahasiswa Berhasil Di Ubah')
            document.location.href = 'mahasiswa.php';
             </script>";

    } else {
        echo "<script>
            alert('Data Mahasiswa tidak Berhasil Di Ubah')
            document.location.href = 'mahasiswa.php';
            </script>";
    }
}

// ambil id mahasiswa dari url
$id_mahasiswa = (int)$_GET['id_mahasiswa'];

$mahasiswa = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];

?>

    <div class="container mt-5">
      <h2>Ubah Data Mahasiswa</h2>
      <hr>
      <!-- Form -->
      <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id_mahasiswa" value="<?= $mahasiswa['id_mahasiswa']; ?>">
      <input type="hidden" name="fotoLama" value="<?= $mahasiswa['foto']; ?>">

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" id="nama" name="nama"  placeholder="Masukan Nama Mahasiswa ..." 
            required value="<?= $mahasiswa['nama']; ?>">
        </div>

        <div class="row">
            <div class="mb-3 col-6">
                <label for="nama" class="form-label">Program Studi</label>
                <select name="prodi" id="prodi" class="form-control" required>
                    <?php $prodi = $mahasiswa['prodi']; ?>
                    <option value="Teknik Informatika"<?= $prodi == 'Teknik Informatika' ? 'selected' : null ?>>Teknik Informatika</option>
                    <option value="Teknik Industri"<?= $prodi == 'Teknik Industri' ? 'selected' : null ?>>Teknik Industri</option>
                    <option value="Teknik Mesin"<?= $prodi == 'Teknik Mesin' ? 'selected' : null ?>>Teknik Mesin</option>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="jk" class="form-label">Jenis Kelamin</label>
                <select name="jk" id="jk" class="form-control" required>
                    <?php $jk = $mahasiswa['jk']; ?>
                    <option value="Laki-Laki"<?= $jk == 'Laki-Laki' ? 'selected' : null ?>>Laki-Laki</option>
                    <option value="Perempuan"<?= $jk == 'Perempuan' ? 'selected' : null ?>>Perempuan</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="number" class="form-control" id="telepon" name="telepon"  placeholder="Masukan Nomor Telepon ..." required value="<?= $mahasiswa['telepon']; ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email"  placeholder="Masukan Email ..." 
            required value="<?= $mahasiswa['email']; ?>">
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto"  placeholder="Masukan Foto ..."
            onchange="previewImg()">
          
            <img src="assets/img/<?= $mahasiswa['foto']; ?>" alt="foto"  clas="img-thumbnail img-preview mt-2" width="100px">
        </div>

        <button type="submit" name="ubah" class="btn btn-primary" style="float: right;">Ubah</button>

      </form> 
      <!-- End Form -->
    </div>

    <script>
        function previewImg(){
            const foto = document.querySelector('#foto');
            const imgPreview = document.querySelector('.img-preview');

            const fileFoto = new FileReader();
            fileFoto.readAsDataURL(foto.files[0]);

            fileFoto.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>


<?php include 'layout/footer.php'; ?>
