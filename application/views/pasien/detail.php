<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/selectize/css/selectize.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/selectize/css/selectize.bootstrap3.css">
<script src="<?php echo base_url();?>assets/plugins/selectize/js/selectize.min.js"></script>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Pasien <?= $pasien[0]->nama_pasien;?>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?= base_url();?>assets/img/<?= $pasien[0]->gender == 0 ? 'wanita.png' : 'pria.png'?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?= $pasien[0]->nama_pasien;?></h3>

              <p class="text-muted text-center">No RM :<?= $pasien[0]->no_rm;?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Umur : </b> <a class="pull-right"><?= umur($pasien[0]->tgl_lahir);?></a>
                </li>
                <li class="list-group-item">
                  <b>Jenis Kelamin : </b> <a class="pull-right"><?= ($pasien[0]->gender ==0) ? 'Perempuan' : 'Laki - Laki';?></a>
                </li>
                <li class="list-group-item">
                  <b>No Telp : </b> <a class="pull-right"><?= $pasien[0]->no_telp;?></a>
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
              <li class="active"><a href="#timeline" data-toggle="tab">Riwayat Tindakan</a></li>
              <li class=""><a href="#pembelianobat" data-toggle="tab">Riwayat Pembelian Obat</a></li>
            </ul>
            <div class="tab-content">
              <div class=" active tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <?php foreach ($pendaftaran as $key => $pen): ?>
                    <!-- timeline item -->
                    <li>
                      <i class="fa fa-tags bg-blue"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> <?= tanggal($pen->tgl);?></span>

                        <h3 class="timeline-header" data-toggle="collapse" data-target="#collapseExample<?= $pen->id_trx_pendaftaran;?>"  aria-expanded="false" aria-controls="collapseExample<?= $pen->id_trx_pendaftaran;?>"><?= $pen->id_trx_pendaftaran;?></h3>

                        <div class="timeline-body collapse" id="collapseExample<?= $pen->id_trx_pendaftaran;?>">
                          <?php foreach ($pen->tindakan as $key => $tin): ?>
                            <div class="box">
                              <div class="box-header"  data-toggle="collapse" data-target="#tindakan<?= $tin->id_trx_tindakan;?>"  aria-expanded="false" aria-controls="tindakan<?= $tin->id_trx_tindakan;?>">
                                <h5><?= $tin->nama_pegawai;?><span class="pull-right"><?= tanggal(date('Y-m-d',strtotime($tin->tgl_tindakan)));?> Jam : <?= date('H:i:s',strtotime($tin->tgl_tindakan));?></span></h5>
                              </div>
                              <div class="box-body collapse" id="tindakan<?= $tin->id_trx_tindakan;?>">
                                <table class="table table-striped table-hover table-bordered">
                                  <thead>
                                    <tr>
                                      <td>NO</td>
                                      <td>Tindakan</td>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach ($tin->detail as $keys => $det): ?>
                                      <tr>
                                        <td><?= $keys + 1;?></td>
                                        <td class="namaDetailTindakan" data-toggle="collapse" data-target="#pemakaianObat<?= $det->id_detail_trx_tindakan;?>"  aria-expanded="false" aria-controls="pemakaianObat<?= $det->id_detail_trx_tindakan;?>">
		                                    <div class="col-md-12">
		                                      <?= $det->nama_tindakan;?>
		                                    </div>
		                                    <div class="col-md-12 collapse"  id="pemakaianObat<?= $det->id_detail_trx_tindakan;?>">
		                                      <table width="100%" class=" table table-hover table-striped table-bordered " >
		                                        <thead>
		                                          <tr>
		                                            <th>No</th>
		                                            <th>Nama Obat</th>
		                                            <th>Jumlah</th>
		                                          </tr>
		                                        </thead>
		                                        <tbody>
		                                          <?php foreach ($det->pemakaianObat as $key => $pot): ?>
		                                            <tr>
		                                              <td><?= $key + 1;?></td>
		                                              <td><?= $pot->nama_product;?></td>
		                                              <td><?= $pot->qtyPemakaian;?></td>
		                                            </tr>
		                                          <?php endforeach; ?>
		                                        </tbody>
		                                      </table>
		                                    </div>
                                        </td>
                                      </tr>
                                    <?php endforeach ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          <?php endforeach ?>
                        </div>
                      </div>
                    </li>
                    <!-- END timeline item -->
                  <?php endforeach ?>
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
              <!-- /.tab-pane -->
              <div class="  tab-pane" id="pembelianobat">
                <!-- The timeline -->
                          <!-- <?php print_r($penjualan); ?> -->
                <ul class="timeline timeline-inverse">
                  <?php foreach ($penjualan as $key => $pen): ?>
                    <!-- timeline item -->
                    <li>
                      <i class="fa fa-tags bg-blue"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> <?= tanggal($pen->tgl_penjualan);?></span>

                        <h3 class="timeline-header" data-toggle="collapse" data-target="#collapseExample<?= $pen->faktur_penjualan;?>"  aria-expanded="false" aria-controls="collapseExample<?= $pen->faktur_penjualan;?>"><?= $pen->faktur_penjualan;?></h3>

                        <div class="timeline-body collapse" id="collapseExample<?= $pen->faktur_penjualan;?>" style="background-color: rgb(254, 254, 254);">
                          <table class="table table-striped table-hover table-bordered">
                            <thead>
                              <tr>
                                <td>NO</td>
                                <td>Obat</td>
                                <td>Jumlah</td>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($pen->obats as $keys => $obat): ?>
                                <tr>
                                  <td><?= $keys + 1;?></td>
                                  <td><?= $obat->nama_product;?></td>
                                  <td><?= $obat->qty;?></td>
                                </tr>
                              <?php endforeach ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </li>
                    <!-- END timeline item -->
                  <?php endforeach ?>
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
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


  <script type="text/javascript">

  </script>