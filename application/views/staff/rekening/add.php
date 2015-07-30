<?php
$atas_nama_rekening = array(
  'name' => 'atas_nama_rekening',
  'value' => set_value('atas_nama_rekening'),
  'class' => 'form-control',
  'placeholder' => 'Atas Nama',
  'autocomplete' => 'off',
  );
$no_rekening = array(
  'name' => 'no_rekening',
  'value' => set_value('no_rekening'),
  'class' => 'form-control',
  'placeholder' => 'Nomor Rekening',
  'autocomplete' => 'off',
  );
$bank = array(
  'name' => 'bank',
  'value' => set_value('bank'),
  'class' => 'form-control',
  'placeholder' => 'Bank',
  'autocomplete' => 'off',
  );
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Add Payments - <?php echo $this->config->item('name'); ?></title>
<?php $this->load->view('client/must/head'); ?>
<body class="bs-docs-home">

<?php $this->load->view('client/must/nav'); ?>

<div class="bs-docs-header" id="content" tabindex="-1">
  <div class="container">
    <h1>Add Payments</h1>
  </div>
</div>

<div class="container bs-docs-container">
<div class="row">
	<div class="col-sm-4"></div>
	<div class="col-sm-4">
		<?php echo form_open($this->uri->uri_string()); ?>
		<div class="form-group <?php if (form_error($atas_nama_rekening['name']) == TRUE): ?>has-error<?php endif ?>" <?php if (form_error($atas_nama_rekening['name']) == TRUE): ?>data-container="body" data-toggle="popover" data-placement="right" data-content="<?php echo form_error($atas_nama_rekening['name']); ?>"<?php endif ?>>
			<label for="atas_nama_rekening">Atas Nama</label>
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-user"></i></div>
				<?php echo form_input($atas_nama_rekening); ?>
			</div>
		</div>
		<div class="form-group <?php if (form_error($no_rekening['name']) == TRUE): ?>has-error<?php endif ?>" <?php if (form_error($no_rekening['name']) == TRUE): ?>data-container="body" data-toggle="popover" data-placement="right" data-content="<?php echo form_error($no_rekening['name']); ?>"<?php endif ?>>
			<label for="no_rekening">Nomor Rekening</label>
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></div>
				<?php echo form_input($no_rekening); ?>
			</div>
		</div>
		<div class="form-group <?php if (form_error($bank['name']) == TRUE): ?>has-error<?php endif ?>" <?php if (form_error($bank['name']) == TRUE): ?>data-container="body" data-toggle="popover" data-placement="right" data-content="<?php echo form_error($bank['name']); ?>"<?php endif ?>>
			<label for="bank">Bank</label>
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
				<?php echo form_input($bank); ?>
			</div>
		</div>
      <div class="center">
        <button type="submit" class="btn btn-primary">Submit</button>
        <hr class="half-rule">
        <button class="btn btn-info" href="<?php echo base_url('staff_konfirmasi'); ?>" role="button"><i class="fa fa-chevron-left"></i> Back</button>
      </div>
		<?php echo form_close(); ?>
	</div>
	<div class="col-sm-4"></div>
</div>
</div>

<?php $this->load->view('client/must/footer'); ?>