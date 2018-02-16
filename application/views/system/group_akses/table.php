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
              <h2>Data Group Akses Aplikasi
                <a href="<?php echo base_url() ?>sistem/system/add_group_akses" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Tambah Menu"><i class="fa fa-plus"></i> Tambah</a> 
              </h2>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label">Pilih Group : </label>
                    <select class="form-control" name="group" id="group">
                      <option>PILIH GROUP</option>
                      <?php foreach ($group as $key => $g): ?>
                        <option value="<?= $g->id_mst_group;?>"><?= $g->nama_group;?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
              </div>
              <table class="table table-bordered table-striped table-hover" id="table">
                <thead>
                  <tr>
                    <th>NO </th>
                    <th>Pegawai</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="hasil">
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
 $('#group').selectize({
        create : false,
        plugins : ['restore_on_backspace'],
        sortField: 'text'
    });

$(document).ready(function(){
  $('#group').change(function(){
      let id = $(this).val();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>sistem/system/get_group_akses',
            data: 'id=' + id,
            success: function(response) {
                $('#hasil').html(response);
            }
        });
  });
});
</script>