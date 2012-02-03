<?php

namespace Libertribes\Component\World;

use Libertribes\Component\World\World;
use Libertribes\Component\World\TilePanel;
use Libertribes\Component\World\Box;
use Libertribes\Component\World\BoxSize;
use Libertribes\Component\World\View;
use Libertribes\Component\World\Point;
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

    private
    function createSectionPath(Box $box) {
        return $this->mDirectory . '/' . $this->mPanel->getName() . '/' . $box->toQueryString() . '.png';
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
    function mapSection(Box $box) {
        $ss = $this->mPanel->getSectionSize();
        $ts = $this->mPanel->getTileSize();
        
        $section = Image::create($ss->width, $ss->height);
        if ($section === false) {
            throw new \Exception();
        }
        $lands = $this->mWorld->findAllTileContainedInBox($box);
        krsort($lands);
        foreach ($lands as $land) {
            $x = ($land->longitude - $box->left) * $ts->width;
            $y = ($land->latitude - $box->bottom) * $ts->height;
            $t = $this->mWorld->getLandType($land->color);
            $image = $this->mPanel->getTileImage($t);
            $y += $image->height - $ts->height;
            $section->drawImage($x, $section->height - $y, $image);
        }
        $path = $this->createSectionPath($box);
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

        $sw = $ss->width / $ts->width;
        $sh = $ss->height / $ts->height;

        for ($y = 0; $y < $h; $y++) {
            for ($x = 0; $x < $w; $x++) {
                $box = new Box(
                                new Point((($x + 1) * $sw), (($y + 1) * $sh)),
                                new Point($x * $sw, $y * $sh)
                );
                $this->mapSection($box);
            }
        }
    }
}

