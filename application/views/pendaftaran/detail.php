
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
              <a href="#" class="btn btn-primary btn-block"><b>Detail Pasien</b></a>
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
              <?php if ($this->session->userdata('group') == 4 || $this->session->userdata('group') == 1 ): ?>
                  <li class="active"><a href="#activity" data-toggle="tab">Dokter</a></li>
                  <?php $active = ""; ?>
              <?php endif ?>
              <?php if ($this->session->userdata('group') != 4 || $this->session->userdata('group') == 1 ): ?>
                <li class="active"><a href="#timeline" data-toggle="tab">Procedur</a></li>
                <li><a href="#settings" data-toggle="tab">Resep</a></li>
              <?php endif ?>
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
                            <button class="pull-right btn btn-success" data-toggle="modal" data-target="#myModals" data-tindakan="<?= $row->id_trx_tindakan;?>" data-total="<?= $row->total;?>"  data-tooltip="tooltip" data-placement="top" title="Tambah Tindakan <?= $row->nama_pegawai;?>"><i class="fa fa-plus"></i></button>
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
                                <tr>
                                  <td><?= $keys + 1;?></td>
                                  <td><?= $tin->nama_tindakan;?></td>
                                  <td>
                                    <a href="<?= base_url();?>pendaftaran/pendaftaran/hapus_tindakan/<?= $tin->id_detail_trx_tindakan;?>/<?= $row->id_trx_tindakan;?>/<?= $row->total;?>/<?= $tin->harga;?>/<?= $pendaftaran[0]->id_trx_pendaftaran;?>"  class="btn btn-xs btn-danger" data-tooltip="tooltip" data-placement="top" title="Hapus Tindakan <?= $tin->nama_tindakan;?>"  onclick=" return Confirm()"><i class="fa fa-trash"></i></a>
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
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                      <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">Read more</a>
                        <a class="btn btn-danger btn-xs">Delete</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-user bg-aqua"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                      <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                      </h3>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-comments bg-yellow"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                      <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                      <div class="timeline-body">
                        Take me to your leader!
                        Switzerland is small and neutral!
                        We are more like Germany, ambitious and misunderstood!
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-camera bg-purple"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                      <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                      <div class="timeline-body">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
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
              <input type="hidden" name="id_mst_pegawai"  value="<?= $this->session->userdata('id_mst_pegawai');?>" required>
              <input type="hidden" name="id_trx_pendaftaran"  value="<?= $pendaftaran[0]->id_trx_pendaftaran;?>" required>
              <input type="hidden" name="id_mst_tindakan"  value="" required id="id_mst_tindakan">
              <input type="hidden" name="harga"  value="" required id="harga">
              <div class="form-group">
                <label class="control-label">Tindakan : </label>
                  <select class="form-control" name="tindakan" id="select">
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
                  <select class="form-control" name="tindakan" id="selects">
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
              $('#id_mst_tindakan').val(data.id_mst_tindakan);
              $('#harga').val(data.harga);
            },
            onDelete : function(value, $item) {
                let data = this.options[value];
                $('#id_mst_tindakan').val("");
                $('#harga').val("");
            },
            onItemRemove : function(value, $item) {
                let data = this.options[value];
                $('#id_mst_tindakan').val("");
                $('#harga').val("");
            }
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
      function Confirm(){
        var x=confirm("Apakah anda yakin ingin menghapus data ini?")
          if (x) {
            return true;
          } else {
            return false;
          }
      } 
     
  </script>