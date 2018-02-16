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
              <h2>Data Group Pegawai
                <a href="<?php echo base_url() ?>sdm/group/create" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Tambah Group"><i class="fa fa-plus"></i> Tambah</a> 
              </h2>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-striped table-hover" id="table">
                <thead>
                  <tr>
                    <th>NO </th>
                    <th>Nama Gruop</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($group as $key => $row): ?>
                    <tr>
                      <td><?= $key + 1;?></td>
                      <td><?= $row->nama_group;?></td>
                      <td>
                        <a href="<?= base_url();?>sdm/group/update/<?= $row->id_mst_group;?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit <?= $row->nama_group;?>"><i class="fa fa-pencil"></i> Edit</a>
                        <a href="<?= base_url();?>sdm/group/delete/<?= $row->id_mst_group;?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Edit <?= $row->nama_group;?>" onclick="return ConfirmDialog()"> <i class="fa fa-trash"></i> Delete</a>
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
</script>