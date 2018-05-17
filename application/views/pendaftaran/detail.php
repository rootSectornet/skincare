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
        Detail Pendaftaran <?= $pendaftaran[0]->nama_pasien;?>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">

        <?php echo $this->session->flashdata('pesan_eror'); ?>
      <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?= base_url();?>assets/img/<?= $pendaftaran[0]->gender == 0 ? 'wanita.png' : 'pria.png'?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?= $pendaftaran[0]->nama_pasien;?></h3>

              <p class="text-muted text-center">No RM :<?= $pendaftaran[0]->no_rm;?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Kode Pendaftaran : </b> <a class="pull-right"><?= $pendaftaran[0]->id_trx_pendaftaran;?></a>
                </li>
                <li class="list-group-item">
                  <b>Tgl Daftar : </b> <a class="pull-right"><?= $pendaftaran[0]->tgl;?></a>
                </li>
              </ul>
              <a href="<?= base_url();?>pasien/pasien/detail/<?= $pendaftaran[0]->id_mst_pasien;?>" class="btn btn-primary btn-block"><b>Detail Pasien</b></a>
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
                  <li class="active"><a href="#activity" data-toggle="tab">Tindakan</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="col-sm-12">
                  <button class="btn bg-aqua btn-flat" data-toggle="modal" data-target="#myModal" data-nama="ss" data-id="ss" data-tooltip="tooltip" data-placement="top" title="Tambah Tindakan <?= $pendaftaran[0]->id_trx_pendaftaran;?>"><i class="fa fa-plus"></i> Tambah Tindakan</button>
                </div><br><br><br>
                <!-- <?php print_r($trx_tindakan); ?> -->
                <?php foreach ($trx_tindakan as $key => $row): ?>
                  <div class="post clearfix">
                    <div class="user-block">
                      <img class="img-circle img-bordered-sm" src="<?= base_url();?>assets/img/<?= $pendaftaran[0]->gender == 0 ? 'wanita.png' : 'pria.png'?>" alt="user image">
                          <span class="username">
                            <a href="#"><?= $row->nama_pegawai;?>.</a>
                            <!-- <button class="pull-right btn btn-success" data-toggle="modal" data-target="#myModals" data-tindakan="<?= $row->id_trx_tindakan;?>" data-total="<?= $row->total;?>"  data-tooltip="tooltip" data-placement="top" title="Tambah Tindakan <?= $row->nama_pegawai;?>"><i class="fa fa-plus"></i></button> -->
                          </span>
                      <span class="description">Dilakukan - <?= $row->tgl_tindakan;?></span>
                    </div>
                    <!-- /.user-block -->
                    <p>
                    </p>
                    <ul class="list-inline">
                      <div class="box box-warning box-solid">
                        <div class="box-header with-border">
                          <h3 class="box-title">Tindakan</h3>

                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                          </div>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <table class="table table-hover table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>NO</th>
                                <th>Tindakan</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($row->detail as $keys => $tin): ?>
                                <tr >
                                  <td><?= $keys + 1;?></td>
                                  <td class="namaDetailTindakan" data-toggle="collapse" data-target="#pemakaianObat<?= $tin->id_detail_trx_tindakan;?>"  aria-expanded="false" aria-controls="pemakaianObat<?= $tin->id_detail_trx_tindakan;?>">
                                    <div class="col-md-12">
                                      <?= $tin->nama_tindakan;?>
                                    </div>
                                    <div class="col-md-12 collapse"  id="pemakaianObat<?= $tin->id_detail_trx_tindakan;?>">
                                      <table width="100%" class=" table table-hover table-striped table-bordered " >
                                        <thead>
                                          <tr>
                                            <th>No</th>
                                            <th>Nama Obat</th>
                                            <th>Jumlah</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach ($tin->pemakaianObat as $key => $pot): ?>
                                            <tr>
                                              <td><?= $key + 1;?></td>
                                              <td><?= $pot->nama_product;?></td>
                                              <td><?= $pot->qtyPemakaian;?></td>
                                              <td>
                                                <a href="<?= base_url();?>pendaftaran/pendaftaran/deletePemakaian/<?= $pot->id_pemakaian_obat;?>" class="btn btn-danger btn-xs btn-flat" data-tooltip="tooltip" data-placement="top" title="Hapus Pemakaian Obat <?= $pot->nama_product;?>"   onclick=" return Confirm()"><i class="fa fa-trash"></i></a>
                                              </td>
                                            </tr>
                                          <?php endforeach; ?>
                                        </tbody>
                                      </table>
                                    </div>
                                  </td>
                                  <td>
                                    <a href="<?= base_url();?>pendaftaran/pendaftaran/hapus_tindakan/<?= $tin->id_detail_trx_tindakan;?>/<?= $row->id_trx_tindakan;?>/<?= $row->total;?>/<?= $tin->harga;?>/<?= $pendaftaran[0]->id_trx_pendaftaran;?>"  class="btn btn-xs btn-danger" data-tooltip="tooltip" data-placement="top" title="Hapus Tindakan <?= $tin->nama_tindakan;?>"  onclick=" return Confirm()"><i class="fa fa-trash"></i></a>
                                    <button class="btn bg-green btn-flat btn-xs" data-total="<?= $row->total;?>" data-iddetailtindakan="<?= $tin->id_detail_trx_tindakan;?>" data-tindakan="<?= $tin->id_trx_tindakan;?>" data-toggle="modal" data-target="#ObatModals" data-nama="ss" data-id="ss" data-tooltip="tooltip" data-placement="top" title="Tambah Tindakan <?= $pendaftaran[0]->id_trx_pendaftaran;?>"><i class="fa fa-plus"></i> Tambah Obat</button>
                                  </td>
                                </tr>
                              <?php endforeach ?>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                    </ul>
                  </div>
                <?php endforeach ?>
                <!-- /.post -->
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

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <form action="../insert_tindakan" method="POST">
          <div class="modal-body">
              <input type="hidden" name="id_trx_pendaftaran"  value="<?= $pendaftaran[0]->id_trx_pendaftaran;?>" required>
              <div class="form-group">
                <label class="control-label">Tindakan : </label>
                  <select class="form-control" name="tindakan[][id_tindakan]" multiple="multiple" id="select">
                    <?php foreach ($tindakan as $key => $tind): ?>
                      <option value="<?= $tind->id_mst_tindakan;?>"><?= $tind->nama_tindakan;?></option>
                    <?php endforeach ?>
                  </select>
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
  <div class="modal fade" id="myModals" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <form action="../insert_tindakanOnDokter" method="POST">
          <div class="modal-body">
              <input type="hidden" name="id_trx_pendaftaran"  value="<?= $pendaftaran[0]->id_trx_pendaftaran;?>" required>
              <input type="hidden" name="id_mst_tindakan"  value="" required id="id_mst_tindakan">
              <input type="hidden" name="id_trx_tindakan"  value="" required id="id_trx_tindakan">
              <input type="hidden" name="harga"  value="" required id="harga">
              <input type="hidden" name="total"  value="" required id="total">
              <div class="form-group">
                <label class="control-label">Tindakan : </label>
                  <select class="form-control" name="tindakan[][id_tindakan]" multiple="multiple" id="select">
                    <?php foreach ($tindakan as $key => $tind): ?>
                      <option value="<?= $tind->id_mst_tindakan;?>"><?= $tind->nama_tindakan;?></option>
                    <?php endforeach ?>
                  </select>
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
  <div class="modal fade" id="ObatModals" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <form action="../insert_ObatOnTindakan" method="POST">
          <div class="modal-body">
              <input type="hidden" name="id_trx_pendaftaran"  value="<?= $pendaftaran[0]->id_trx_pendaftaran;?>" required>
              <input type="hidden" name="id_product" value="" required id="id_product">
              <input type="hidden" name="id_trx_tindakan"  value="" required id="id_trx_tindakan">
              <input type="hidden" name="id_detail_trx_tindakan"  value="" required id="id_detail_trx_tindakan">
              <input type="hidden" name="harga_jual"  value="" required id="hargajual">
              <input type="hidden" name="harga_beli" value="" required id="hargabeli">
              <input type="hidden" name="total"  value="" required id="total">
              <div class="form-group">
                <label class="control-label">Nama Obat : </label>
                  <select class="form-control" name="obat" id="selectobat">
                  </select>
              </div>
              <div class="form-group">
                <label class="control-label">Jumlah : </label>
                <input type="number" name="qty" value="" class="form-control">
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
  <script type="text/javascript">
    $('#myModals').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id_tindakan = button.data('tindakan')
      var total = button.data('total')
      var modal = $(this);
      console.log(id_tindakan);
      $('#myModals .modal-body #id_trx_tindakan').val(id_tindakan);
      $('#myModals .modal-body #total').val(total);
    });
      $('#ObatModals').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id_tindakan = button.data('tindakan')
        var iddetailtindakan = button.data('iddetailtindakan')
        var total = button.data('total')
        var modal = $(this);
        console.log(id_tindakan);
        $('#ObatModals .modal-body #id_trx_tindakan').val(id_tindakan);
        $('#ObatModals .modal-body #id_detail_trx_tindakan').val(iddetailtindakan);
        $('#ObatModals .modal-body #total').val(total);
      });
     $(function () {
    $('[data-tooltip="tooltip"]').tooltip()
  });
      var eventHandler = function(name) {
          return function() {
            console.log(name, arguments);
            $('#log').append('<div><span class="name">' + name + '</span></div>');
          };
        };
     $(document).ready(function(){
        $('#select').selectize({
            plugins: ['remove_button']
        });

     });
     $(document).ready(function(){
        $('#selects').selectize({
            valueField: 'nama_tindakan',
            labelField: 'nama_tindakan',
            searchField: 'nama_tindakan',
            options: [],
            create: false,
            render: {
                option: function(item, escape) {
                        return '<div class="col-xs-12" style="border-top :1px solid #ccc; padding: 0px !important">' +
                                '<div class="col-xs-2" style="padding-left: 4px;">' + '<p><strong> Nama :' + escape(item.nama_tindakan) + '</strong></p>' + '</div>' +
                                '<div class="col-xs-10" style="border-left :1px solid #ddd; padding: 0px;">' +
                                    '<div class="col-xs-12" style="padding-left: 4px;">' +
                                        '<p style="margin-bottom: 2px !important;"><strong> Harga :' + escape(item.harga) + '</strong></p>' +
                                        '<p style="margin-bottom: 2px !important;"><small>Nama : ' + escape(item.nama_tindakan) + '</small></p>' +
                                    '</div>' +
                                    //'<div class="col-xs-12">' + '<small>' + escape(item.ket_icd_icd10) + '</small>' + '</div>' +
                                '</div>' +
                            '</div>';
                }
            },
            load: function(query, callback) {
                if (!query.length) return callback();
                $.ajax({
                    url: '<?= base_url();?>pendaftaran/pendaftaran/tindakan',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        or_like: {kel: query}
                    },
                    error: function() {
                        callback();
                    },
                    success: function(res) {
                        callback(res);
                    }
                });
            },
            onItemAdd: function(value,$item){
              let data = this.options[value];
              $('#myModals .modal-body #id_mst_tindakan').val(data.id_mst_tindakan);
              $('#myModals .modal-body #harga').val(data.harga);
            },
            onDelete : function(value, $item) {
                let data = this.options[value];
                $('#myModals .modal-body #id_mst_tindakan').val("");
                $('#myModals .modal-body #harga').val("");
            },
            onItemRemove : function(value, $item) {
                let data = this.options[value];
                $('#myModals .modal-body #id_mst_tindakan').val("");
                $('#myModals .modal-body #harga').val("");
            }
        });

     });
     $(document).ready(function(){
        $('#selectobat').selectize({
            valueField: 'nama_product',
            labelField: 'nama_product',
            searchField: 'nama_product',
            options: [],
            create: false,
            render: {
                option: function(item, escape) {
                        if (escape(item.qty) <= 0) {

                          return '<div style="color:red;" class="col-xs-12" style="border-top :1px solid #ccc; padding: 0px !important">' +
                                  '<div class="col-xs-2" style="padding-left: 4px;color:red;">' + '<p><strong> Nama :' + escape(item.nama_product) + '</strong></p>' + '</div>' +
                                  '<div class="col-xs-10" style="border-left :1px solid #ddd; padding: 0px;">' +
                                      '<div class="col-xs-12" style="padding-left: 4px;">' +
                                          '<p style="margin-bottom: 2px !important; color:red;"><strong> Harga :' + escape(item.harga_jual) + '</strong></p>' +
                                          '<p style="margin-bottom: 2px !important; color:red;"><small>Stock : ' + escape(item.qty) + '</small></p>' +
                                      '</div>' +
                                      //'<div class="col-xs-12">' + '<small>' + escape(item.ket_icd_icd10) + '</small>' + '</div>' +
                                  '</div>' +
                              '</div>';
                        }else{
                          return '<div class="col-xs-12" style="border-top :1px solid #ccc; padding: 0px !important">' +
                                  '<div class="col-xs-2" style="padding-left: 4px;">' + '<p><strong> Nama :' + escape(item.nama_product) + '</strong></p>' + '</div>' +
                                  '<div class="col-xs-10" style="border-left :1px solid #ddd; padding: 0px;">' +
                                      '<div class="col-xs-12" style="padding-left: 4px;">' +
                                          '<p style="margin-bottom: 2px !important;"><strong> Harga :' + escape(item.harga_jual) + '</strong></p>' +
                                          '<p style="margin-bottom: 2px !important;"><small>Stock : ' + escape(item.qty) + '</small></p>' +
                                      '</div>' +
                                      //'<div class="col-xs-12">' + '<small>' + escape(item.ket_icd_icd10) + '</small>' + '</div>' +
                                  '</div>' +
                              '</div>';
                        }
                }
            },
            load: function(query, callback) {
                if (!query.length) return callback();
                $.ajax({
                    url: '<?= base_url();?>gudang/product/jsonpenjualan',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        or_like: {kel: query}
                    },
                    error: function() {
                        callback();
                    },
                    success: function(res) {
                        callback(res);
                    }
                });
            },
            onItemAdd: function(value,$item){
              let data = this.options[value];
              if (data.qty <= 0) {
                  alert('Stock Tidak ada, Silahkan Pilih Obat lain atau buat penerimaan');
              }else{
                $('#ObatModals .modal-body #id_product').val(data.id_product);
                $('#ObatModals .modal-body #hargajual').val(data.harga_jual);
                $('#ObatModals .modal-body #hargabeli').val(data.harga_beli);
              }
            },
            onDelete : function(value, $item) {
                let data = this.options[value];
                $('#ObatModals .modal-body #hargabeli').val("");
                $('#ObatModals .modal-body #hargajual').val("");
                $('#ObatModals .modal-body #id_product').val("");
            },
            onItemRemove : function(value, $item) {
                let data = this.options[value];
                $('#ObatModals .modal-body #hargabeli').val("");
                $('#ObatModals .modal-body #hargajual').val("");
                $('#ObatModals .modal-body #id_product').val("");
            }
        });

     });
      function Confirm(){
        var x=confirm("Apakah anda yakin ingin menghapus data ini?")
          if (x) {
            return true;
          } else {
            return false;
          }
      }

  </script>