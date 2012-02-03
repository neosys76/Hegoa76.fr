<?php

namespace Libertribes\Component\World;

use Symfony\Component\Yaml\Yaml;
use Libertribes\Component\Image\Image;
use Libertribes\Component\World\BoxSize;

/**
 * @property-read int $width
 * @property-read int $height
 * @property-read string $name
 */
class TilePanel {

    /** @var string */
    private $mName;

    /** @var string */
    private $mSectionDirectory;
    
    /** @var BoxSize */
    private $mSectionSize;

    /** @var string */
    private $mTileDirectory;
    
    /** @var BoxSize */
    private $mTileSize;

    /** @var array */
    private $mTiles = array();
    
    /**
     *
     * @param string $name
     * @param string $sd
     * @param BoxSize $ss
     * @param string $td
     * @param BoxSize $ts 
     */
    public
    function __construct($name, $sd, BoxSize $ss, $td, BoxSize $ts) {
        $this->mName = $name;
        $this->mSectionDirectory = $sd;
        $this->mSectionSize = $ss;
        $this->mTileDirectory = $td;
        $this->mTileSize = $ts;
    }
    
    /**
     *
     * @param LandType $type
     * @return Image 
     */
    public
    function getTileImage(LandType $type) {
        if (!isset($this->mTiles[$type->id])) {
            $path = $this->mTileDirectory.'/'.$type->getImagePath();
            $image = Image::createFromFile($path);
            if ($image->height < $this->getTileHeight()) {
                throw new \Exception('Invalid tile image height. (' . $this->getTileHeight() . ')');
            }
            if ($image->width != $this->getTileWidth()) {
                throw new \Exception('Invalid tile image width. (' . $this->getTileWidth() . ')');
            }
            $this->mTiles[$type->id] = $image;
        }
        return $this->mTiles[$type->id];
    }

    /**
     *
     * @return string 
     */
    public
    function getName() {
        return $this->mName;
    }

    /**
     *
     * @return int 
     */
    public
    function getTileWidth() {
        return $this->mTileSize->width;
    }

    /**
     *
     * @return int 
     */
    public
    function getTileHeight() {
        return $this->mTileSize->height;
    }
    
    /**
     *
     * @return BoxSize 
     */
    public
    function getTileSize() {
        return $this->mTileSize;
    }
    
    /**
     *
     * @return BoxSize 
     */
    public
    function getSectionSize() {
        return $this->mSectionSize;
    }

    /**
     *
     * @return int 
     */
    public
    function getSectionWidth() {
        return $this->mSectionSize->width;
    }

    /**
     *
     * @return int 
     */
    public
    function getSectionHeight() {
        return $this->mSectionSize->height;
    }
    
    /**
     * 
     * @return string 
     */
    public
    function getSectionDirectory() {
        return $this->mSectionDirectory;
    }
}
