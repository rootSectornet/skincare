<link rel="stylesheet" href="<?= base_url();?>assets/plugins/iCheck/all.css">
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
              <h2>Edit User Login
              </h2>
            </div>
            <div class="box-body">
                <div class="form">
                  <div class="col-md-6 col-md-offset-3">
                    <?= form_open();?>
                    <?php foreach ($user as $key => $row): ?>
                        <div class="form-group">
                          <label class="control-label">Pilih Pegawai : </label>
                          <select class="form-control" name="id_mst_pegawai" id="select">
                            <?php foreach ($pegawai as $key => $p): ?>
                              <option value="<?= $p->id_mst_pegawai;?>" <?= $p->id_mst_pegawai == $row->id_mst_pegawai ? 'selected' : ' ';?>><?= $p->nama_pegawai;?></option>
                            <?php endforeach ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label class="control-label">UserName : </label>
                          <input type="text" name="username" class="form-control" required placeholder="UserName..." value="<?= $row->nama_pegawai;?>">
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Simpan">Simpan</button>
                          <a class="btn btn-danger" href="<?= base_url();?>sdm/pegawai/user" data-toggle="tooltip" data-placement="top" title="Kembali">Kembali</a>
                        </div>
                    <?php endforeach ?>
                    <?= form_close();?>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <script src="<?= base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
     $('#select').selectize({
        create : false,
        plugins : ['restore_on_backspace'],
        sortField: 'text'
    });

</script>