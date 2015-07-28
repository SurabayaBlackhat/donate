<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $this->config->item('name'); ?></title>
<?php $this->load->view('client/must/head'); ?>
<body class="bs-docs-home">

<?php $this->load->view('client/must/nav'); ?>

<main class="bs-docs-masthead" id="content" role="main" tabindex="-1">
  <div class="container">
    <span class="bs-docs-booticon bs-docs-booticon-lg bs-docs-booticon-outline">$</span>
    <p class="lead">This is a program created for the survival of <?php echo $this->config->item('name'); ?>.</p>
    <p class="lead">
      <a href="<?php echo base_url('donate'); ?>" class="btn btn-outline-inverse btn-lg"><i class="fa fa-credit-card"></i> confirmation your donate</a>
    </p>
    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4">
        <?php if ($count_donate != FALSE): ?>
          <span class="btn btn-outline statistics btn-lg">
            <?php echo $count_donate; ?>
          </span>
        <?php else: ?>
          <span class="btn btn-outline statistics btn-lg">
            0
          </span>
        <?php endif ?>
        <p class="des-small">Statistics Donate</p>
      </div>
      <div class="col-sm-4"></div>
    </div>
  </div>
</main>

<?php $this->load->view('client/must/footer'); ?>