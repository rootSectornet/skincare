
<?php foreach ($group_akses as $key => $row): ?>
  <tr>
    <td><?= $key + 1;?></td>
    <td><?= $row->nama_pegawai;?></td>
    <td>
      <a href="<?= base_url();?>sistem/system/update_group_akses/<?= $row->id_group_acces;?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i> Edit</a>
      <a href="<?= base_url();?>sistem/system/delete_group_akses/<?= $row->id_group_acces;?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return ConfirmDialog()"> <i class="fa fa-trash"></i> Delete</a>
    </td>
  </tr>
<?php endforeach ?>