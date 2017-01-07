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
$example_hex = '#83F600';
$example_color = new Color($dubber::fromHexToInt($example_hex));
// Finds the closest HEX color in the current palette.
$closest = $dubber->closestColor($example_color);
// Finds the name "lawngreen".
$name = $dubber->getColorName($closest);

// Output results.
$label = sprintf('<span>Found 1 in %d colors</span>', $total_num_colors);
$color_span = sprintf('<span style="background-color:%s">Name: %s</span>', $closest, $name);
echo $label . $color_span;

?>
```