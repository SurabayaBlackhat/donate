<!DOCTYPE html>
<html lang="en">
<head>
<title>Invalid Verification Email - <?php echo $this->config->item('name'); ?></title>
<?php $this->load->view('client/must/head'); ?>
<body class="bs-docs-home">

<?php $this->load->view('client/must/nav'); ?>

<div class="bs-docs-header" id="content" tabindex="-1">
  <div class="container">
    <h1>Invalid Verification Email</h1>
    <p>You fail to verify your account, may be invalid or your account has been verified beforehand.</p>
  </div>
</div>

<?php $this->load->view('client/must/footer'); ?>