<?php

namespace Libertribes\Component\World;

use Symfony\Component\Yaml\Yaml;

use Libertribes\Component\Image\Image;
use Libertribes\Component\Image\Color;


/**
 * @property-read int $width
 * @property-read int $height
 * @property-read string $maps
 * @property-read Image $lands
 */
class World {

    /**
     * @var int width
     */
    private $mWidth = null;

    /**
     * @var int height
     */
    private $mHeight = null;

    /**
     *
     * @var string directory
     */
    private $mImagePath = null;

    /**
     *
     * @var Image image
     */
    private $mImage = null;

    /**
     *
     * @var array directory
     */
    private $mLandTypes = array();

    /**
     * @param int $width
     * @param int $height 
     */
    public
    function __construct($width, $height) {
        $this->mWidth = $width;
        $this->mHeight = $height;
    }

    /**
     *
     * @return Image 
     */
    public
    function setImage($path) {
        $image = Image::createFromFile($path);
        if (!$image) {
            throw new \InvalidArgumentException();
        }
        if (($this->mWidth !== $image->width) || ($this->mHeight !== $image->height)) {
            throw new \InvalidArgumentException();
        }
        $this->mImagePath = $path;
        return $this->mImage = $image;
    }

    /**
     *
     * @param array $types 
     */
    public
    function setLandTypes($types) {
        if (!is_array($types)) {
            throw new \InvalidArgumentException();
        }
        foreach ($types as $type) {
            $landtype = new LandType($type['color'], $type['name']);
            $this->mLandTypes[$landtype->id] = $landtype;
        }
    }
    
    /**
     *
     * @param Box $box
     * @return array 
     */
    public
    function findAllTileContainedInBox(Box $box) {
        $lands = array();
        $image = $this->mImage;
        for ($y = $box->bottom, $h = $box->top; $y <= $h; $y++) {
            for ($x = $box->left, $w = $box->right; $x <= $w; $x++) {
                if (($color = $image->getColorAt($x, $image->height - $y)) !== null) {
                    $lands[] = (object) array(
                                'longitude' => $x,
                                'latitude' => $y,
                                'color' => $color
                    );
                }
            }
        }
        return $lands;
    }
    
    /**
     * @param Color $color
     * @return LandType 
     */
    public
    function getLandType(Color $color) {
        return $this->mLandTypes[$color->toRGBInteger()];
    }

    /**
     *
     * @param string $name
     * @return mixed 
     */
    public
    function __get($name) {
        switch ($name) {
            case 'width': return (int) $this->mWidth;
            case 'height': return (int) $this->mHeight;
            default:
                throw new \Exception();
        }
    }

}

