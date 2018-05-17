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
              <h2>Data User Login Pegawai
                <a href="<?php echo base_url() ?>sdm/pegawai/create_user" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Tambah User Login Pegawai"><i class="fa fa-plus"></i> Tambah</a>
              </h2>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-striped table-hover" id="table">
                <thead>
                  <tr>
                    <th>NO </th>
                    <th>Nama Pegawai</th>
                    <th>UserName</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($user as $key => $row): ?>
                    <tr>
                      <td><?= $key + 1;?></td>
                      <td><?= $row->nama_pegawai;?></td>
                      <td><?= $row->username;?></td>
                      <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-nama="<?= $row->nama_pegawai;?>" data-id="<?= $row->id_user;?>" class="btn btn-primary" data-tooltip="tooltip" data-placement="top" title="Ganti Password <?= $row->nama_pegawai;?>"><i class="fa fa-cogs"></i> Change</button>
                        <a href="<?= base_url();?>sdm/pegawai/update_user/<?= $row->id_user;?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit <?= $row->nama_pegawai;?>"><i class="fa fa-pencil"></i> Edit</a>
                        <a href="<?= base_url();?>sdm/pegawai/delete_user/<?= $row->id_user;?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus <?= $row->nama_pegawai;?>" onclick="return ConfirmDialog()"> <i class="fa fa-trash"></i> Delete</a>
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

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <form action="ganti_pass" method="POST">
          <div class="modal-body">
              <input type="hidden" name="id_user" id="id" value="" required>
              <input type="hidden" name="to" id="to" value="user" required>
              <div class="form-group">
                <label class="control-label">New Password : </label>
                <input type="text" name="password" class="form-control" placeholder="Password ...." required>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-info">Simpan</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>

    </div>
  </div>
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
    $('[data-tooltip="tooltip"]').tooltip()
  });

  function ConfirmDialog() {
  var x=confirm("Apakah anda yakin ingin menghapus data ini?")
  if (x) {
    return true;
  } else {
    return false;
  }
}

$('#myModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var recipient = button.data('nama')
  var id = button.data('id')
  var modal = $(this)
  modal.find('.modal-title').text('Ganti Password '+ recipient)
  modal.find('.modal-body #id').val(id)
})
</script>
