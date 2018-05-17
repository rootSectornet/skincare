
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/selectize/css/selectize.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/selectize/css/selectize.bootstrap3.css">
<script src="<?php echo base_url();?>assets/plugins/selectize/js/selectize.min.js"></script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php $verif = 0 ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12 col-md-12">
          <div class="box">
            <div class="box-header">
            <?php echo $this->session->flashdata('pesan_eror'); ?>
              <h2>Detail Data Penerimaan Obat</h2>
              <p class="text-muted "> <i class="fa fa-info-circle fa-fw"></i> Dilakukan Oleh  : <?= $penerimaan['head'][0]->nama_pegawai;?></p>
                <?php if ($verif == 0): ?>
                  <?= BtnPrint('gudang/penerimaan/print/'.$penerimaan['head'][0]->faktur_penerimaan,'Faktur Penerimaan '.$penerimaan['head'][0]->faktur_penerimaan);?>
                <?php endif; ?>
            </div>
            <div class="box-body">
              <div class="form">
                <?= form_open();?>
                  <?php foreach ($penerimaan['head'] as $key => $head): ?>
                    <?php if ($head->flag_verif == '1'): ?>
                        <?php $verif = 1 ?>
                    <?php endif; ?>
                      <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">Data Penerimaan <?= $head->faktur_penerimaan;?></h3>
                        </div>
                        <div class="box-body">
                          <input type="hidden" name="head[id_suplier]" id="id_suplier" disabled>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label">No Faktur : </label>
                              <input type="text" name="head[faktur_penerimaan]" class="form-control" value="<?= $head->faktur_penerimaan;?>" required disabled>
                            </div>
                            <div class="form-group">
                              <label class="control-label">Supplier : </label>
                              <input type="text" class="form-control" name="nama_suplier" id="select" required disabled value="<?= $head->nama_suplier;?>">
                            </div>
                            <div class="form-group">
                              <label class="control-label">Tgl Penerimaan : </label>
                              <input type="text" name="head[tgl_penerimaan]" class="form-control" disabled value="<?= tanggal($head->tgl_penerimaan);?>">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label">Cara Bayar : </label>
                              <input type="text" name="head[cara_bayar]" class="form-control" required disabled value="<?= $head->cara_bayar;?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">PPN : </label>
                                <div class="input-group">
                                      <span class="input-group-addon">
                                         <input type="checkbox" name="head[ppn]" id="Idppn" value="1" disabled <?= ($head->ppn == 1) ? 'checked' : '';?>>
                                      </span>
                                    <input type="text" name="ppn" id="ppn" disabled class="form-control" value="Rp. <?= ($head->ppn == 1) ? number_format($head->total * 10 / 100,2,',','.') : number_format(0,2,',','.');?>">
                                </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label">Total : </label>
                              <input type="text" name="total" class="form-control" disabled  id="total" value="Rp. <?= ($head->ppn == 1) ? number_format($head->total + $head->total * 10 / 100,2,',','.') : number_format($head->total,2,',','.');?>">
                            </div>
                          </div>
                        </div>
                      </div>
                  <?php endforeach; ?>
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Detail Penerimaan</h3>
                    </div>
                    <div class="box-body">
                            <table class="table table-bordered table-condensed table-striped trx-table" id="table-row"> <!-- << Ganti name table-id sesuai no trx >> -->
                                <thead>
                                    <tr>
                                        <th>Nama Obat</th>
                                        <th>Tgl EXp</th>
                                        <th>QTY</th>
                                        <th>Harga</th>
                                        <th>Harga Jual</th>
                                        <th>Sub Total</th>
                                        <th>
                                            <button type="button" class="btn btn-primary btn-sm" disabled id="addRow"><span class="fa fa-plus"></span> Tambah</button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($penerimaan['detail'] as $key => $detail): ?>
                                      <tr>
                                        <td style="width: 30%;"><input type="text" class="form-control" disabled value="<?= $detail->nama_product;?>"/></td>
                                        <td><input type="text" class="form-control" disabled value="<?= tanggal($detail->tgl_exp);?>"/></td>
                                        <td><input type="text" class="form-control" disabled value="<?= $detail->qty;?>"/></td>
                                        <td><input type="text" class="form-control" disabled value="<?= number_format($detail->harga,2,',','.');?>"/></td>
                                        <td><input type="text" class="form-control" disabled value="<?= number_format($detail->harga_jual,2,',','.');?>"/></td>
                                        <td><input type="text" class="form-control" disabled value="<?= number_format($detail->sub_total,2,',','.');?>"/></td>
                                      </tr>
                                  <?php endforeach; ?>
                                </tbody>
                            </table>
                    </div>
                  </div>
                  <div class="form-group">
                    <?php if ($verif == 0): ?>
                      <?= BtnEdit('gudang/penerimaan/edit/'.$head->faktur_penerimaan,$head->faktur_penerimaan);?>
                    <?php endif; ?>
                    <?= BtnBack('gudang/penerimaan');?>
                  </div>
                <?= form_close();?>
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
