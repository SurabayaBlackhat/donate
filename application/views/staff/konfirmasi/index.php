<!DOCTYPE html>
<html lang="en">
<head>
<title>Konfirmasi - <?php echo $this->config->item('name'); ?></title>
<?php $this->load->view('client/must/head'); ?>
<body class="bs-docs-home">

<?php $this->load->view('client/must/nav'); ?>

<div class="bs-docs-header" id="content" tabindex="-1">
  <div class="container">
    <h1>Konfirmasi</h1>
  </div>
</div>

<div class="container bs-docs-container center">
<?php if (!empty($all)): ?>
<table class="table table-hover table-responsive table-bordered">
	<thead>
		<tr>
			<th>#</th>
			<th>Status</th>
			<th class="center">Atas Nama</th>
			<th class="center">Nomor Rekening</th>
			<th class="center">Owner</th>
			<th class="center">Jumlah</th>
			<th class="center">Berita</th>
			<th class="center">Tanggal</th>
			<th class="center">Ke Rekening</th>
			<th class="center">Struk</th>
			<th class="center">Actions</th>
		</tr>
	</thead>
	<tbody>
	<?php $no = 1; foreach ($all as $row): ?>
		<tr>
			<th scope="row"><?php echo $no; ?></th>
			<td>
			<?php if ($row->status === NULL): ?>
				<span class="label label-warning">PENDING</span>
			<?php elseif ($row->status === 'VALID'): ?>
				<span class="label label-success"><?php echo $row->status; ?></span>
			<?php else: ?>
				<span class="label label-danger"><?php echo $row->status; ?></span>
         	<?php endif ?>
         	</td>
			<td class="center"><?php echo $row->atas_nama_konfirmasi; ?></td>
			<td class="center"><?php echo $row->no_rekening_konfirmasi; ?></td>
			<td class="center"><button type="button" class="btn btn-sm btn-info" data-container="body" data-toggle="popover" data-placement="top" data-content="<?php echo $row->username; ?>"><i class="fa fa-user"></i></button></td>
			<td class="center"><?php echo $row->jumlah; ?></td>
			<td class="center"><button type="button" class="btn btn-sm btn-danger" data-container="body" data-toggle="popover" data-placement="top" data-content="<?php echo $row->berita_rekening; ?>"><i class="fa fa-newspaper-o"></i></button></td>
         	<td class="center"><button type="button" class="btn btn-sm btn-success" data-container="body" data-toggle="popover" data-placement="top" data-content="<?php echo $this->lib->dateAndHourStripe($row->tanggal_waktu); ?>"><i class="fa fa-calendar-o"></i></button></td>
         	<td class="center"><button type="button" class="btn btn-sm btn-info" data-toggle="popover" title="Ke Rekening" data-placement="top" data-content="<?php echo $row->bank; ?> ─ <?php echo $row->no_rekening; ?> ─ <?php echo $row->atas_nama_rekening; ?>"><i class="fa fa-credit-card"></i></button></td>
         	<td class="center"><a class="btn btn-sm btn-primary" href="<?php echo base_url('staff_konfirmasi/struk/'.$row->id_konfirmasi); ?>"><i class="fa fa-external-link"></i></a></td>
         	<td class="center">
         		<a href="<?php echo base_url('staff_konfirmasi/edit/'.$row->id_konfirmasi); ?>" class="btn btn-sm btn-primary">Edit</a>
         		<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="._modal-<?php echo $row->id_konfirmasi; ?>">Hapus</button>
         	</td>
        </tr>
    <?php $no++; endforeach ?>
    </tbody>
</table>
<?php endif ?>
</div>

<?php if (!empty($all)): ?>
<?php foreach ($all as $row): ?>
<div class="modal fade _modal-<?php echo $row->id_konfirmasi; ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
		<div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title">Konfirmasi</h4>
        </div>
		<div class="modal-body center">
          <p>Apakah anda yakin ingin menghapus data ini?</p>
          <a href="<?php echo base_url('staff_konfirmasi/drop/'.$row->id_konfirmasi); ?>" class="btn btn-sm btn-danger">Iya</a>
          <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal" aria-label="Close">Tidak</button>
        </div>
    </div>
  </div>
</div>
<?php endforeach ?>
<?php endif ?>

<?php $this->load->view('client/must/footer'); ?>