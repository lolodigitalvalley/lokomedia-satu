<?php
  session_start();
  session_destroy();
  echo "<script>alert('Anda telah keluar dari halaman administrator'); window.location = '../'</script>";
  

// Apabila setelah logout langsung menuju halaman utama website, aktifkan baris di bawah ini:

//  header('location:http://www.alamatwebsite.com');
?>
