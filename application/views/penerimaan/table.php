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
              <h2>Data Penerimaan Obat <?= BtnCreate('gudang/penerimaan/create','Penerimaan');?>
              </h2>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-6 col-md-offset-3">
                  <form class="form-horizontal">
                    <div class="col-md-">
                      <label class="control-label">Tanggal : </label>
                    </div>
                    <div class="col-md-10">
                      <div class="input-group input-group-sm">
                        <input type="text" class="form-control" id="tgl_filter">
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-info btn-flat" id="filter"><i class="fa fa-search"></i></button>
                            </span>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <table class="table table-bordered table-striped table-hover" id="table">
                <thead>
                  <tr>
                    <th>Faktur</th>
                    <th>Nama Supplier</th>
                    <th>Tanggal</th>
                    <th>Cara Bayar</th>
                    <th>PPN</th>
                    <th>Total</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="hasil">
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

    $('#tgl_filter').datetimepicker({
        format:'Y-m-d',
        mask:false,
        timepicker:false,
        minDate: '-2015/01/01'
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
$(document).ready(function(){
  $('#filter').click(function(){
      let tgl = $('#tgl_filter').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>gudang/penerimaan/list_penerimaan',
            data: 'tgl=' + tgl,
            success: function(response) {
                $('#hasil').html(response);
            }
        });
  });
});
</script>
