<?php foreach ($this->lib->record() as $user): ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>How to - <?php echo $this->config->item('name'); ?></title>
<?php $this->load->view('client/must/head'); ?>
<body class="bs-docs-home">

<?php $this->load->view('client/must/nav'); ?>

<div class="bs-docs-header" id="content" tabindex="-1">
  <div class="container">
    <h1>How to?</h1>
  </div>
</div>

<div class="container bs-docs-container center">
	<div class="alert alert-success" role="alert">
      <strong class="center" style="display: block;margin-bottom: 2em;font-size: 1.5em;">Cara melakukan donasi ke Surabaya Blackhat</strong>
      <b>Pengguna Rekening</b>
      <ul class="left">
      	<li>Pilih salah satu rekening <a href="<?php echo base_url('sbh/payment'); ?>">disini</a>.</li>
      	<li>Kamu ke ATM kemudian transfer seperti biasanya ke rekening yang sudah kamu pilih diatas.</li>
      	<li>Jangan dibuang struk/buktinya.</li>
      	<li>Terus di foto struk/buktinya.</li>
      	<li>Kamu login lagi kesini kemudian konfirmasi <a href="<?php echo base_url('donate'); ?>">kesini</a>.</li>
      	<li>Pada langkah selanjutnya kamu baru bisa upload struk/buktinya.</li>
      	<li>Kenapa harus pake struk? Karena mempercepat validasi, walaupun dihistory record ada keterangannya.</li>
      	<li>Untuk pengguna mBanking & iBanking sebagai gantinya Hard copy struknya kamu bisa screenshot hasil history transaksi transfer.</li>
      </ul>
      <b style="display: block;margin-top: 3em;">Tidak Memiliki Rekening?</b>
      <ul class="left">
      	<li>Pilih salah satu rekening <a href="<?php echo base_url('sbh/payment'); ?>">disini</a>.</li>
      	<li>Kamu ke Indomart atau Alfamart atau bisa juga ke agent pengiriman uang di daerahmu.</li>
      	<li>Terus bilang aja gini "Mau transfer uang ke rekening orang", nanti pihak sana pasti paham maksud tujuan kamu.</li>
      	<li>Kemudian kasihkan saja data rekening yang sudah kamu pilih pada step pertama, dan kamu sudah tentuin dulu jumlah uangnya yang mau ditransfer berapa.</li>
      	<li>Kasihkan deh uangnya.</li>
      	<li>Kemudian kamu minta struk/buktinya pasti ada.</li>
      	<li>Terus di foto struk/buktinya.</li>
      	<li>Kamu login lagi kesini kemudian konfirmasi <a href="<?php echo base_url('donate'); ?>">kesini</a>.</li>
      	<li>Pada langkah selanjutnya kamu baru bisa upload struk/buktinya.</li>
      </ul>
  </div>
</div>

<?php $this->load->view('client/must/footer'); ?>
<?php endforeach ?>