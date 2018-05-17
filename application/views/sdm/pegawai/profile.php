
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/selectize/css/selectize.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/selectize/css/selectize.bootstrap3.css">
<script src="<?php echo base_url();?>assets/plugins/selectize/js/selectize.min.js"></script>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile <?= $pegawai[0]->nama_pegawai;?>
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
              <img class="profile-user-img img-responsive img-circle" src="<?= base_url();?>assets/img/<?= $pegawai[0]->gender == 0 ? 'wanita.png' : 'pria.png'?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?= $pegawai[0]->nama_pegawai;?></h3>


              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Umur : </b> <a class="pull-right"><?= umur($pegawai[0]->tgl_lahir);?></a>
                </li>
                <li class="list-group-item">
                  <b>Jenis Kelamin : </b> <a class="pull-right"><?= ($pegawai[0]->gender ==0) ? 'Perempuan' : 'Laki - Laki';?></a>
                </li>
                <li class="list-group-item">
                  <b>No Telp : </b> <a class="pull-right"><?= $pegawai[0]->no_tlp;?></a>
                </li>
                <li class="list-group-item">
                  <b>Alamat : </b> <a class="pull-right"><?= $pegawai[0]->alamat;?></a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

                <!-- /.col -->
                <div class="col-md-9">
                  <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                      <li class="active"><a href="#activity" data-toggle="tab">Account Login</a></li>
                    </ul>
                    <div class="tab-content">
                      <div class="active tab-pane" id="activity">
                        <?php if (isset($user_login)): ?>
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th>Username</th>
                                    <th> : </th>
                                    <th><?= $user_login->username;?></th>
                                  </tr>
                                  <tr>
                                    <th>Password  </th>
                                    <th> : </th>
                                    <th> **************
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-nama="<?= $pegawai[0]->nama_pegawai;?>" data-id="<?= $user_login->id_user;?>" class="btn btn-primary" data-tooltip="tooltip" data-placement="top" title="Ganti Password <?= $pegawai[0]->nama_pegawai;?>"><i class="fa fa-cogs"></i> Change</button>
                                    </th>
                                  </tr>
                                </thead>
                            </table>
                        <?php endif; ?>
                      </div>
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
        <form action="../ganti_pass" method="POST">
          <div class="modal-body">
              <input type="hidden" name="id_user" id="id" value="" required>
              <input type="hidden" name="to" id="to" value="" required>
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
  <script type="text/javascript">
  $(function () {
    $('[data-tooltip="tooltip"]').tooltip()
  });
  $('#myModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var recipient = button.data('nama')
    var id = button.data('id')
    let to = 'profile/'+id
    var modal = $(this)
    modal.find('.modal-title').text('Ganti Password '+ recipient)
    modal.find('.modal-body #id').val(id)
    modal.find('.modal-body #to').val(to)
  })
  </script>
