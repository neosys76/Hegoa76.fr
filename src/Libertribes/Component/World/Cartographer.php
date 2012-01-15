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

    /**
     *
     * @var World 
     */
    private $mWorld = null;

    /**
     *
     * @var TilePanel 
     */
    private $mPanel = null;

    /**
     *
     * @var int 
     */
    private $mSectionInternalDirectory = null;

    /**
     *
     * @var int 
     */
    private $mSectionExternalDirectory = null;
    
    /**
     *
     * @var BoxSize 
     */
    private $mSectionSize = null;

    /**
     *
     * @param World $world
     * @param TilePanel $panel
     */
    public
    function __construct(World $world, TilePanel $panel, BoxSize $ss, $id, $ed = null) {
        $this->mWorld = $world;
        $this->mPanel = $panel;
        $this->mSectionSize = $ss;
        $this->mSectionInternalDirectory = $id;
        if (is_null($ed)) {
            $this->mSectionExternalDirectory = $id;
        } else {
            $this->mSectionExternalDirectory = $ed;
        }
    }

    private
    function createSectionInternalPath(Box $box) {
        $directory = $this->mSectionInternalDirectory . '/' . $this->mPanel->name;
        return $directory . '/' . $box->toQueryString() . '.png';
    }
    
    public
    function getSectionsExternalDirectory() {
        return $this->mSectionExternalDirectory. '/' . $this->mPanel->name;
    }
    
    public
    function createSectionExternalPath(Box $box) {
        $directory = $this->mSectionExternalDirectory . '/' . $this->mPanel->name;
        return $directory . '/' . $box->toQueryString() . '.png';
    }

    /**
     *
     * @param Box $box 
     */
    private
    function mapSection(Box $box) {
        $image = Image::create($this->mSectionSize->width, $this->mSectionSize->height);
        if ($image === false) {
            throw new \Exception();
        }
        $lands = $this->mWorld->findAllTileContainedInBox($box);
        krsort($lands);
        foreach ($lands as $land) {
            $x = ($land->longitude - $box->left) * $this->mPanel->width;
            $y = ($land->latitude - $box->bottom) * $this->mPanel->height;
            $t = $this->mWorld->getLandType($land->color);
            $i = $this->mPanel->getTileImage($t);
            $y += $i->height - $this->mPanel->height;
            $image->drawImage($x, $image->height - $y, $i);
        }
        $path = $this->createSectionInternalPath($box);
        @mkdir(dirname($path), 0777, true);
        $image->save($path);
    }

    /**
     * 
     */
    public
    function map() {
        $h = ceil(($this->mWorld->width * $this->mPanel->width) / $this->mSectionSize->width);
        $w = ceil(($this->mWorld->height * $this->mPanel->height) / $this->mSectionSize->height);

        $sw = $this->mSectionSize->width / $this->mPanel->width;
        $sh = $this->mSectionSize->height / $this->mPanel->height;

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

    public
    function createView(Box $view){
        $ts = new BoxSize($this->mPanel->width, $this->mPanel->height);
        $map = new View($view, $this->mSectionSize, $ts);
        return $map;
    }
    
    public
    function getSectionSize() {
        return $this->mSectionSize;
    }
}

