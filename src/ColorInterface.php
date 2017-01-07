<?php

namespace ericpugh\DubColor;

interface ColorInterface {

  /**
   * Get the closest matching color from the given array of colors.
   *
   * @param array $colors array of integers or Color objects
   * @return mixed the array key of the matched color
   */
  public function getClosestMatch(array $colors);

}








