
  <table class="table table-bordered table-striped table-hover" id="table">
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
    <tbody id="hasil">
      <?php foreach ($head as $key => $row): ?>
        <tr>
          <td><?= $row->id_trx_pendaftaran;?></td>
          <td><?= $row->tgl;?></td>
          <td><?= $row->no_rm;?></td>
          <td><?= $row->nama_pasien;?></td>
          <td><?= $row->keterangan;?></td>
          <td>Rp. <?= number_format($row->total->tagihan,0,',','.');?></td>
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
    </script>
