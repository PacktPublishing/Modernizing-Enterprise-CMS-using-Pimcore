<?php

$this->websiteConfig();

$footerText=$this->websiteConfig('Footer');
?>

<footer class="page-footer fixed-bottom">
  <div class=" text-center text-uppercase">
  © <?php echo date("Y"); ?> - <?= $footerText ?>
  </div>
</footer>