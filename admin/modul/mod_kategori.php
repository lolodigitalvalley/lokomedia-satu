<?php
if(count(get_included_files())==1){
  echo '<meta http-equiv="refresh" content="0; url=http://'.$_SERVER['HTTP_HOST'].'">';
  exit('Direct access not permitted.');
}

$act = isset($_GET['act']) ? $_GET['act'] : '';

switch($act){
  // Tampil Kategori
  default:
    echo '<h2>Kategori</h2>
          <input type="button" value="Tambah Kategori" onClick="window.location.href=\'?module=kategori&act=tambahkategori\';">
          <table><thead>
          <tr><th>No</th>
          <th>Nama Kategori</th>
          <th>Keterangan</th>
          <th>Aksi</th></tr></thead>'; 
    $tampil = mysql_query("SELECT * FROM kategori ORDER BY id_kategori DESC");
    $no = 1;
    while ($r = mysql_fetch_array($tampil)){
       echo '<tbody><tr><td width="25">'.$no.'</td>
             <td>'.$r['nama_kategori'].'</td>
             <td>'.$r['keterangan'].'</td>
             <td align="center" width="40"><a href="?module=kategori&act=editkategori&id='.$r['id_kategori'].'">Edit</td></tr>';
      $no++;
    }
    echo '<tbody></table>';
    echo '*) Data pada Kategori tidak bisa dihapus, tapi bisa di non-aktifkan melalui Edit Kategori.';
    break;
  
  // Form Tambah Kategori
  case 'tambahkategori':
    echo '<h2>Tambah Kategori</h2>
          <form method="POST" action="./aksi.php?module=kategori&act=input" />
          <table>
          <tr><td>Nama Kategori</td><td> : <input type="text" name="nama_kategori" /></td></tr>
          <tr><td>Keterangan</td><td> : <textarea name="keterangan"></textarea></td></tr>
          <tr><td colspan="2"><input type="submit" name="submit" value="Simpan" />
                            <input type="button" value="Batal" onClick="self.history.back();" /></td></tr>
          </table></form>';
     break;
  
  // Form Edit Kategori  
  case 'editkategori':
    $edit = mysql_query("SELECT * FROM kategori WHERE id_kategori='".$_GET['id']."'");
    $r = mysql_fetch_array($edit);

    echo '<h2>Edit Kategori</h2>
          <form method="POST" action="./aksi.php?module=kategori&act=update">
          <input type="hidden" name="id" value="'.$r['id_kategori'].'" />
          <table>
          <tr><td>Nama Kategori</td><td> : <input type="text" name="nama_kategori" value="'.$r['nama_kategori'].'" /></td></tr>
          <tr><td>Keterangan</td><td> : <textarea name="keterangan">'.$r['keterangan'].'</textarea></td></tr>';
    if ($r['aktif']=='Y'){
      echo '<tr><td>Aktif</td> <td> : <input type="radio" name="aktif" value="Y" checked="TRUE" />Y  
                                      <input type="radio" name="aktif" value="N" /> N</td></tr>';
    }
    else{
      echo '<tr><td>Aktif</td> <td> : <input type="radio" name="aktif" value="Y" />Y  
                                      <input type="radio" name="aktif" value="N" checked="TRUE" /> N</td></tr>';
    }

    echo '<tr><td colspan="2"><input type="submit" value="Update">
                            <input type="button" value="Batal" onClick="self.history.back();"></td></tr>
          </table></form>';
    break;  
}
?>
