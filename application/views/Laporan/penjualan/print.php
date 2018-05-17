
<?php
 header("Content-type: application/octet-stream");
 header("Content-Disposition: attachment; filename=LaporanPenjualan.xls");
 header("Pragma: no-cache");
 header("Expires: 0");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Laporan Penjualan</title>
  </head>
  <body>
<h3><center><strong>SKIN CARE</strong></center></h3>
<h5><center>Laporan Penjualan Dari <?= $awal;?> Sampai <?= $akhir;?></center></h5>
<table width="50%"  border="1">
  <thead>
    <tr>
      <th>No Faktur</th>
      <th>Tanggal</th>
      <th>Nama Barang</th>
      <th>Jumlah</th>
      <th>Harga</th>
      <th>Sub Total</th>
      <th>Pegawai Input</th>
      <th>Cara Bayar</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php $totalSemua = 0; ?>
    <?php foreach ($hasil as $h => $head): ?>
      <?php $totalSemua += $head->total;?>
      <?php foreach ($head->detail as $d => $detail): ?>
            <tr>
              <td><?= $head->faktur_penjualan;?></td>
              <td><?= $head->tgl_penjualan;?></td>
              <td><?= $detail->flag_retur == 1 ? $detail->retur->nama_product : $detail->nama_product;?></td>
              <td><?= $detail->flag_retur == 1 ? $detail->retur->qty_retur : $detail->qty;?></td>
              <td><?= $detail->flag_retur == 1 ? $detail->retur->harga_jual : $detail->harga;?></td>
              <td><?= $detail->flag_retur == 1 ? $detail->retur->sub_total : $detail->sub_total;?></td>
              <td><?= $head->nama_pegawai;?></td>
              <td><?= $head->cara_bayar;?></td>
              <td><?= $head->flag_lunas == '1' ? 'Lunas' : 'Belum Lunas';?></td>
            </tr>
      <?php endforeach; ?>
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
