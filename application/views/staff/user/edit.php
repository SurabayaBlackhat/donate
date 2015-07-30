<?php foreach ($id as $row): ?>
<?php
$username = array(
  'name' => 'username',
  'value' => $row->username,
  'class' => 'form-control',
  'placeholder' => 'Username',
  'autocomplete' => 'off',
  );
$email = array(
  'name' => 'email',
  'value' => $row->email,
  'class' => 'form-control',
  'placeholder' => 'Email',
  'autocomplete' => 'off',
  );
$nama_user = array(
  'name' => 'nama_user',
  'value' => $row->nama_user,
  'class' => 'form-control',
  'placeholder' => 'Nama',
  'autocomplete' => 'off',
  );
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Edit Users - <?php echo $this->config->item('name'); ?></title>
<?php $this->load->view('client/must/head'); ?>
<body class="bs-docs-home">

<?php $this->load->view('client/must/nav'); ?>

<div class="bs-docs-header" id="content" tabindex="-1">
  <div class="container">
    <h1>Edit Users</h1>
  </div>
</div>

<div class="container bs-docs-container">
<div class="row">
	<div class="col-sm-4"></div>
	<div class="col-sm-4">
		<?php echo form_open($this->uri->uri_string()); ?>
		<div class="form-group <?php if (form_error($username['name']) == TRUE): ?>has-error<?php endif ?>" <?php if (form_error($username['name']) == TRUE): ?>data-container="body" data-toggle="popover" data-placement="right" data-content="<?php echo form_error($username['name']); ?>"<?php endif ?>>
			<label for="username">Username</label>
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-user"></i></div>
				<?php echo form_input($username); ?>
			</div>
		</div>
		<div class="form-group <?php if (form_error($email['name']) == TRUE): ?>has-error<?php endif ?>" <?php if (form_error($email['name']) == TRUE): ?>data-container="body" data-toggle="popover" data-placement="right" data-content="<?php echo form_error($email['name']); ?>"<?php endif ?>>
			<label for="email">Email</label>
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-user"></i></div>
				<?php echo form_input($email); ?>
			</div>
		</div>
		<div class="form-group <?php if (form_error($nama_user['name']) == TRUE): ?>has-error<?php endif ?>" <?php if (form_error($nama_user['name']) == TRUE): ?>data-container="body" data-toggle="popover" data-placement="right" data-content="<?php echo form_error($nama_user['name']); ?>"<?php endif ?>>
			<label for="nama_user">Nama</label>
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-user"></i></div>
				<?php echo form_input($nama_user); ?>
			</div>
		</div>
	    <div class="form-group <?php if (form_error('role') == TRUE): ?>has-error<?php endif ?>" <?php if (form_error('role') == TRUE): ?>data-container="body" data-toggle="popover" data-placement="right" data-content="<?php echo form_error('role'); ?>"<?php endif ?>>
	      <label for="role">Role</label>
	      <select name="role" class="form-control">
	          <option value="<?php echo $row->id_role; ?>" <?php echo set_select('role', $row->id_role, TRUE); ?>><?php echo $row->nama_role; ?></option>
	          <optgroup label="Role">
	            <?php foreach ($role as $role): ?>
	              <option value="<?php echo $role->id_role; ?>" <?php echo set_select('role', $role->id_role); ?>><?php echo $role->nama_role; ?></option>
	            <?php endforeach ?>
	          </optgroup>
	      </select>
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
<?php endforeach ?>