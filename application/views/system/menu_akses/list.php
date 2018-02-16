
<?php foreach ($menu_akses as $key => $row): ?>
  <tr>
    <td><?= $key + 1;?></td>
    <td><?= $row->menu;?></td>
    <td><?= $row->create;?></td>
    <td><?= $row->update;?></td>
    <td><?= $row->delete;?></td>
    <td>
      <a href="<?= base_url();?>sistem/system/update_menu_akses/<?= $row->id_menu_akses;?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit <?= $row->menu;?>"><i class="fa fa-pencil"></i> Edit</a>
      <a href="<?= base_url();?>sistem/system/delete_menu_akses/<?= $row->id_menu_akses;?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Edit <?= $row->menu;?>" onclick="return ConfirmDialog()"> <i class="fa fa-trash"></i> Delete</a>
    </td>
  </tr>
<?php endforeach ?>