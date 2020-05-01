<?php

namespace Statamic\Addons\Hex2rgb;

use Statamic\Extend\Modifier;

class Hex2rgbModifier extends Modifier
{
    public function index($color, $params, $context)
    {
        $default = '0, 0, 0';
 
        if (empty($color)) {
            return $default;
        }

        if ($color[0] == '#') {
            $color = substr($color, 1);
        }

        if (strlen($color) == 6) {
            $hex = [$color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]];
        } elseif (strlen($color) == 3) {
            $hex = [$color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]];
        } else {
            return $default;
        }


        $rgb =  array_map('hexdec', $hex);

        return join(',', $rgb);
    }
}
