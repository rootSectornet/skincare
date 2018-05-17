<style>
.namaDetailTindakan:hover{
  background-color: skyblue;
  cursor: pointer;
  border: solid 1px #aaa;
}
</style>
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/selectize/css/selectize.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/selectize/css/selectize.bootstrap3.css">
<script src="<?php echo base_url();?>assets/plugins/selectize/js/selectize.min.js"></script>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Tagihan <?= $pendaftaran->nama_pasien;?>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
<?php
$totalSemua = 0;

 ?>
        <?php echo $this->session->flashdata('pesan_eror'); ?>
      <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?= base_url();?>assets/img/<?= $pendaftaran->gender == 0 ? 'wanita.png' : 'pria.png'?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?= $pendaftaran->nama_pasien;?></h3>

              <p class="text-muted text-center">No RM :<?= $pendaftaran->no_rm;?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Kode Pendaftaran : </b> <a class="pull-right"><?= $pendaftaran->id_trx_pendaftaran;?></a>
                </li>
                <li class="list-group-item">
                  <b>Tgl Daftar : </b> <a class="pull-right"><?= $pendaftaran->tgl;?></a>
                </li>
                <li class="list-group-item">
                  <b>Status : </b> <a id="status" class="pull-right"><?= $pendaftaran->flag_lunas == '0' ? 'Belum Lunas' : 'Lunas';?></a>
                </li>
                <?php if ($pendaftaran->flag_lunas == '1'): ?>
                    <li class="list-group-item">
                      <b>Total Tagihan : </b> <a id="status" class="pull-right">Rp. <?= number_format($pendaftaran->nilai_tagihan,0,',','.');?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Total Yang Dibayar : </b> <a id="status" class="pull-right">Rp. <?= number_format($pendaftaran->nilai_terbayar,0,',','.');?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Sisa : </b> <a id="status" class="pull-right">Rp. <?= number_format($pendaftaran->nilai_terbayar - $pendaftaran->nilai_tagihan,0,',','.');?></a>
                    </li>
                <?php endif; ?>
              </ul>
              <a href="<?= base_url();?>pasien/pasien/detail/<?= $pendaftaran->id_mst_pasien;?>" class="btn btn-primary btn-block"><b>Riwayat Pasien</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <?php $active = "active"; ?>
                  <li class="active"><a href="#activity" data-toggle="tab">Detail Tindakan</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <?php if (isset($pendaftaran->detailHead)): ?>
                    <?php foreach ($pendaftaran->detailHead as $key => $head): ?>
                      <div class="post clearfix">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" src="<?= base_url();?>assets/img/<?= $pendaftaran->gender == 0 ? 'wanita.png' : 'pria.png'?>" alt="user image">
                              <span class="username">
                                <a href="#"><?= $head->nama_pegawai;?>.</a>
                              </span>
                          <span class="description">Dilakukan - <?= $head->tgl_tindakan;?></span>
                        </div>
                        <!-- /.user-block -->
                        <p>
                        </p>
                        <ul class="list-inline">
                          <div class="box box-warning box-solid">
                            <div class="box-header with-border">
                              <h3 class="box-title">Total = Rp. <?= number_format($head->total,2,',','.');?></h3>
                              <?php $totalSemua += $head->total;?>
                              <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                              </div>
                              <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                              <?php if (isset($head->detailBody)): ?>
                                    <table class="table table-hover table-striped table-bordered">
                                      <thead>
                                        <tr>
                                          <th>NO</th>
                                          <th>Tindakan</th>
                                          <th>Sub Total</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php $totalTindakan = 0; ?>
                                        <?php foreach ($head->detailBody as $keys => $tin): ?>
                                          <?php $totalTindakan += $tin->harga;?>
                                          <?php $totalPemakaian = 0; ?>
                                          <tr >
                                            <td><?= $keys + 1;?></td>
                                            <td class="namaDetailTindakan" data-toggle="collapse" data-target="#pemakaianObat<?= $tin->id_detail_trx_tindakan;?>"  aria-expanded="false" aria-controls="pemakaianObat<?= $tin->id_detail_trx_tindakan;?>">
                                              <div class="col-md-12">
                                                <?= $tin->nama_tindakan;?>
                                              </div>
                                              <div class="col-md-12 collapse"  id="pemakaianObat<?= $tin->id_detail_trx_tindakan;?>">
                                                <?php if (isset($tin->DetailPemakaian)): ?>
                                                    <table width="100%" class=" table table-hover table-striped table-bordered " >
                                                      <thead>
                                                        <tr>
                                                          <th>No</th>
                                                          <th>Nama Obat</th>
                                                          <th>Jumlah</th>
                                                          <th>Sub Total</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                        <?php foreach ($tin->DetailPemakaian as $key => $pot): ?>
                                                          <?php
                                                              $totalTindakan += $pot->sub_total;
                                                              $totalPemakaian += $pot->sub_total;
                                                           ?>
                                                          <tr>
                                                            <td><?= $key + 1;?></td>
                                                            <td><?= $pot->nama_product;?></td>
                                                            <td><?= $pot->qtyPemakaian;?></td>
                                                            <td>Rp. <?= number_format($pot->sub_total,2,',','.');?></td>
                                                          </tr>
                                                        <?php endforeach; ?>
                                                      </tbody>
                                                      <tfoot>
                                                        <tr>
                                                          <td colspan="3" align="right">Harga Total Pemakaian Obat : </td>
                                                          <td>Rp. <?= number_format($totalPemakaian,2,',','.');?></td>

                                                        </tr>
                                                      </tfoot>
                                                    </table>
                                                <?php endif; ?>
                                              </div>
                                            </td>
                                            <td>Rp. <?= number_format($tin->harga + $totalPemakaian,2,',','.');?></td>
                                          </tr>
                                        <?php endforeach ?>
                                      </tbody>
                                      <tfoot>
                                        <tr>
                                          <td colspan="2" align="right">Harga Total Tindakan : </td>
                                          <td>Rp. <?= number_format($totalTindakan,2,',','.');?></td>
                                        </tr>
                                      </tfoot>
                                    </table>
                          <?php endif; ?>
                            </div>
                            <!-- /.box-body -->
                          </div>
                          <!-- /.box -->
                        </ul>
                      </div>
                    <?php endforeach ?>
                <?php endif; ?>
                <!-- /.post -->
                <div class="">
                  <table class="table table-hover table-striped table-bordered ">
                      <thead>
                          <tr>
                            <th>TOTAL TAGIHAN PASIEN : </th>
                            <th>Rp. <?= number_format($totalSemua,2,',','.');?></th>
                          </tr>
                      </thead>
                  </table>
                </div>
              </div>
              <div class="">
                <button type="button" name="button" <?= $pendaftaran->flag_lunas == '1' ? 'disabled' : '';?>  class="btn btn-info proses" onclick="ModalPelunasan(<?= $pendaftaran->id_billing;?>,<?= $totalSemua;?>)"  data-tooltip="tooltip" data-placement="top" title="Proses Pembayaran">Proses</button>
                <?= BtnBack('Kasir/kasir');?>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <div class="modal fade" id="ModalPembayaran" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Proses Pelunasan</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" id="idBilling">
          <div class="form-group">
              <label for="Tagihan">Tagihan Pasien : </label>
              <input type="text" name="Tagihan" id="Tagihan" class="form-control" disabled>
          </div>
          <div class="form-group">
              <label for="bayar">Bayar : </label>
              <input type="text" name="bayar" id="bayar" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info" onclick="save()" id="save">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
  $(function () {
    $('[data-tooltip="tooltip"]').tooltip()
  });

  function ModalPelunasan(id,total){
      let MyModalPelunasan = $('#ModalPembayaran');
      MyModalPelunasan.find('.modal-body #idBilling').val(id);
      MyModalPelunasan.find('.modal-body #Tagihan').val('Rp.' + total.toLocaleString('en', {minimumFractionDigits: 0, maximumFractionDigits: 0}));
      MyModalPelunasan.modal('show');
  }
  function save(){
    let MyModalPelunasan = $('#ModalPembayaran');
    MyModalPelunasan.find('.modal-header h4').html('Information !');
    let data = {
      idBilling : $('.modal-body #idBilling').val(),
      total : <?= $totalSemua;?>,
      bayar : $('.modal-body #bayar').val(),
      idPendaftaran : "<?= $pendaftaran->id_trx_pendaftaran;?>"
    }
    if (data.bayar < data.total) {
        alert('Uang Yang Diabayarkan Tidak Boleh Kurang Dari Tagihan !');
    }else if (data.bayar == '') {
      alert('Uang Yang Diabayarkan Tidak Boleh Kosong !');
    }else{
      let Jsondata = JSON.stringify(data);
      $.ajax({
          type: 'POST', // Metode pengiriman data menggunakan POST
          url: '<?php echo base_url(); ?>Kasir/Kasir/Bayar', // File pemroses data
          data: 'post=' + Jsondata, // Data yang akan dikirim ke file pemroses
          success: function(response) { // Jika berhasil
              let hasil = JSON.parse(response);
              if (hasil.code == '200') {
                MyModalPelunasan.find('.modal-body').html('<p class="red"> Proses Pelunasan Berhasil !</p><p>Status : '+hasil.status+'</p><p>Sisa Uang : '+hasil.sisa.toLocaleString('en', {minimumFractionDigits: 0, maximumFractionDigits: 0})+'</p>');
                MyModalPelunasan.find('.modal-footer #save').prop('disabled',true);
                $('#status').html(hasil.status);
                $('.proses').prop('disabled',true);
                $('.list-group').append('<li class="list-group-item"><b>Sisa Uang : </b> <a id="status" class="pull-right"> Rp. '+hasil.sisa.toLocaleString('en', {minimumFractionDigits: 0, maximumFractionDigits: 0})+'</a></li>')
              }else if (hasil.code == '300') {
                  MyModalPelunasan.find('.modal-body').html('<p class="red"> Gagal Melakukan Pelunasan !</p>');
                  MyModalPelunasan.find('.modal-footer #save').prop('disabled',true);
              }else{
                  MyModalPelunasan.find('.modal-body').html('<p class="red"> Uang Yang Dibayar Lebih Kecil Dari Nilai Tagihan !</p>');
                  MyModalPelunasan.find('.modal-footer #save').prop('disabled',true);
              }
              console.log(hasil);
            },
          ajaxSend: function(){
            Pace.restart()
          },
          beforeSend: function(){
            Pace.restart()
          }

      });
    }
  }

  $(document).ajaxStart(function () {
    Pace.restart()
  })
  </script>
