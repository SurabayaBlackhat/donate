<?php foreach ($id as $row): ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Struk Konfirmasi - <?php echo $this->config->item('name'); ?></title>
<?php $this->load->view('client/must/head'); ?>
<body class="bs-docs-home">

<?php $this->load->view('client/must/nav'); ?>

<div class="bs-docs-header" id="content" tabindex="-1">
  <div class="container">
    <h1>Struk Konfirmasi</h1>
    <p><?php echo $row->atas_nama_konfirmasi; ?> - <?php echo $row->no_rekening_konfirmasi; ?></p>
  </div>
</div>

<div class="container bs-docs-container center">
<div class="row">
<?php foreach ($gambar as $img): ?>
	<div class="col-xs-6">
		<img src="<?php echo base_url('assets/images/struk/'.$img->gambar); ?>" class="img-rounded">
	</div>
<?php endforeach ?>
</div>
<div class="center">
  <button onclick="goBack()" class="btn btn-primary" role="button"><i class="fa fa-chevron-left"></i> Back</button>
</div>
</div>

<?php $this->load->view('client/must/footer'); ?>
<?php endforeach ?>