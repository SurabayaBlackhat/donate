<!DOCTYPE html>
<html lang="en">
<head>
<title>Users - <?php echo $this->config->item('name'); ?></title>
<?php $this->load->view('client/must/head'); ?>
<body class="bs-docs-home">

<?php $this->load->view('client/must/nav'); ?>

<div class="bs-docs-header" id="content" tabindex="-1">
  <div class="container">
    <h1>Users</h1>
  </div>
</div>

<div class="container bs-docs-container">
<?php if (!empty($users)): ?>
<table class="table table-hover table-responsive table-bordered">
  <thead>
    <tr>
      <th style="width: 3em;">#</th>
      <th>Username</th>
      <th>Email</th>
      <th>Nama</th>
      <th>Role</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php $no = 1; foreach ($users as $usr): ?>
    <tr>
      <th scope="row"><?php echo $no; ?></th>
      <td><?php echo $usr->username; ?></td>
      <td><?php echo $usr->email; ?></td>
      <td><?php echo $usr->nama_user; ?></td>
      <td class="center">
        <?php if ($usr->id_role === '1'): ?>
          <span class="label label-success"><?php echo $usr->nama_role; ?></span>
        <?php else: ?>
          <span class="label label-primary"><?php echo $usr->nama_role; ?></span>
        <?php endif ?>
      </td>
      <td class="center">
        <a href="<?php echo base_url('staff_user/edit/'.$usr->id_user); ?>" class="btn btn-sm btn-primary">Edit</a>
        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="._modal-<?php echo $usr->id_user; ?>">Hapus</button>
      </td>
    </tr>
  <?php $no++; endforeach ?>
  </tbody>
</table>
  <?php echo $pages; ?>
<?php else: ?>
  <h3>Tidak ada record payment pada halaman ini.</h3>
<?php endif ?>
</div>

<?php foreach ($users as $row): ?>
<div class="modal fade _modal-<?php echo $row->id_user; ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
  		<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Konfirmasi</h4>
      </div>
  		<div class="modal-body center">
        <p>Apakah anda yakin ingin menghapus data ini?</p>
        <a href="<?php echo base_url('staff_user/drop/'.$row->id_user); ?>" class="btn btn-sm btn-danger">Iya</a>
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal" aria-label="Close">Tidak</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>

<?php $this->load->view('client/must/footer'); ?>