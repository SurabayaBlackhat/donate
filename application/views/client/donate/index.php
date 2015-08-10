<?php
$atas_nama_konfirmasi = array(
  'name' => 'atas_nama_konfirmasi',
  'value' => set_value('atas_nama_konfirmasi'),
  'class' => 'form-control',
  'placeholder' => 'Atas Nama',
  'autocomplete' => 'off',
  );
$no_rekening_konfirmasi = array(
  'name' => 'no_rekening_konfirmasi',
  'value' => set_value('no_rekening_konfirmasi'),
  'class' => 'form-control',
  'placeholder' => 'Nomor Rekening',
  'autocomplete' => 'off',
  );
$jumlah = array(
  'name' => 'jumlah',
  'value' => set_value('jumlah'),
  'class' => 'form-control',
  'placeholder' => 'Jumlah',
  'autocomplete' => 'off',
  );
$berita_rekening = array(
  'name' => 'berita_rekening',
  'value' => set_value('berita_rekening'),
  'class' => 'form-control',
  'placeholder' => 'Berita',
  'autocomplete' => 'off',
  'rows' => 3,
  );
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Confirmation Donate - <?php echo $this->config->item('name'); ?></title>
<?php $this->load->view('client/must/head'); ?>
<body class="bs-docs-home">

<?php $this->load->view('client/must/nav'); ?>

<div class="bs-docs-header" id="content" tabindex="-1">
  <div class="container">
    <h1>Confirmation Donate</h1>
    <?php if (!$this->lib->donate()): ?>
    <p>The data needed to validate apply to <?php echo $this->config->item('name'); ?>.</p>
      <hr class="half-rule">
      <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
        <?php echo form_open($this->uri->uri_string()); ?>
          <div class="form-group <?php if (form_error($atas_nama_konfirmasi['name']) == TRUE): ?>has-error<?php endif ?>" <?php if (form_error($atas_nama_konfirmasi['name']) == TRUE): ?>data-container="body" data-toggle="popover" data-placement="right" data-content="<?php echo form_error($atas_nama_konfirmasi['name']); ?>"<?php endif ?>>
            <label for="atas_nama_konfirmasi">Atas Nama</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-user"></i></div>
              <?php echo form_input($atas_nama_konfirmasi); ?>
            </div>
          </div>
          <div class="form-group <?php if (form_error($no_rekening_konfirmasi['name']) == TRUE): ?>has-error<?php endif ?>" <?php if (form_error($no_rekening_konfirmasi['name']) == TRUE): ?>data-container="body" data-toggle="popover" data-placement="right" data-content="<?php echo form_error($no_rekening_konfirmasi['name']); ?>"<?php endif ?>>
            <label for="no_rekening_konfirmasi">Nomor Rekening</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></div>
              <?php echo form_input($no_rekening_konfirmasi); ?>
            </div>
          </div>
          <div class="form-group <?php if (form_error($jumlah['name']) == TRUE): ?>has-error<?php endif ?>" <?php if (form_error($jumlah['name']) == TRUE): ?>data-container="body" data-toggle="popover" data-placement="right" data-content="<?php echo form_error($jumlah['name']); ?>"<?php endif ?>>
            <label for="jumlah">Jumlah</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-money"></i></div>
              <?php echo form_input($jumlah); ?>
            </div>
          </div>
          <div class="form-group <?php if (form_error($berita_rekening['name']) == TRUE): ?>has-error<?php endif ?>" <?php if (form_error($berita_rekening['name']) == TRUE): ?>data-container="body" data-toggle="popover" data-placement="right" data-content="<?php echo form_error($berita_rekening['name']); ?>"<?php endif ?>>
            <label for="berita_rekening">Berita</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
              <?php echo form_textarea($berita_rekening); ?>
            </div>
          </div>
          <div class="form-group <?php if (form_error('ke_rekening') == TRUE): ?>has-error<?php endif ?>" <?php if (form_error('ke_rekening') == TRUE): ?>data-container="body" data-toggle="popover" data-placement="right" data-content="<?php echo form_error('ke_rekening'); ?>"<?php endif ?>>
            <label for="ke_rekening">Ke Rekening</label>
            <select name="ke_rekening" class="form-control">
                <option value="" <?php echo set_select('ke_rekening', '', TRUE); ?>>--- Pilih Rekening Tujuan ---</option>
              <?php foreach ($rekening as $rek): ?>
                <option value="<?php echo $rek->id_rekening; ?>" <?php echo set_select('ke_rekening', $rek->id_rekening); ?>><?php echo $rek->bank .' - '. $rek->atas_nama_rekening; ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="center">
            <button type="submit" class="btn btn-default">Submit</button>
          </div>
        <?php echo form_close(); ?>
        <hr class="half-rule">
        </div>
        <div class="col-sm-4"></div>
      </div>
    <?php else: ?>
    <p>You have successfully signed up an account, please check your email.</p>
    <?php endif ?>
  </div>
</div>

<?php $this->load->view('client/must/footer'); ?>