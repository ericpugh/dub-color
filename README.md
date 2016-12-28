# DubColor
Find the english language name of a (HEX, RGB) color. Names provided by one of the following color palletes:
* [Crayola](https://www.wikiwand.com/en/List_of_Crayola_crayon_colors)
* [CSS3](https://drafts.csswg.org/css-color-3/)
* [CSS4](https://drafts.csswg.org/css-color/)
* [NCS](https://en.wikipedia.org/wiki/Natural_Color_System)

### Install
```
composer require muse3/dub-color
```

### Example Usage

```
<?php

// Create instance of DubColor and set color palette to use.
$dubber = new \Muse3\DubColor();
$dubber->setColorPalette('css4');
$palette_name = $dubber->paletteType;
$total_num_colors = $dubber->countPaletteColors();
// Find the name of the closest color to the given hex color.
$pink = '#e0de69';
$pinkish_color = new \Muse3\DubColor\Color($dubber::fromHexToInt($pink));
$closest = $dubber->closestColor($pinkish_color);
$name = $dubber->getColorName($closest);
// Output results.
$label = sprintf('<span>Found 1 in %d colors in %s </span>', $total_num_colors, $palette_name);
$shocking_pink_span = sprintf('<span style="background-color:%s">Name: %s</span>', $closest, $name);
echo $label . $shocking_pink_span;

?>
```