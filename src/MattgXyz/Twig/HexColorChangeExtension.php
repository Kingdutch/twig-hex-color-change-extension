<?php

namespace MattgXyz\Twig;

use \Twig_Extension;
use \Twig_SimpleFilter;

/**
 * Class HexColorChangeExtension
 * @package MattgXyz\Twig
 */
class HexColorChangeExtension extends Twig_Extension
{
    /**
     * @param string $hexcode
     * @return string
     */
    public function darken($hexcode)
    {
        if (!preg_match('/^#?([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$/i', $hexcode, $parts)) {
            throw new Exception("Not a value color");
        }
        $out = ""; // Prepare to fill with the results
        for ($i = 1; $i <= 3; $i++) {
            $parts[$i] = hexdec($parts[$i]);
            $parts[$i] = round($parts[$i] * 80 / 100);
            $out .= str_pad(dechex($parts[$i]), 2, '0', STR_PAD_LEFT);
        }
        return "#{$out}";
    }

    /**
     * @param string $hexcode
     * @return string
     */
    public function lighten($hexcode)
    {
        if (!preg_match('/^#?([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$/i', $hexcode, $parts)) {
            throw new Exception("Not a value color");
        }
        $out = ""; // Prepare to fill with the results
        for ($i = 1; $i <= 3; $i++) {
            $parts[$i] = hexdec($parts[$i]);
            $parts[$i] = round($parts[$i] * 120 / 100);
            $out .= str_pad(dechex($parts[$i]), 2, '0', STR_PAD_LEFT);
        }
        return "#{$out}";
    }


    /**
     * @param string $hexcode
     * @return string
     */
    public function shade($hexcode, $percentage)
    {
        if (!preg_match('/^#?([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$/i', $hexcode, $parts)) {
            throw new Exception("Not a value color");
        }
        $out = ""; // Prepare to fill with the results
        for ($i = 1; $i <= 3; $i++) {
            $parts[$i] = hexdec($parts[$i]);
            $parts[$i] = round($parts[$i] * $percentage / 100);
            $out .= str_pad(dechex($parts[$i]), 2, '0', STR_PAD_LEFT);
        }
        return "#{$out}";
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return [
            new Twig_SimpleFilter('darken', [$this, 'darken']),
            new Twig_SimpleFilter('lighten', [$this, 'lighten']),
            new Twig_SimpleFilter('shade', [$this, 'shade']),
        ];
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'mattgxyz\hexcolorchange';
    }
}
