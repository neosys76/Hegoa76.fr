<?php

namespace Libertribes\Component\World;

/**
 * @property-read double $bottom
 * @property-read double $top
 * @property-read double $left
 * @property-read double $right
 * 
 * @property-read double $width
 * @property-read double $height
 */
class Box {
    const QUERY_STRING_PATTERN = '/^[-]?[0-9a-z]+(.[0-9a-z]+)?,[-]?[0-9a-z]+(.[0-9a-z]+)?,[-]?[0-9a-z]+(.[0-9a-z]+)?,[-]?[0-9a-z]+(.[0-9a-z]+)?$/';

    /**
     *
     * @var Point 
     */
    private $mTopRight = null;

    /**
     *
     * @var Point 
     */
    private $mBottomLeft = null;

    public
    function __construct(Point $top_right = null, Point $bottom_left = null) {
        if ($top_right) {
            $this->mTopRight = $top_right;
        }
        if ($bottom_left) {
            $this->mBottomLeft = $bottom_left;
        }
    }

    public
    function __get($name) {
        switch ($name) {
            case 'width': return $this->mTopRight->x - $this->mBottomLeft->x;
            case 'height': return $this->mTopRight->y - $this->mBottomLeft->y;
            case 'top': return $this->mTopRight->y;
            case 'right': return $this->mTopRight->x;
            case 'bottom': return $this->mBottomLeft->y;
            case 'left': return $this->mBottomLeft->x;
            case 'top_right': return $this->mTopRight;
            case 'bottom_left': return $this->mBottomLeft;
        }
    }

    public
    function __set($name, $value) {
        switch ($name) {
            case 'top_right': return $this->mTopRight = $value;
            case 'bottom_left': return $this->mBottomLeft = $value;
        }
    }

    public
    function split($n) {
        $x = $this->mBottomLeft->x;
        $y = $this->mBottomLeft->y;
        $w = $this->width / $n;
        $h = $this->height / $n;
        $result = array();
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $result[] = new Box(
                                new Point($x + ($w * ($j + 1)), $y + ($h * ($i + 1))),
                                new Point($x + ($w * $j), $y + ($h * $i))
                );
            }
        }
        return $result;
    }
    
    /**
     *
     * @param int $x
     * @param int $y
     * @return Box 
     */
    public
    function translate($x, $y){
        return new Box(
                new Point($this->mTopRight->x + $x, $this->mTopRight->y + $y),
                new Point($this->mBottomLeft->x + $x, $this->mBottomLeft->y + $y)
                );
    }

    /**
     *
     * @param string $string
     * @return Box 
     */
    public static
    function createFromQueryString($string) {
        if (preg_match(self::QUERY_STRING_PATTERN, $string) !== 1) {
            return null;
        }
        $values = explode(',', $string);
        return new Box(
                        new Point(
                                base_convert($values[0], 36, 10),
                                base_convert($values[1], 36, 10)
                        ), new Point(
                                base_convert($values[2], 36, 10),
                                base_convert($values[3], 36, 10)
                ));
    }

    public
    function toQueryString() {
        return base_convert($this->mTopRight->x, 10, 36) . ',' .
                base_convert($this->mTopRight->y, 10, 36) . ',' .
                base_convert($this->mBottomLeft->x, 10, 36) . ',' .
                base_convert($this->mBottomLeft->y, 10, 36);
    }

    public
    function toPostgreSQL() {
        return '(' . $this->mTopRight->toPostgreSQL() . ', ' . $this->mBottomLeft->toPostgreSQL() . ')';
    }

    public
    function toString() {
        return $this->toPostgreSQL();
    }

    public
    function __toString() {
        return $this->toString();
    }

}

