<?php
  if (!$site->viteDevelopmentMode()) {
    echo js($site->viteJsProductionFiles(), ['type' => 'module']);
  }