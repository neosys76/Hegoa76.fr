<?php

namespace Libertribes\Component\World;

use Libertribes\Component\World\World;
use Libertribes\Component\World\TilePanel;
use Libertribes\Component\World\Box;
use Libertribes\Component\World\BoxSize;
use Libertribes\Component\Image\Image;
use Libertribes\Component\Image\Color;

class Cartographer {

    /** @var World */
    private $mWorld = null;

    /** @var TilePanel */
    private $mPanel = null;

    /** @var string */
    private $mDirectory = null;
    
    /**
     *
     * @param string $directory
     * @param World $world
     * @param TilePanel $panel
     */
    public
    function __construct($directory, World $world, TilePanel $panel) {
        $this->mWorld = $world;
        $this->mPanel = $panel;
        $this->mDirectory = $directory;
    }

    
    public
    function getPanel() {
        return $this->mPanel;
    }

    /**
     *
     * @param Box $box 
     */
    private
    function mapSection($x, $y) {
        $ss = $this->mPanel->getSectionSize();
        $ts = $this->mPanel->getTileSize();
        
        $sw = $ss->width / $ts->width;
        $sh = $ss->height / $ts->height;
        
        $box = new Box(
                        new Point((($x + 1) * $sw), (($y + 1) * $sh)),
                        new Point($x * $sw, $y * $sh)
        );
        
        $section = Image::create($ss->width, $ss->height);
        if ($section === false) {
            throw new \Exception();
        }
        $lands = $this->mWorld->findAllTileContainedInBox($box);
        krsort($lands);
        foreach ($lands as $land) {
            $left = ($land->longitude - $box->left) * $ts->width;
            $bottom = ($land->latitude - $box->bottom) * $ts->height;
            $t = $this->mWorld->getLandType($land->color);
            $image = $this->mPanel->getTileImage($t);
            $bottom += $image->height - $ts->height;
            $section->drawImage($left, $section->height - $bottom, $image);
        }
        $path = $this->mDirectory . '/' . $this->mPanel->getName() . '/' . base_convert($x, 10, 36).'_'.base_convert($y, 10, 36) . '.png';
        @mkdir(dirname($path), 0777, true);
        $section->save($path);
    }

    /**
     * 
     */
    public
    function map() {
        $ss = $this->mPanel->getSectionSize();
        $ts = $this->mPanel->getTileSize();
        
        $h = ceil(($this->mWorld->width * $ts->width) / $ss->width);
        $w = ceil(($this->mWorld->height * $ts->height) / $ss->height);

        for ($y = 0; $y < $h; $y++) {
            for ($x = 0; $x < $w; $x++) {
                $this->mapSection($x, $y);
            }
        }
    }
}

