<?php

// function menampilkan
function select($query){
  // panggil koneksi database
  global $db;

  $result = mysqli_query($db, $query);
  $rows = [];

  while ($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
  }

  return $rows;
}

// function menambahkan barang
function create_barang($post)
{
  global $db;
  $nama       = strip_tags($post['nama']);
  $jumlah     = strip_tags($post['jumlah']);
  $harga      = strip_tags($post['harga']);

  // query tambah data
  $query = "INSERT INTO barang VALUES(null, '$nama', '$jumlah', '$harga', CURRENT_TIMESTAMP())";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}

// function mengubah data barang
function update_barang($post)
{
  global $db;

  $id_barang  = strip_tags($post['id_barang']);
  $nama       = strip_tags($post['nama']);
  $jumlah     = strip_tags($post['jumlah']);
  $harga      = strip_tags($post['harga']);

  // query ubah data
  $query = "UPDATE barang SET nama = '$nama', jumlah = '$jumlah', harga = '$harga' WHERE id_barang = 
  $id_barang";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}

// function menghapus data barang
function delete_barang($id_barang)
{
  global $db;

  // query hapus data barang
  $query = "DELETE FROM barang WHERE id_barang = $id_barang";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}

// function menambahkan data mahasiwa
function create_mahasiswa($post)
{
  global $db;

  $nama     = strip_tags($post['nama']);
  $prodi    = strip_tags($post['prodi']);
  $jk       = strip_tags($post['jk']);
  $telepon  = strip_tags($post['telepon']);
  $email    = strip_tags($post['email']);
  $foto     = upload_file();

  // check upload foto
  if (!$foto) {
    return false;
  }

  // query tambah data
  $query = "INSERT INTO mahasiswa VALUES(null, '$nama', '$prodi', '$jk', '$telepon', '$email', '$foto')";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}

// function mengubah data mahasiswa
function update_mahasiswa($post)
{
  global $db;

  $id_mahasiswa   = strip_tags($post['id_mahasiswa']);
  $nama           = strip_tags($post['nama']);
  $jk             = strip_tags($post['jk']);
  $telepon        = strip_tags($post['telepon']);
  $email          = strip_tags($post['email']);
  $fotoLama       = strip_tags($post['fotoLama']);

  
  // check upload foto baru atau tidak
  if ($_FILES['foto']['error'] == 4) {
    $foto = $fotoLama;
  } else {
    $foto = upload_file();
  }

  // query ubah data
  $query = "UPDATE mahasiswa SET nama = '$nama', jk = '$jk', telepon = '$telepon', email = '$email', foto = '$foto' WHERE id_mahasiswa = 
  $id_mahasiswa";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}


// function upload file
function upload_file()
{
  $namaFile   = $_FILES['foto']['name'];
  $ukuranFile = $_FILES['foto']['size'];
  $error      = $_FILES['foto']['error'];
  $tmpName    = $_FILES['foto']['tmp_name'];

  // check file yang diupload
  $extensifileValid = ['jpg', 'jpeg', 'png'];
  $extensifile      = explode('.', $namaFile);
  $extensifile      = strtolower(end($extensifile));

  // cek format/extensi file
  if(!in_array($extensifile, $extensifileValid)) {
    // pesan gagal
    echo "<script>
          alert('Format File Tidak Valid');
          document.location.href = 'tambah-mahasiswa.php';
          </script>";
    die();
  }

  // cek ukuran file 2 MB
  if($ukuranFile > 2048000){
    // pesan gagal
    echo "<script>
          alert('Ukuran File Max 2 MB');
          document.location.href = 'tambah-mahasiswa.php';
          </script>";
    die();

  }
  // generate nama file baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.'; 
  $namaFileBaru .= $extensifile;

  // pindahkan ke local folder
  move_uploaded_file($tmpName, 'assets/img/'. $namaFileBaru);
  return $namaFileBaru;
}

// function menghapus data mahasiswa
function delete_mahasiswa($id_mahasiswa)
{
  global $db;

  // ambil foto sesuai yang dipilih
  $foto = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];
  unlink("assets/img/". $foto['foto']);

  // query hapus data barang
  $query = "DELETE FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}

// function tambah akun
function create_akun($post)
{
  global $db;

  $nama           = strip_tags($post['nama']);
  $username       = strip_tags($post['username']);
  $email          = strip_tags($post['email']);
  $password       = strip_tags($post['password']);
  $level          = strip_tags($post['level']);
 
  // enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // query tambah data akun
  $query = "INSERT INTO akun VALUES(null, '$nama', '$username', '$email', '$password', '$level')";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}

// function ubah akun
function update_akun($post)
{
  global $db;

  $id_akun        = strip_tags($post['id_akun']);  
  $nama           = strip_tags($post['nama']);
  $username       = strip_tags($post['username']);
  $email          = strip_tags($post['email']);
  $password       = strip_tags($post['password']);
  $level          = strip_tags($post['level']);
 
  // enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // query ubah data akun
  $query = "UPDATE akun SET nama = '$nama', username = '$username', email = '$email', 
  password = '$password', level = '$level' WHERE id_akun = $id_akun";

  mysqli_query($db, $query);
  
  return mysqli_affected_rows($db);
}

// function menghapus data akun
function delete_akun($id_akun)
{
  global $db;

  // query hapus data akun
  $query = "DELETE FROM akun WHERE id_akun = $id_akun";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}



?>