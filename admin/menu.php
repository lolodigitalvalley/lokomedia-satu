<?php
include '../config/koneksi.php';

if ($_SESSION['leveluser']=='admin'){
  $sql=mysql_query("SELECT * FROM modul WHERE aktif = 'Y' ORDER BY urutan");
}
else{
  $sql=mysql_query("SELECT * FROM modul WHERE status='user' AND aktif='Y' ORDER BY urutan"); 
} 
while ($data=mysql_fetch_array($sql)){  
  echo '<li><a href="'.$data['link'].'">&#187; '.$data['nama_modul'].'</a></li>';
}
?>
