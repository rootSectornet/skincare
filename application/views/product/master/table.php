 <link rel="stylesheet" href="<?= base_url();?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12 col-md-12">
          <div class="box">
            <div class="box-header">
              <?php echo $this->session->flashdata('pesan_eror'); ?>
              <h2>Data Katalog Obat <?= BtnCreate('gudang/product/create','Katalog Obat');?>
              </h2>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-striped table-hover" id="table">
                <thead>
                  <tr>
                    <th>NO </th>
                    <th>Nama Obat</th>
                    <th>Stock</th>
                    <th>Harga Jual</th>
                    <th>Harga Beli</th>
                    <th>EXP</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($product as $key => $row): ?>
                    <tr>
                      <td><?= $key + 1;?></td>
                      <td><?= $row->nama_product;?></td>
                      <td><?= $row->qty;?></td>
                      <td><?= $row->harga_jual;?></td>
                      <td><?= $row->harga_beli;?></td>
                      <td><?= $row->exp;?></td>
                      <td>
                        <?php if ($row->flag_aktif == 0): ?>
                          <?= BtnVerif('gudang/product/verifKatalog/'.$row->id_product,$row->nama_product);?>
                        <?php endif ?>
                        <?= BtnEdit('gudang/product/edit/'.$row->id_product,$row->nama_product);?>
                        <?= BtnDelete('gudang/product/delete/'.$row->id_product,$row->nama_product);?>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
<script src="<?= base_url();?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url();?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
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

  function ConfirmDialog() {
  var x=confirm("Apakah anda yakin ingin menghapus data ini?")
  if (x) {
    return true;
  } else {
    return false;
  }
}
function ConfirmVerif() {
var x=confirm("Apakah anda yakin ingin Memverifikasi data ini?")
if (x) {
  return true;
} else {
  return false;
}
}
</script>
