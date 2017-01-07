# DubColor

Find the english language name of a (HEX) color. Names provided by one of the following color palettes, or can be extended to use a custom palette:
* [Crayola](https://www.wikiwand.com/en/List_of_Crayola_crayon_colors)
* [CSS3](https://drafts.csswg.org/css-color-3/)
* [CSS4](https://drafts.csswg.org/css-color/)
* [NCS](https://en.wikipedia.org/wiki/Natural_Color_System)


### Example Usage

```php
<?php

use ericpugh\DubColor\Palette\Css4;
use ericpugh\DubColor\ColorDubber;
use ericpugh\DubColor\Color;

// Create instance of DubColor and set color palette to use.
$palette = Css4::getColors();
$dubber = new ColorDubber($palette);
$total_num_colors = $dubber->countColorPalette();

// An example hex color.
$pink = '#e0de69';
$pinkish_color = new Color($dubber::fromHexToInt($pink));
// Finds the closest HEX color in a given palette.
$closest = $dubber->closestColor($pinkish_color);
// Finds the name "Shocking Pink".
$name = $dubber->getColorName($closest);

// Output results.
$label = sprintf('<span>Found 1 in %d colors</span>', $total_num_colors);
$color_span = sprintf('<span style="background-color:%s">Name: %s</span>', $closest, $name);
echo $label . $color_span;

?>
```