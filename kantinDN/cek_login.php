<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$filter = mysqli_query($conn, "select * from user where username='$username' and password='$password' ");
$cek = mysqli_num_rows($filter);
$data = mysqli_fetch_array($filter);

if ($cek > 0) {

  if ($data['level'] == 'admin') {


    $_SESSION['username'] = $data['username'];
    $_SESSION['level'] = 'admin';
    $_SESSION['nip'] = $data['nip'];


    header("location:admin/");
  } else if ($data['level'] == 'pegawai') {

    $_SESSION['username'] = $data['username'];
    $_SESSION['level'] = 'pegawai';
    $_SESSION['nip'] = $data['nip'];
    $_SESSION['nama_lengkap'] = $data['nama_lengkap'];

    header("location:user/");
  } else {
    var_dump($data);
  }
} else {
  header("location:index.php?alert=gagal");
}
