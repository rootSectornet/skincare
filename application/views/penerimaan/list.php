
  <?php foreach ($penerimaan as $key => $row): ?>
    <tr>
      <td><?= $row->faktur_penerimaan;?></td>
      <td><?= $row->nama_suplier;?></td>
      <td><?= $row->tgl_penerimaan;?></td>
      <td><?= $row->cara_bayar;?></td>
      <td><?= ($row->ppn == 1) ? $row->total * 10 / 100 : '0';?></td>
      <td><?= $row->total;?></td>
      <td>
        <?php if ($row->flag_verif == 0): ?>
            <?= BtnVerif('gudang/penerimaan/verif/'.$row->faktur_penerimaan, 'Penerimaan '.$row->faktur_penerimaan);?>
            <?= BtnEdit('gudang/penerimaan/edit/'.$row->faktur_penerimaan, $row->faktur_penerimaan);?>
            <?= BtnDelete('gudang/penerimaan/delete/'.$row->faktur_penerimaan, $row->faktur_penerimaan);?>
        <?php endif; ?>
        <?php if ($row->flag_verif == 1): ?>
              <?= BtnunVerif('gudang/penerimaan/unverif/'.$row->faktur_penerimaan, 'Penerimaan '.$row->faktur_penerimaan);?>
              <?= BtnPrint('gudang/penerimaan/print/'.$row->faktur_penerimaan,'Faktur Penerimaan '.$row->faktur_penerimaan);?>
        <?php endif; ?>
        <?= BtnView('gudang/penerimaan/detail/'.$row->faktur_penerimaan, $row->faktur_penerimaan);?>
      </td>
    </tr>
  <?php endforeach ?>
<script type="text/javascript">
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
function ConfirmVerif() {
var x=confirm("Apakah anda yakin ingin Memverifikasi data ini?")
if (x) {
  return true;
} else {
  return false;
}
}
</script>
