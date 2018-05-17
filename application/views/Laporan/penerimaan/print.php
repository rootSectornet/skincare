
<?php
 header("Content-type: application/octet-stream");
 header("Content-Disposition: attachment; filename=LaporanPenerimaan.xls");
 header("Pragma: no-cache");
 header("Expires: 0");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  <h3><center><strong>SKIN CARE</strong></center></h3>
  <h5><center>Laporan Penerimaan Dari <?= $awal;?> Sampai <?= $akhir;?></center></h5>
  <?php if (count($suplier) > 0): ?>
    <h5><center>Supplier : <?= $suplier[0]->nama_suplier;?></center></h5>
  <?php endif; ?>
  <table width="50%" border="1">
      <thead>
        <tr>
          <th>No Faktur</th>
          <th>Tanggal</th>
          <th>Nama Barang</th>
          <th>Jumlah</th>
          <th>Harga Beli</th>
          <th>Harga Jual</th>
          <th>Sub Total</th>
          <th>Pegawai Input</th>
          <th>Cara Bayar</th>
        </tr>
      </thead>
      <tbody>
        <?php $totalSemua = 0; ?>
        <?php foreach ($head as $h => $hRow): ?>
          <?php $totalSemua += $hRow->total; ?>
          <?php foreach ($hRow->detail as $d => $dRow): ?>
              <tr>
                <td><?= $hRow->faktur_penerimaan;?></td>
                <td><?= $hRow->tgl_penerimaan;?></td>
                <td><?= $dRow->nama_product;?></td>
                <td><?= $dRow->qty;?></td>
                <td><?= $dRow->harga;?></td>
                <td><?= $dRow->harga_jual;?></td>
                <td><?= $dRow->sub_total;?></td>
                <td><?= $hRow->nama_pegawai;?></td>
                <td><?= $hRow->cara_bayar;?></td>
              </tr>
          <?php endforeach; ?>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="6"><strong>TOTAL : </strong></td>
          <td><?= $totalSemua;?></td>
        </tr>
      </tfoot>
  </table>
  </body>
</html>
