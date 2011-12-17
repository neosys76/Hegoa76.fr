<?php

namespace Libertribes\Component\Image;

class Color {

    public $mRed = 0;
    public $mGreen = 0;
    public $mBlue = 0;
    public $mAlpha = 0;

    /**
     *
     * @param string $rgb
     * @return Color 
     */
    public static
    function createFromRGBHexa($rgb) {
        $l = mb_strlen($rgb);
        if ($l == 6) {
            $r = base_convert(mb_substr($rgb, 0, 2), 16, 10);
            $g = base_convert(mb_substr($rgb, 2, 2), 16, 10);
            $b = base_convert(mb_substr($rgb, 4, 2), 16, 10);
            return new Color($r, $g, $b, 255);
        } else {
            throw new \InvalidArgumentException();
        }
    }

    /**
     *
     * @param int $r
     * @param int $g
     * @param int $b
     * @return Color 
     */
    public static
    function createFromRGB($r, $g, $b) {
        return new Color($r, $g, $b, 255);
    }
    
    /**
     *
     * @param integer $i
     * @return Color 
     */
    public static
    function createFromRGBInteger($i) {
        return self::createFromRGBHexa(sprintf('%06x', $i));
    }

    /**
     *
     * @param int $r
     * @param int $g
     * @param int $b
     * @param int $a
     * @return Color 
     */
    public static
    function createFromRGBA($r, $g, $b, $a) {
        return new Color($r, $g, $b, $a);
    }

    public
    function __get($name) {
        switch ($name) {
            case 'red': return $this->mRed;
            case 'green': return $this->mGreen;
            case 'blue': return $this->mBlue;
            case 'alpha': return $this->mAlpha;
        }
    }

    public
    function toRGBHexa() {
        return sprintf('%02x%02x%02x', $this->mRed, $this->mGreen, $this->mBlue);
    }

    public
    function toRGBAHexa() {
        return sprintf('%02x%02x%02x%02x', $this->mRed, $this->mGreen, $this->mBlue, $this->mAlpha);
    }

    /**
     *
     * @return int 
     */
    public
    function toRGBInteger() {
        return base_convert($this->toRGBHexa(), 16, 10);
    }

    private
    function __construct($r, $g, $b, $a) {
        $this->mRed = $r;
        $this->mGreen = $g;
        $this->mBlue = $b;
        $this->mAlpha = $a;
    }

}
