<?php

namespace ericpugh\DubColor;

use ericpugh\DubColor\Color;
use ericpugh\DubColor\Palette\Crayola;
use ericpugh\DubColor\Palette\Css3;
use ericpugh\DubColor\Palette\Ncs;

/**
 * Class DubColor
 * @package ericpugh\dub-color
 */
class ColorDubber {

  /**
   * @var array
   */
  public $colors;

  /**
   * @var string
   */
  public $paletteType;

  /**
   * DubColor constructor.
   * @param string $palette_name
   */
  function __construct($palette_name = "") {
    $this->setColorPalette($palette_name);
  }

  /**
   * Get static color data.
   *
   * @param string $palette_name
   *   The palette name.
   */
  public function setColorPalette($palette_name) {
    switch (strtolower($palette_name)) {
      case 'crayola':
        $this->colors = Crayola::$colors;
        $this->paletteType = 'Crayola';
        break;
      case 'css3':
        $this->colors = Css3::$colors;
        $this->paletteType = 'Css3';
        break;
      case 'css4':
        $this->colors = Css3::$colors;
        $this->paletteType = 'Css4';
        break;
      case 'ncs':
        $this->colors = Ncs::$colors;
        $this->paletteType = 'Ncs';
        break;
      default:
        // Set a default color palette.
        $this->colors = Css3::$colors;
        $this->paletteType = 'Css3';
        break;
    }
    return $this;
  }

  /**
   * @return int
   */
  public function countPaletteColors() {
    return count($this->colors);
  }

  /**
   * @param string $hex
   *
   * @return int
   */
  public static function fromHexToInt($hex) {
    return hexdec(ltrim($hex, '#'));
  }

  /**
   * @param int  $color
   * @param bool $prependHash = true
   *
   * @return string
   */
  public static function fromIntToHex($color, $prependHash = true) {
    return ($prependHash ? '#' : '').sprintf('%06X', $color);
  }

  /**
   * @param array $colors
   *   An array of hex colors
   *
   * @return array
   */
  public function hexColorsToInt(array $colors) {
    return array_map(array($this, 'fromHexToInt'), $colors);
  }

  /**
   * Find the the closest matching color in the current color palette
   *
   * @param \ericpugh\DubColor\Color $color
   *   A color object
   *
   * @return string
   *   The closest color as a hex
   */
  public function closestColor(Color $color) {
    // Convert the color palette to an array of Int color values.
    $palette = array_keys($this->colors);
    $searchablePalette = $this->hexColorsToInt($palette);
    // Get the index in the search palette of the closest matching color.
    $matchIndex = $color->getClosestMatch($searchablePalette);
    return self::fromIntToHex($searchablePalette[$matchIndex]);
  }

  /**
   * Get color name from given hex color.
   *
   * @param string $hex
   *   The hex color code.
   *
   * @return mixed
   *   The name of a color as string
   */
  public function getColorName($hex) {
    $hex = strtolower($hex);
    if (isset($this->colors[$hex]) && isset($this->colors[$hex]['name'])) {
      return $this->colors[$hex]['name'];
    }
    else {
      return FALSE;
    }
  }

  /**
   * Get color family from given hex color.
   *
   * @param string $hex
   *   The hex color code.
   *
   * @return mixed
   *   The name of a color as string
   */
  public function getColorFamily($hex) {
    $hex = strtolower($hex);
    if (isset($this->colors[$hex]) && isset($this->colors[$hex]['family'])) {
      return $this->colors[$hex]['family'];
    }
    else {
      return FALSE;
    }
  }

}