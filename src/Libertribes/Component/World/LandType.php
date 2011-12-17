<?php

namespace Libertribes\Component\World;

use Libertribes\Component\Image\Color;

/**
 * @property-read int id
 * @property-read int name
 * @property-read Color color
 */
class LandType {

    /**
     * @var Color 
     */
    private $mColor = null;

    /**
     * @var string
     */
    private $mName = null;

    /**
     *
     * @param type $type
     * @return LandType 
     */
    public static
    function createFromArray($type) {
        if (!isset($type['name']) || !isset($type['color'])) {
            throw new \InvalidArgumentException();
        }
        return new LandType($type['color'], $type['name']);
    }

    /**
     *
     * @param string $color
     * @param string $name 
     */
    public
    function __construct($color, $name) {
        $this->mColor = Color::createFromRGBHexa($color);
        $this->mName = $name;
    }
    
    public
    function __get($name) {
        switch ($name) {
            case 'color': return $this->mColor;
            case 'name': return $this->mName;
            case 'id': return $this->mColor->toRGBInteger();
        }
    }
}