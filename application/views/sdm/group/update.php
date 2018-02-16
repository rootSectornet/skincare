
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
              <h2>Edit Group Pegawai
              </h2>
            </div>
            <div class="box-body">
                <div class="form">
                  <div class="col-md-6 col-md-offset-3">
                    <?= form_open();?>
                        <?php foreach ($group as $key => $row): ?>
                          <div class="form-group">
                            <label class="control-label">Nama Group : </label>
                            <input type="text" name="nama_group" class="form-control" placeholder="Nama Group" required value="<?= $row->nama_group;?>">
                          </div>
                          <div class="form-group">
                            <button type="submit" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Simpan">Simpan</button>
                            <a class="btn btn-danger" href="<?= base_url();?>sdm/group" data-toggle="tooltip" data-placement="top" title="Kembali">Kembali</a>
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