<?php

namespace Flokosiol;

use Kirby\Toolkit\F;
use Kirby\Data\Data;

class Vite {

  /**
   * Check for .lock. file in /src as indicator for development mode
   */
  public static function isDevelopmentMode() {
    $lockFile = kirby()->root('base') . '/src/.lock';
    if (F::exists($lockFile)) {
      return true;
    }
    return false;
  }


  /**
   * Returns manifest data create by Vite.js build
   */
  public static function manifestData() {
    $manifestFile = kirby()->root('index') . '/dist/manifest.json';
    if (F::exists($manifestFile)) {
      return Data::read($manifestFile);
    }
    return '';
  }


  /**
   * Returns production JS file
   */
  public static function jsProductionFiles() {
    $manifestData = Vite::manifestData();
    if (!empty($manifestData['index.js']['file'])) {
      #FIXME: Might be an array of multiple files one day
      return 'dist/' . $manifestData['index.js']['file'];
    }
    return '';
  }


  /**
   * Returns production CSS files
   */
  public static function cssProductionFiles() {
    $manifestData = Vite::manifestData();
    $files = [];
    if (!empty($manifestData['index.js']['css'][0])) {
      foreach ($manifestData['index.js']['css'] as $cssFile) {
        $files[] = 'dist/' . $cssFile;
      }
    }
    return $files;
  }
}