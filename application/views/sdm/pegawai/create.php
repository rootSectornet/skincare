
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
              <h2>Tambah Pegawai
              </h2>
            </div>
            <div class="box-body">
                <div class="form">
                  <div class="col-md-6 col-md-offset-3">
                    <?= form_open();?>
                      <div class="form-group">
                        <label class="control-label">Nama Pegawai : </label>
                        <input type="text" name="nama_pegawai" class="form-control" placeholder="Nama Pegawai" required>
                      </div>
                      <div class="form-group">
                        <label class="control-label">No Telp : </label>
                        <input type="text" name="no_tlp" class="form-control" placeholder="No Telp" required>
                      </div>
                      <div class="form-group">
                        <label class="control-label">Jenis Kelamin : </label>
                        <select class="form-control" name="gender" required>
                          <option value="0">Perempuan</option>
                          <option value="1">Laki - Laki</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label class="control-label">Alamat : </label>
                        <textarea class="form-control" rows="3" required name="alamat"></textarea>
                      </div>
                      <div class="form-group">
                        <label class="control-label">Tgl Lahir : </label>
                        <input type="text" name="tgl_lahir" class="form-control" required id="datepicker">
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Simpan">Simpan</button>
                        <a class="btn btn-danger" href="<?= base_url();?>sdm/pegawai" data-toggle="tooltip" data-placement="top" title="Kembali">Kembali</a>
                      </div>
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
    $('#datepicker').datetimepicker({
        format:'Y-m-d',
        mask:false,
        timepicker:false,
        minDate: '-2015/01/01'
    });
    
</script>