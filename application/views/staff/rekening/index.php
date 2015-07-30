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

<div class="container bs-docs-container">
<a style="margin-bottom: 2em;" class="btn btn-success" href="<?php echo base_url('staff_rekening/add'); ?>">Tambah Rekening</a>
<?php if (!empty($payments)): ?>
<table class="table table-hover table-responsive table-bordered">
     <thead>
       <tr>
         <th style="width: 3em;">#</th>
         <th>Atas Nama</th>
         <th>Nomor Rekening</th>
         <th>Bank</th>
         <th>Actions</th>
       </tr>
     </thead>
     <tbody>
     <?php $no = 1; foreach ($payments as $pay): ?>
       <tr>
         <th scope="row"><?php echo $no; ?></th>
         <td><?php echo $pay->atas_nama_rekening; ?></td>
         <td><?php echo $pay->no_rekening; ?></td>
         <td><?php echo $pay->bank; ?></td>
   		  <td class="center">
   		  	<a href="<?php echo base_url('staff_rekening/edit/'.$pay->id_rekening); ?>" class="btn btn-sm btn-primary">Edit</a>
   		  	<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="._modal-<?php echo $pay->id_rekening; ?>">Hapus</button>
   		  </td>
       </tr>
     <?php $no++; endforeach ?>
     </tbody>
   </table>
<?php else: ?>
	<h3>Tidak ada record payment pada halaman ini.</h3>
 <?php endif ?>
</div>

<?php foreach ($payments as $row): ?>
<div class="modal fade _modal-<?php echo $row->id_rekening; ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
  		<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Konfirmasi</h4>
      </div>
  		<div class="modal-body center">
        <p>Apakah anda yakin ingin menghapus data ini?</p>
        <a href="<?php echo base_url('staff_rekening/drop/'.$row->id_rekening); ?>" class="btn btn-sm btn-danger">Iya</a>
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal" aria-label="Close">Tidak</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>

<?php $this->load->view('client/must/footer'); ?>