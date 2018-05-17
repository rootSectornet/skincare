
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
              <h2>Edit Data Supplier
              </h2>
            </div>
            <div class="box-body">
                <div class="form">
                  <div class="col-md-6 col-md-offset-3">
                    <?= form_open();?>
                    <?php foreach ($suplier as $key => $row): ?>
                      <div class="form-group">
                        <label class="control-label">Nama Supplier : </label>
                        <input type="text" name="nama_suplier" class="form-control" required value="<?= $row->nama_suplier;?>">
                      </div>
                      <div class="form-group">
                        <label class="control-label">Alamat : </label>
                        <textarea class="form-control" name="alamat" rows="3" required><?= $row->alamat;?></textarea>
                      </div>
                      <div class="form-group">
                        <label class="control-label">No Telp : </label>
                        <input type="text" name="telp" class="form-control" required value="<?= $row->telp;?>">
                      </div>
                      <div class="form-group">
                        <?= BtnSave('Simpan');?>
                        <?= BtnBack('gudang/suplier');?>
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
<script>
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

</script>