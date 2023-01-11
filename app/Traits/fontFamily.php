<?php

namespace App\Traits;

trait fontFamily {

    /**
     * Font Family
     * @return $this|false|string
     */
    // Function for Get Fonts
    public function getFonts()
    {
        $fonts = array(
            "Cedarville Cursive"      => "'Cedarville Cursive', cursive",
            "Roboto"      => "'Roboto', sans-serif",
            "League Gothic"      => "'League Gothic', sans-serif",
            "Open Sans"      => "'Open Sans', sans-serif",
            "Raleway"      => "'Raleway', sans-serif",
            "Joan"      => "'Joan', serif",
            "Ubuntu"      => "'Ubuntu', sans-serif",
            "Roboto Slab"      => "'Roboto Slab', serif",
            "Noto Sans"      => "'Noto Sans', sans-serif",
            "Kdam Thmor Pro"      => "'Kdam Thmor Pro', sans-serif",
            "Roboto Mono"      => "'Roboto Mono', monospace",
        );
        return $fonts;
    }

}
