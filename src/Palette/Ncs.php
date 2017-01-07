<?php

namespace ericpugh\DubColor\Palette;

/**
 * Class Ncs
 *   The Natural Color System colors.
 * @package ericpugh\dub-color
 */
final class Ncs implements PaletteInterface {

  /**
   * @return array
   */
  public static function getColors() {
    return self::$colors;
  }

  /**
   * @return array
   */
  public function toArray() {
    return self::$colors;
  }

  /**
   * @var array
   */
  public static $colors =
    [
      '#ffffff' =>
        [
          'name' => 'white',
        ],
      '#000000' =>
        [
          'name' => 'black',
        ],
      '#009f6b' =>
        [
          'name' => 'green',
        ],
      '#c40233' =>
        [
          'name' => 'red',
        ],
      '#ffd300' =>
        [
          'name' => 'yellow',
        ],
      '#0087bd' =>
        [
          'name' => 'blue',
        ],
    ];
}