<?php

namespace ericpugh\DubColor\Palette;

interface PaletteInterface {

  /**
   * Get an assoc array of colors i.e. ['name' => 'blue'] keyed by HEX color.
   *
   * @return array
   */
  public static function getColors();

}








