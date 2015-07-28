<?php foreach ($array_hash as $row): ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Upload Struk - <?php echo $this->config->item('name'); ?></title>
<?php $this->load->view('client/must/head'); ?>
<body class="bs-docs-home">

<?php $this->load->view('client/must/nav'); ?>

<div class="bs-docs-header" id="content" tabindex="-1">
  <div class="container">
    <h1>Upload Struk</h1>
  </div>
</div>

<div class="container bs-docs-container">
<div class="col-xs-6">
<table class="table table-hover table-responsive table-bordered">
  <thead>
    <tr>
      <th>Information</th>
      <th>Value</th>
    </tr>
  </thead>
  <tbody>
  <?php $no = 1; ?>
    <tr>
      <td>Atas Nama</td>
      <td><?php echo $row->atas_nama_konfirmasi; ?></td>
    </tr>
    <tr>
      <td>Nomor Rekening</td>
      <td><?php echo $row->no_rekening_konfirmasi; ?></td>
    </tr>
    <tr>
      <td>Jumlah</td>
      <td><?php echo $row->jumlah; ?></td>
    </tr>
    <tr>
      <td>Berita</td>
      <td><button type="button" class="btn btn-sm btn-danger" data-container="body" data-toggle="popover" data-placement="top" data-content="<?php echo $row->berita_rekening; ?>"><i class="fa fa-newspaper-o"></i></button></td>
    </tr>
    <tr>
      <td>Status</td>
      <td>
        <?php if ($row->status === NULL): ?>
          <span class="label label-warning">PENDING</span>
        <?php elseif ($row->status === 'VALID'): ?>
          <span class="label label-success"><?php echo $row->status; ?></span>
        <?php else: ?>
          <span class="label label-danger"><?php echo $row->status; ?></span>
        <?php endif ?>
      </td>
    </tr>
    <tr>
      <td>Tanggal</td>
      <td><?php echo $this->lib->dateAndHourIcon($row->tanggal_waktu); ?></td>
    </tr>
    <tr>
      <td>Ke Rekening</td>
      <td><button type="button" class="btn btn-sm btn-info" data-toggle="popover" title="Ke Rekening" data-placement="top" data-content="<?php echo $row->bank; ?> ─ <?php echo $row->no_rekening; ?> ─ <?php echo $row->atas_nama_rekening; ?>"><i class="fa fa-credit-card"></i></button></td>
    </tr>
  <?php $no++; ?>
  </tbody>
</table>
<div class="center">
  <button onclick="goBack()" class="btn btn-primary" role="button"><i class="fa fa-chevron-left"></i> Back</button>
</div>
<script>
function goBack() {
    window.history.back();
}
</script>
</div>
<div class="col-xs-6">
<?php if ($count_image === 1): ?>
<?php foreach ($gambar as $img): ?>
  <img src="<?php echo base_url('assets/images/struk/'.$img->gambar); ?>" alt="..." class="img-rounded">
<?php endforeach ?>
<?php elseif ($count_image === 2): ?>
<?php foreach ($gambar as $img): ?>
  <img src="<?php echo base_url('assets/images/struk/'.$img->gambar); ?>" alt="..." class="img-rounded">
<?php endforeach ?>
<?php else: ?>
<?php echo form_open_multipart('sbh/struk_ajax/'.$row->hash, 'class="dropzone" id="DZid"'); ?>
  <div id="DZpreviews" style="text-align:center;"></div>
  <div class="dz-message" data-dz-message>
    <i class="fa fa-cloud-upload" style="font-size: 4em;"></i>
    <br>
    Drop files here or click to upload.
    <span class="note">Maximum size of 1 MB and 2 item images than has a <b>PNG</b>, <b>JPG</b>, <b>JPEG</b>, <b>GIF.</b> extension</span>
  </div>
<?php echo form_close(); ?>
<?php endif ?>
</div>
</div>

<?php $this->load->view('client/must/footer'); ?>
<?php endforeach ?>