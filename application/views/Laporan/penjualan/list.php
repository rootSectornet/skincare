

  <table class="table table-bordered table-striped table-hover" id="table">
    <thead>
      <tr>
        <th>No Faktur</th>
        <th>Tanggal</th>
        <th>Cara Bayar</th>
        <th>PPN</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody id="hasil">
      <?php if (count($hasil) > 0): ?>
        <?php foreach ($hasil as $key => $row): ?>
          <tr>
            <td><?= $row->faktur_penjualan;?></td>
            <td><?= $row->tgl_penjualan;?></td>
            <td><?= $row->cara_bayar;?></td>
            <td><?= $row->ppn;?></td>
            <td>Rp. <?= number_format($row->total,0,',','.');?></td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>  
<script type="text/javascript">
$(function () {
  $('#table').DataTable({
    'paging'      : true,
    'lengthChange': true,
    'searching'   : true,
    'ordering'    : true,
    'info'        : true,
    'autoWidth'   : true
  })
});
</script>
