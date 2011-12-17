<?php

namespace Libertribes\Component\World;

use Symfony\Component\Yaml\Yaml;
use Libertribes\Component\Image\Image;

/**
 * @property-read int $width
 * @property-read int $height
 * @property-read string $name
 */
class TilePanel {

    /** @var array */
    private $mTiles = array();
    
    /** @var string */
    private $mName = null;
    
    /** @var int */
    private $mWidth = null;
    
    /** @var int */
    private $mHeight = null;
    
    /** @var string */
    private $mSettingsPath = null;
    
    /** @var int */
    private $mOverflowTop = 0;

    public function __get($name) {
        switch ($name) {
            case 'width': return $this->mWidth;
            case 'height': return $this->mHeight;
            case 'name': return $this->mName;
            case 'overflow_top': return $this->mOverflowTop;
        }
    }

    /**
     *
     * @param LandType $type
     * @return Image 
     */
    public
    function getTileImage(LandType $type) {
        if (!isset($this->mTiles[$type->id])) {
            $path = $this->mDirectory . '/'
                    . base_convert($type->id, 10, 36) . '.png';
            $this->mTiles[$type->id] = Image::createFromFile($path);
        }
        return $this->mTiles[$type->id];
    }

    /**
     *
     * @param array $panel
     * @return TilePanel 
     */
    public static
    function createFromArray($panel) {
        if (
                !isset($panel['name']) ||
                !isset($panel['directory']) ||
                !isset($panel['width']) ||
                !isset($panel['height'])) {
            throw new \InvalidArgumentException();
        }
        $self = new TilePanel();

        $self->mSettingsPath = isset($panel['settings']) ? $panel['settings'] : null;
        $self->mDirectory = $panel['directory'];
        $self->mWidth = $panel['width'];
        $self->mHeight = $panel['height'];
        $self->mName = $panel['name'];
        
        if (isset($panel['overflow']) && isset($panel['overflow']['top'])) {
            $self->mOverflowTop = $panel['overflow']['top'];
        }
        return $self;
    }

    /**
     *
     * @param string $path
     * @return TilePanel 
     */
    public static
    function createFromYaml($path) {
        $path = realpath($path);
        if ($path === false) {
            throw new \InvalidArgumentException();
        }
        $panel = Yaml::parse($path);
        $panel['settings'] = $path;
        return self::createFromArray($panel);
    }

}
