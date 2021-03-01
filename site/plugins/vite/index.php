<?php

load([
  'flokosiol\\vite' => 'src/Vite.php',
], __DIR__);

Kirby::plugin('flokosiol/vite', [
  'snippets' => [
    'vite/development' => __DIR__ . '/snippets/development.php',
    'vite/styles' => __DIR__ . '/snippets/styles.php',
    'vite/scripts' => __DIR__ . '/snippets/scripts.php',
  ],
  'siteMethods' => [
    'viteDevelopmentMode' => function() {
      return Flokosiol\Vite::isDevelopmentMode();
    },
    'viteCssProductionFiles' => function() {
      return Flokosiol\Vite::cssProductionFiles();
    },
    'viteJsProductionFiles' => function() {
      return Flokosiol\Vite::jsProductionFiles();
    },
  ],
]);
