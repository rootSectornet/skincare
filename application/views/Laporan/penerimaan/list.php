
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
      <?php if (count($head) > 0){ ?>
              <?php foreach ($head as $key => $row): ?>
                  <tr>
                    <td><?= $row->faktur_penerimaan;?></td>
                    <td><?= $row->tgl_penerimaan;?></td>
                    <td><?= $row->cara_bayar;?></td>
                    <td><?= $row->ppn;?></td>
                    <td>Rp. <?= number_format($row->total,0,',','.');?></td>
                  </tr>
              <?php endforeach; ?>
      <?php }else{ ?>
        <tr>
          <td colspan="5" align="center">Tidak Ada Data !</td>
        </tr>
      <?php } ?>
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
