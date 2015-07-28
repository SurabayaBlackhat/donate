<?php if (!$this->lib->register()): ?>
<?php
$username = array(
  'name' => 'username',
  'value' => set_value('username'),
  'class' => 'form-control',
  'placeholder' => 'Username',
  'autocomplete' => 'off'
  );
$password = array(
  'name' => 'password',
  'value' => set_value('password'),
  'class' => 'form-control',
  'placeholder' => 'Password',
  'autocomplete' => 'off'
  );
$email = array(
  'name' => 'email',
  'value' => set_value('email'),
  'class' => 'form-control',
  'placeholder' => 'Email',
  'autocomplete' => 'off'
  );
$nama_user = array(
  'name' => 'nama_user',
  'value' => set_value('nama_user'),
  'class' => 'form-control',
  'placeholder' => 'Nama',
  'autocomplete' => 'off'
  );
?>
<?php endif ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Register Account - <?php echo $this->config->item('name'); ?></title>
<?php $this->load->view('client/must/head'); ?>
<body class="bs-docs-home">

<?php $this->load->view('client/must/nav'); ?>

<div class="bs-docs-header" id="content" tabindex="-1">
  <div class="container">
    <h1>Register Account</h1>
    <?php if (!$this->lib->register()): ?>
    <p>The data needed to validate apply to <?php echo $this->config->item('name'); ?>.</p>
      <hr class="half-rule">
      <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
        <?php if (isset($error_username)): ?>
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p class="must-txt"><?php echo $error_username; ?></p>
          </div>
        <?php endif ?>
        <?php if (isset($error_email)): ?>
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p class="must-txt"><?php echo $error_email; ?></p>
          </div>
        <?php endif ?>
        <?php echo form_open($this->uri->uri_string()); ?>
          <div class="form-group <?php if (isset($error_username) || form_error($username['name']) == TRUE): ?>has-error<?php endif ?>" <?php if (form_error($username['name']) == TRUE): ?>data-container="body" data-toggle="popover" data-placement="right" data-content="<?php echo form_error($username['name']); ?>"<?php endif ?>>
            <label for="username">Username</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-user"></i></div>
              <?php echo form_input($username); ?>
            </div>
          </div>
          <div class="form-group <?php if (form_error($password['name']) == TRUE): ?>has-error<?php endif ?>" <?php if (form_error($password['name']) == TRUE): ?>data-container="body" data-toggle="popover" data-placement="right" data-content="<?php echo form_error($password['name']); ?>"<?php endif ?>>
            <label for="password">Password</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-key"></i></div>
              <?php echo form_password($password); ?>
            </div>
          </div>
          <div class="form-group <?php if (isset($error_email) || form_error($email['name']) == TRUE): ?>has-error<?php endif ?>" <?php if (form_error($email['name']) == TRUE): ?>data-container="body" data-toggle="popover" data-placement="right" data-content="<?php echo form_error($email['name']); ?>"<?php endif ?>>
            <label for="email">Email</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
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