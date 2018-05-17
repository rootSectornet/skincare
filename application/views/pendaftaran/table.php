 <link rel="stylesheet" href="<?= base_url();?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/selectize/css/selectize.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/selectize/css/selectize.bootstrap3.css">
<script src="<?php echo base_url();?>assets/plugins/selectize/js/selectize.min.js"></script>
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
              <h2>Data Pendaftaran
                <a href="<?php echo base_url() ?>pendaftaran/pendaftaran/create" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Tambah Pasien"><i class="fa fa-plus"></i> Tambah</a>
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
                    <th>Kode Pendaftaran</th>
                    <th>No RM</th>
                    <th>Nama Pasien</th>
                    <th>No Telp</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="hasil">
                  <?php foreach ($pendaftaran as $key => $row): ?>
                    <tr>
                      <td><?= $row->id_trx_pendaftaran;?></td>
                      <td><?= $row->no_rm;?></td>
                      <td><?= $row->nama_pasien;?></td>
                      <td><?= $row->no_telp;?></td>
                      <td><?= $row->keterangan;?></td>
                      <td>
                        <a href="<?= base_url();?>pendaftaran/pendaftaran/detail/<?= $row->id_trx_pendaftaran;?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Detail Pendaftaran <?= $row->nama_pasien;?>"><i class="fa fa-eye"></i></a>
                        <a href="<?= base_url();?>pasien/pasien/detail/<?= $row->id_mst_pasien;?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Detail Pasien <?= $row->nama_pasien;?>"><i class="fa fa-eye"></i></a>
                        <a href="<?= base_url();?>pendaftaran/pendaftaran/update/<?= $row->id_trx_pendaftaran;?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit <?= $row->nama_pasien;?>"><i class="fa fa-pencil"></i></a>
                        <a href="<?= base_url();?>pendaftaran/pendaftaran/delete/<?= $row->id_trx_pendaftaran;?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus <?= $row->nama_pasien;?>" onclick="return ConfirmDialog()"> <i class="fa fa-trash"></i></a>
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
    $('#tgl_filter').datetimepicker({
        format:'Y-m-d',
        mask:false,
        timepicker:false,
        minDate: '-2015/01/01'
    });
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  });

  $('#group').selectize({
        create : false,
        plugins : ['restore_on_backspace'],
        sortField: 'text'
    });
  function ConfirmDialog() {
  var x=confirm("Apakah anda yakin ingin menghapus data ini?")
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
            url: '<?php echo base_url(); ?>pendaftaran/pendaftaran/list_pendaftaran',
            data: 'tgl=' + tgl,
            success: function(response) {
                $('#hasil').html(response);
            }
        });
  });
});

</script>
