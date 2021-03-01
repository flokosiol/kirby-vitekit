<?php

  snippet('header');

  // import the README file to not repeat myself
  $readme = $kirby->root('base') . '/README.md';
  if (F::exists($readme)) {
    $text = F::read($readme);
    echo $kirby->markdown($text);
  }

  snippet('footer');