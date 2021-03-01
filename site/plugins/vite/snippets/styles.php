<?php
  if (!$site->viteDevelopmentMode()) {
    echo css($site->viteCssProductionFiles());
  }