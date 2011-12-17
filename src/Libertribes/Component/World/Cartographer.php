<?php

namespace Libertribes\Component\World;

use Libertribes\Component\World\World;
use Libertribes\Component\World\TilePanel;
use Libertribes\Component\World\Box;
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
    private $mSectionHeight = 512;

    /**
     *
     * @var int 
     */
    private $mSectionWidth = 512;

    /**
     *
     * @param int $w
     * @param int $h 
     */
    public
    function setSectionSize($w, $h) {
        $this->mSectionWidth = $w;
        $this->mSectionHeight = $h;
    }
    
    /**
     *
     * @param World $world
     * @param TilePanel $panel
     */
    public
    function __construct(World $world) {
        $this->mWorld = $world;
    }

    private
    function createSectionPath(Box $box) {
        $directory = $this->mWorld->directory . '/' . $this->mPanel->name;
        @mkdir($directory, 0777, true);
        return $directory . '/' . $box->toQueryString() . '.png';
    }

    /**
     *
     * @param Box $box 
     */
    private
    function createSection(Box $box) {
        $image = Image::create($this->mSectionWidth, $this->mSectionHeight);
        if ($image === false) {
            throw new \Exception();
        }
        $lands = $this->mWorld->findAllLandContainedInBox($box);
        foreach ($lands as $land) {
            $x = ($land->longitude - $box->left) * $this->mPanel->width;
            $y = ($land->latitude - $box->bottom) * $this->mPanel->height;
            $t = $this->mWorld->getLandType($land->color);
            $image->drawImage($x, $y, $this->mPanel->getTileImage($t));
        }
        $path = $this->createSectionPath($box);
        $image->save($path);
    }

    public
    function map(TilePanel $panel) {
        $this->mPanel = $panel;
        $h = ceil(($this->mWorld->width * $this->mPanel->width) / $this->mSectionWidth);
        $w = ceil(($this->mWorld->height * $this->mPanel->height) / $this->mSectionHeight);

        $sw = $this->mSectionWidth / $this->mPanel->width;
        $sh = $this->mSectionHeight / $this->mPanel->height;

        for ($y = 0; $y < $h; $y++) {
            for ($x = 0; $x < $w; $x++) {
                $box = new Box(
                                new Point((($x + 1) * $sw), (($y + 1) * $sh)),
                                new Point($x * $sw, $y * $sh)
                );
                $this->createSection($box);
            }
        }
        $this->mPanel = null;
    }

}

