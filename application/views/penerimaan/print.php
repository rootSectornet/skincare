<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url();?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url();?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url();?>assets/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->

  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <div align="center">
          <h2><strong>SKIN CARE</strong></h2>
          <p>Jl. Salak 8. No 10, Pondok Benda, Pamulang - Tangerang Selatan</p>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <br><br>
    <!-- info row -->
    <?php if (count($penerimaan['head']) > 0): ?>
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <table width="100%">
            <tr>
              <td>No Faktur  </td>
              <td> : </td>
              <td><?= $penerimaan['head'][0]->faktur_penerimaan;?></td>
            </tr>
            <tr>
              <td>Supplier </td>
              <td> : </td>
              <td><?= $penerimaan['head'][0]->nama_suplier;?></td>
            </tr>
          </table>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <table width="100%">
              <tr>
                <td>Tgl Penerimaan  </td>
                <td> : </td>
                <td><?= tanggal($penerimaan['head'][0]->tgl_penerimaan);?></td>
              </tr>
              <tr>
                <td>Cara Bayar </td>
                <td> : </td>
                <td><?= $penerimaan['head'][0]->cara_bayar;?></td>
              </tr>
            </table>
        </div>
        <!-- /.col -->
      </div>
    <?php endif; ?>
    <!-- /.row -->
<br>
    <!-- Table row -->
    <?php if (count($penerimaan['detail']) > 0): ?>
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped table-bordered">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama Obat</th>
              <th>EXP</th>
              <th>QTY</th>
              <th>Harga Beli</th>
              <th>Harga Jual</th>
              <th>Sub Total</th>
            </tr>
            </thead>
            <tbody>
              <?php foreach ($penerimaan['detail'] as $key => $detail): ?>
                <tr>
                  <td><?= $key + 1;?></td>
                  <td><?= $detail->nama_product;?></td>
                  <td><?= tanggal($detail->tgl_exp);?></td>
                  <td><?= $detail->qty;?></td>
                  <td>Rp. <?= number_format($detail->harga,2,',','.');?></td>
                  <td>Rp. <?= number_format($detail->harga_jual,2,',','.');?></td>
                  <td>Rp. <?= number_format($detail->sub_total,2,',','.');?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="6" align="right"><b>PPN : </b></td>
                <td>Rp. <?= ($penerimaan['head'][0]->ppn == 1) ? number_format($penerimaan['head'][0]->total * 10 / 100,2,',','.') : number_format(0,2,',','.');?></td>
              </tr>
              <tr>
                <td colspan="6" align="right"><b>SUB TOTAL : </b></td>
                <td>Rp. <?= ($penerimaan['head'][0]->ppn == 1) ? number_format($penerimaan['head'][0]->total,2,',','.') : number_format(0,2,',','.');?></td>
              </tr>
              <tr>
                <td colspan="6" align="right"><b>TOTAL : </b></td>
                <td>Rp. <?= ($penerimaan['head'][0]->ppn == 1) ? number_format($penerimaan['head'][0]->total + $penerimaan['head'][0]->total * 10 / 100,2,',','.') : number_format($penerimaan['head'][0]->total,2,',','.');?></td>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.col -->
      </div>
    <?php endif; ?>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <!-- /.col -->
      <div class="col-xs-6">
        <p class="lead">Dilakukan Oleh : <b><i><?= $penerimaan['head'][0]->nama_pegawai;?></i></b></p>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
