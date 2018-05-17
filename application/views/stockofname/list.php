
<table class="table table-bordered table-striped table-hover" id="table">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Product</th>
      <th>Tanggal</th>
      <th>QTY</th>
      <th>QTY Rusak</th>
      <th>QTY EXP</th>
      <th>QTY Terjual</th>
      <th>QTY Fisik</th>
      <th>Selisih</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody id="hasil">
    <?php foreach ($list as $key => $row): ?>
       <tr>
         <td><?= $key + 1;?></td>
         <td><?= $row->nama_product;?></td>
         <td><?= $row->tgl_stockOfName;?></td>
         <td><?= $row->qty;?></td>
         <td><?= $row->qty_rusak;?></td>
         <td><?= $row->qty_exp;?></td>
         <td><?= $row->qty_terjual;?></td>
         <td><?= $row->qty_baru;?></td>
         <td><?= $row->qty_baru - $row->qty;?></td>
         <td>
           <?php
               if ($row->flag_verif == 0) {
                 echo BtnVerif('gudang/StockOfname/verif/'.$row->id_stockOfName, 'Stock Of Name');
                 echo  BtnDelete('gudang/StockOfname/delete/'.$row->id_stockOfName, 'Stock Of Name');
               }
            ?>
         </td>
       </tr>
    <?php endforeach; ?>
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

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

  $('#tgl_filter').datetimepicker({
      format:'Y-m-d',
      mask:false,
      timepicker:false,
      minDate: '-2015/01/01'
  });
</script>
