<header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
  <div class="container">
      <div class="navbar-header">
        <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-navbar" aria-controls="bs-navbar" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="<?php echo base_url(); ?>" class="navbar-brand"><?php echo $this->config->item('name'); ?> - Donate</a>
      </div>
      <nav id="bs-navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <?php if ($this->lib->id_user() && $this->lib->username()): ?>
            <?php foreach ($this->lib->record() as $user): ?>
              <li class="dropdown">
                <a id="drop-nav" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <?php echo $user->nama_user; ?>
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="drop-nav">
                  <li><a href="<?php echo base_url('sbh/howto'); ?>"><i class="fa fa-question-circle"></i> How to?</a></li>
                  <li><a href="<?php echo base_url('sbh'); ?>"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                  <li><a href="<?php echo base_url('sbh/payment'); ?>"><i class="fa fa-credit-card"></i> Payment</a></li>
                  <li><a href="<?php echo base_url('sbh/logout'); ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
                  <?php if ($this->lib->role() === '1'): ?>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Administrator</li>
                    <li><a href="<?php echo base_url('staff_konfirmasi'); ?>">Konfirmasi</a></li>
                    <li><a href="<?php echo base_url('staff_user'); ?>">User</a></li>
                    <li><a href="<?php echo base_url('staff_rekening'); ?>">Rekening</a></li>
                  <?php endif ?>
                </ul>
              </li>
            <?php endforeach ?>
          <?php else: ?>
            <li><a href="<?php echo base_url('sbh/login'); ?>"><i class="fa fa-sign-in"></i> Login</a></li>
            <li><a href="<?php echo base_url('sbh/register'); ?>"><i class="fa fa-user-plus"></i> Register</a></li>
          <?php endif ?>
        </ul>
      </nav>
  </div>
</header>