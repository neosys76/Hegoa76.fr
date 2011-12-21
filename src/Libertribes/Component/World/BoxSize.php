<?php

namespace Libertribes\Component\World;

/**
 * @property int $width
 * @property int $height
 */
class BoxSize {
    const QUERY_STRING_PATTERN = '/^[-]?[0-9a-z]+(.[0-9a-z]+)?,[-]?[0-9a-z]+(.[0-9a-z]+)?$/';

    private $mWidth = 0;
    private $mHeight = 0;

    public
    function __construct($w = 0, $h = 0) {
        $this->mWidth = 0 + $w;
        $this->mHeight = 0 + $h;
    }
    
    public
    function getWidth() {
        return $this->mWidth;
    }

    public
    function getHeight() {
        return $this->mHeight;
    }

    
    public function __get($name) {
        switch ($name) {
            case 'width': return $this->mWidth;
            case 'height': return $this->mHeight;
        }
    }

    public function __set($name, $value) {
        switch ($name) {
            case 'width': return $this->mWidth = $value;
            case 'height': return $this->mHeight = $value;
        }
    }

    public static
    function createFromQueryString($string) {
        if (preg_match(self::QUERY_STRING_PATTERN, $string) !== 1) {
            return null;
        }
        $values = explode(',', $string);
        return new BoxSize(
                        base_convert($values[0], 36, 10),
                        base_convert($values[1], 36, 10)
        );
    }

    public
    function toQueryString() {
        return base_convert($this->mWidth, 10, 36) . ',' .
                base_convert($this->mHeight, 10, 36);
    }

}
