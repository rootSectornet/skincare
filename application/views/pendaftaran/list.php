
<?php foreach ($pendaftaran as $key => $row): ?>
  <tr>
    <td><?= $row->id_trx_pendaftaran;?></td>
    <td><?= $row->no_rm;?></td>
    <td><?= $row->nama_pasien;?></td>
    <td><?= $row->no_telp;?></td>
    <td><?= $row->keterangan;?></td>
    <td>
      <a href="<?= base_url();?>pendaftaran/pendaftaran/detail/<?= $row->id_trx_pendaftaran;?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Detail Pendaftaran <?= $row->nama_pasien;?>"><i class="fa fa-eye"></i></a>
      <a href="<?= base_url();?>pasien/pasien/detail/<?= $row->id_mst_pasien;?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Detail Pasien <?= $row->nama_pasien;?>"><i class="fa fa-eye"></i></a>
      <a href="<?= base_url();?>pendaftaran/pendaftaran/update/<?= $row->id_trx_pendaftaran;?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit <?= $row->nama_pasien;?>"><i class="fa fa-pencil"></i></a>
      <a href="<?= base_url();?>pendaftaran/pendaftaran/delete/<?= $row->id_trx_pendaftaran;?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus <?= $row->nama_pasien;?>" onclick="return ConfirmDialog()"> <i class="fa fa-trash"></i></a>
    </td>
  </tr>
<?php endforeach ?>

<script type="text/javascript">
  
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  });
</script>