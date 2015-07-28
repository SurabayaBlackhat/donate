<?php foreach ($this->lib->record() as $user): ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Dashboard - <?php echo $this->config->item('name'); ?></title>
<?php $this->load->view('client/must/head'); ?>
<body class="bs-docs-home">

<?php $this->load->view('client/must/nav'); ?>

<div class="bs-docs-header" id="content" tabindex="-1">
  <div class="container">
    <h1>Dashboard Account</h1>
    <p>Welcome back <?php echo $user->nama_user; ?>.</p>
  </div>
</div>

<div class="container bs-docs-container center">
	<h2 class="bs-docs-featurette-title">Your Donate</h2>
	<p class="lead">Terima kasih telah berdonasi ke <?php echo $this->config->item('name'); ?>.</p>
	<div class="row">
		<div class="col-sm-4">
			<span style="padding: 15px 30px;font-size: 5em;" class="btn btn-outline btn-lg">
				<?php if ($my_donate != FALSE): ?>
					<?php echo $my_donate; ?>
				<?php else: ?>
					0
				<?php endif ?>
			</span>
			<p class="des-small">Jumlah keseluruhan donasi anda.</p>
		</div>
		<div class="col-sm-4">
			<span style="padding: 15px 30px;font-size: 5em;" class="btn btn-outline btn-lg">
				<?php if ($valid_donate != FALSE): ?>
					<?php echo $valid_donate; ?>
				<?php else: ?>
					0
				<?php endif ?>
			</span>
			<p class="des-small">Jumlah donasi anda yang diterima.</p>
		</div>
		<div class="col-sm-4">
			<span style="padding: 15px 30px;font-size: 5em;" class="btn btn-outline btn-lg">
				<?php if ($invalid_donate != FALSE): ?>
					<?php echo $invalid_donate; ?>
				<?php else: ?>
					0
				<?php endif ?>
			</span>
			<p class="des-small">Jumlah donasi anda yang tidak sah.</p>
		</div>
	</div>
	<?php if (!empty($donate)): ?>
	<table class="table table-hover table-responsive table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Atas Nama</th>
          <th class="center">Nomor Rekening</th>
          <th class="center">Jumlah</th>
          <th class="center">Status</th>
          <th class="center">Details</th>
        </tr>
      </thead>
      <tbody>
      <?php $no = 1; foreach ($donate as $don): ?>
        <tr>
          <th scope="row"><?php echo $no; ?></th>
          <td><?php echo $don->atas_nama_konfirmasi; ?></td>
          <td class="center"><?php echo $don->no_rekening_konfirmasi; ?></td>
          <td class="center"><?php echo $don->jumlah; ?></td>
          <td class="center">
          	<?php if ($don->status === NULL): ?>
          		<span class="label label-warning">PENDING</span>
          	<?php elseif ($don->status === 'VALID'): ?>
          		<span class="label label-success"><?php echo $don->status; ?></span>
          	<?php else: ?>
          		<span class="label label-danger"><?php echo $don->status; ?></span>
          	<?php endif ?>
          </td>
          <td class="center"><a class="btn btn-sm btn-primary" href="<?php echo base_url('sbh/struk/'.$don->hash); ?>"><i class="fa fa-external-link"></i></a></td>
        </tr>
      <?php $no++; endforeach ?>
      </tbody>
    </table>
	<?php else: ?>
		<h3>Tidak ada record donate pada akun anda.</h3>
  <?php endif ?>
</div>

<?php $this->load->view('client/must/footer'); ?>
<?php endforeach ?>