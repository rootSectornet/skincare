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
              <h2>Data Pasien
                <a href="<?php echo base_url() ?>pasien/pasien/create" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Tambah Pasien"><i class="fa fa-plus"></i> Tambah</a> 
              </h2>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <label class="control-label"></label>
                </div>
              </div>
              <table class="table table-bordered table-striped table-hover" id="table">
                <thead>
                  <tr>
                    <th>No RM</th>
                    <th>Nama Pasien</th>
                    <th>Tgl Lahir</th>
                    <th>No Telp</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="hasil">
                  <?php foreach ($pasien as $key => $row): ?>
                    <tr>
                      <td><?= $row->no_rm;?></td>
                      <td><?= $row->nama_pasien;?></td>
                      <td><?= $row->tgl_lahir;?></td>
                      <td><?= $row->no_telp;?></td>
                      <td><?= $row->gender == 1 ? 'Laki - Laki' : 'Perempuan' ;?></td>
                      <td><?= $row->alamat;?> | <?= $row->kel;?> | <?= $row->kec;?> | <?= $row->kab;?> - <?= $row->prov;?></td>
                      <td>
                        <a href="<?= base_url();?>pasien/pasien/update/<?= $row->id_mst_pasien;?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit <?= $row->nama_pasien;?>"><i class="fa fa-pencil"></i></a>
                        <a href="<?= base_url();?>pasien/pasien/delete/<?= $row->id_mst_pasien;?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus <?= $row->nama_pasien;?>" onclick="return ConfirmDialog()"> <i class="fa fa-trash"></i></a>
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

</script>