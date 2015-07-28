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
  'class' => 'form-control',
  'placeholder' => 'Password',
  'autocomplete' => 'off'
  );
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login - <?php echo $this->config->item('name'); ?></title>
<?php $this->load->view('client/must/head'); ?>
<body class="bs-docs-home">

<?php $this->load->view('client/must/nav'); ?>

<div class="bs-docs-header" id="content" tabindex="-1">
  <div class="container">
    <h1>Please login</h1>
    <p>The data needed to validate entry to <?php echo $this->config->item('name'); ?>.</p>
      <hr class="half-rule">
      <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
        <?php if (isset($error)): ?>
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p class="must-txt"><?php echo $error; ?></p>
          </div>
        <?php endif ?>
        <?php echo form_open($this->uri->uri_string()); ?>
          <div class="form-group <?php if (isset($error) || form_error($username['name']) == TRUE): ?>has-error<?php endif ?>" <?php if (form_error($username['name']) == TRUE): ?>data-container="body" data-toggle="popover" data-placement="right" data-content="<?php echo form_error($username['name']); ?>"<?php endif ?>>
            <label for="username">Username</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-user"></i></div>
              <?php echo form_input($username); ?>
            </div>
          </div>
          <div class="form-group <?php if (isset($error) || form_error($password['name']) == TRUE): ?>has-error<?php endif ?>" <?php if (form_error($password['name']) == TRUE): ?>data-container="body" data-toggle="popover" data-placement="right" data-content="<?php echo form_error($password['name']); ?>"<?php endif ?>>
            <label for="password">Password</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-key"></i></div>
              <?php echo form_password($password); ?>
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
  </div>
</div>

<?php $this->load->view('client/must/footer'); ?>