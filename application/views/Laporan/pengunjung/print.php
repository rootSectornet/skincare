
<?php
 header("Content-type: application/octet-stream");
 header("Content-Disposition: attachment; filename=LaporanPengunjungn.xls");
 header("Pragma: no-cache");
 header("Expires: 0");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Laporan Pengunjung</title>
  </head>
  <body>
<h3><center><strong>SKIN CARE</strong></center></h3>
<h5><center>Laporan Pengunjung Dari <?= $awal;?> Sampai <?= $akhir;?></center></h5>
<table width="50%"  border="1">
  <thead>
    <tr>
      <th>Kode Pendaftaran</th>
      <th>Tanggal Daftar</th>
      <th>No RM</th>
      <th>Nama Pasien</th>
      <th>Keterangan</th>
      <th>Tagihan</th>
    </tr>
  </thead>
  <tbody>
    <?php $totalSemua = 0; ?>
    <?php foreach ($head as $key => $row): ?>
      <?php $totalSemua += $row->total->tagihan; ?>
      <tr>
        <td><?= $row->id_trx_pendaftaran;?></td>
        <td><?= $row->tgl;?></td>
        <td><?= $row->no_rm;?></td>
        <td><?= $row->nama_pasien;?></td>
        <td><?= $row->keterangan;?></td>
        <td><?= $row->total->tagihan;?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
  <tfoot>
    <tr>
      <th colspan="5" align="left">TOTAL</th>
      <th><?= $totalSemua;?></th>
    </tr>
  </tfoot>
</table>
  </body>
</html>
