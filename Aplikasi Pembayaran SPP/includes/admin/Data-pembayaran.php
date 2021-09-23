<h2>Data Pembayaran</h2>
<a href="?p=tambah-pembayaran">Tambah Data</a>
<br><br>

<?php
    if(isset($_SESSION['pesan'])) {
        echo $_SESSION['pesan'];
        unset($_SESSION['pesan']);
        echo '<br/>';
    }
?>

<table border="1">
    <tr>
        <th>No.</th>
        <th>ID Pembayaran</th>
        <th>ID Petugas</th>
        <th>NISN</th>
        <th>Tanggal Bayar</th>
        <th>Bulan Bayar</th>
        <th>Tahun Bayar</th>
        <th>ID SPP</th>
        <th>Jumlah Bayar</th>
        <th>Aksi</th>
 </tr>
  
  <!-- tampilkan data pembayaran -->
<?php
    $no = 1;
    $pembayaran = $admin->getDataPembayaran();
    while($dt_pembayaran = mysqli_fetch_assoc($pembayaran)) {
?>

   <tr>
        <td><?= $no++; ?></td>
        <td><?= $dt_pembayaran['id_pembayaran']; ?></td>
        <td><?= $dt_pembayaran['id_petugas']; ?></td>
        <td><?= $dt_pembayaran['nisn']; ?></td>
        <td><?= $dt_pembayaran['tgl_bayar']; ?></td>
        <td><?= $dt_pembayaran['bulan_bayar']; ?></td>
        <td><?= $dt_pembayaran['tahun_bayar']; ?></td>
        <td><?= $dt_pembayaran['id_spp']; ?></td>
        <td><?= $dt_pembayaran['jumlah_bayar']; ?></td>
        <td><a href="?p=ubah-pembayaran&id_pembayaran=<?= $dt_pembayaran['id_pembayaran']; ?>">Ubah</a>|<a href="?p=hapus-pembayaran&id_pembayaran=<?= $dt_pembayaran['id_pembayaran']; ?>" onclick="return confirm('Yakin hapus data ini?')">Hapus</a></td>
   </tr>

  <?php
  }
  ?>

</table>