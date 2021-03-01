<?php if ($site->viteDevelopmentMode()): ?>
  <script type="module" src="<?= $kirby->url() ?>:3000/@vite/client"></script>
  <script type="module" src="<?= $kirby->url() ?>:3000/index.js"></script>
<?php endif ?>