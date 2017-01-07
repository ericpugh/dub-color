<?php

namespace ericpugh\DubColor;

use ericpugh\DubColor\Color;
use ericpugh\DubColor\Palette\Css3;

/**
 * Class DubColor
 * @package ericpugh\dub-color
 */
class ColorDubber {

  /**
   * @var array
   */
  public $colorPalette;

  /**
   * DubColor constructor.
   * @param array $colorPalette
   *   Color Palette array
   */
  function __construct($colorPalette = []) {
    if (empty($colorPalette)) {
      // Set a default color palette.
      $colorPalette = Css3::getColors();
    }
    $this->setColorPalette($colorPalette);
  }

  /**
   * Get color palette data.
   */
  public function getColorPalette() {
    return $this->colorPalette;
  }

  /**
   * Set color palette data.
   *
   * @param array $palette
   */
  public function setColorPalette($palette) {
    $this->colorPalette = $palette;
  }

  /**
   * @return int
   */
  public function countColorPalette() {
    return count($this->colorPalette);
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
    $palette = array_keys($this->colorPalette);
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
    if (isset($this->colorPalette[$hex]) && isset($this->colorPalette[$hex]['name'])) {
      return $this->colorPalette[$hex]['name'];
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
    if (isset($this->colorPalette[$hex]) && isset($this->colorPalette[$hex]['family'])) {
      return $this->colorPalette[$hex]['family'];
    }
    else {
      return FALSE;
    }
  }

}