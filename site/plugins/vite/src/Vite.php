<?php

namespace Flokosiol;

use Exception;
use Kirby\Toolkit\F;
use Kirby\Data\Data;

class Vite {
  /**
   * Check for .lock. file in /src as indicator for development mode
   */
  public static function isDevelopmentMode() {
    $lockFile = kirby()->root('base') . '/src/.lock';

    return F::exists($lockFile);
  }


  /**
   * Returns manifest data create by Vite.js build
   */
  public static function manifestData() {
    $manifestFile = kirby()->root('index') . '/dist/manifest.json';

    if (!F::exists($manifestFile)) {
      throw new Exception('Build assets not found, run `npm run build`.');
    }

    return Data::read($manifestFile);
  }


  /**
   * Returns production JS file
   */
  public static function jsProductionFiles() {
    if (static::isDevelopmentMode()) {
      return null;
    }

    $entry = static::manifestData()['index.js']['file'];

    # FIXME: Might be an array of multiple files one day
    return !empty($entry)
      ? 'dist/' . $entry
      : null;
  }


  /**
   * Returns production CSS files
   */
  public static function cssProductionFiles() {
    if (static::isDevelopmentMode()) {
      return null;
    }

    $entries = static::manifestData()['index.js']['css'];
    $files = [];

    if (!empty($entries[0])) {
      foreach ($entries as $entry) {
        $files[] = 'dist/' . $entry;
      }
    }

    return $files;
  }
}
