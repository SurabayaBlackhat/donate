<!DOCTYPE html>
<html lang="en">
<head>
<title>Payments - <?php echo $this->config->item('name'); ?></title>
<?php $this->load->view('client/must/head'); ?>
<body class="bs-docs-home">

<?php $this->load->view('client/must/nav'); ?>

<div class="bs-docs-header" id="content" tabindex="-1">
  <div class="container">
    <h1>Payments</h1>
  </div>
</div>

<div class="container bs-docs-container center">
	<?php if (!empty($payments)): ?>
	<table class="table table-hover table-responsive table-bordered">
      <thead>
        <tr>
          <th style="width: 3em;">#</th>
          <th>Atas Nama</th>
          <th>Nomor Rekening</th>
          <th>Bank</th>
        </tr>
      </thead>
      <tbody>
      <?php $no = 1; foreach ($payments as $pay): ?>
        <tr>
          <th scope="row"><?php echo $no; ?></th>
          <td><?php echo $pay->atas_nama_rekening; ?></td>
          <td><?php echo $pay->no_rekening; ?></td>
          <td><?php echo $pay->bank; ?></td>
        </tr>
      <?php $no++; endforeach ?>
      </tbody>
    </table>
	<?php else: ?>
		<h3>Tidak ada record payment pada halaman ini.</h3>
    <?php endif ?>
</div>

<?php $this->load->view('client/must/footer'); ?>