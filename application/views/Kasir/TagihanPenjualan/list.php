
  <?php foreach ($TagihanPenjualan as $key => $row): ?>
     <tr>
       <td><?= $row->id_tagihan;?></td>
       <td><?= $row->tgl_penjualan;?></td>
       <td><?= $row->cara_bayar;?></td>
       <td><?= ($row->ppn == 1) ? $row->total * 10 / 100 : '0';?></td>
       <?php if ($row->ppn == 1) {
         $row->total = $row->total + ($row->total * 10 / 100);
       } ?>
       <td>Rp. <?= number_format($row->total,0,',','.');?></td>
       <td>
         <?= BtnView('Kasir/Tpenjualan/detailTagihan/'.$row->id_billing,'Pembayaran Detail');?>
         <?= BtnPrint('gudang/penjualan/print/'.$row->faktur_penjualan, $row->faktur_penjualan);?>
       </td>
     </tr>
  <?php endforeach; ?>


  <script type="text/javascript">

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
  </script>
