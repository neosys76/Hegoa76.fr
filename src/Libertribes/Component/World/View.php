<?php

namespace Libertribes\Component\World;

use Libertribes\Component\World\Box;
use Libertribes\Component\World\BoxSize;
use Libertribes\Component\World\TilePanel;

class View {

    /**
     *
     * @var Box
     */
    private $mLayerBox = null;

    /**
     *
     * @var Box
     */
    private $mViewBox = null;

    /**
     *
     * @var Size 
     */
    private $mSectionSize = null;

    /**
     *
     * @var Size 
     */
    private $mTileSize = null;
    
    /**
     *
     * @var array 
     */
    private $mSections = null;

    /**
     *
     * @param Box $view in pixel
     * @param BoxSize $section_size in pixel
     * @param BoxSize $tile_size in pixel
     */
    public
    function __construct(TilePanel $panel, Box $view) {
        $this->mViewBox = $view;
        $this->mSectionSize = $panel->getSectionSize();
        $this->mTileSize = $panel->getTileSize();

        $this->buildSections();
    }

    private
    function buildSections() {
        $sw = $this->mSectionSize->width / $this->mTileSize->width;
        $sh = $this->mSectionSize->height / $this->mTileSize->height;
        
        $t = ceil(($this->mViewBox->top / $this->mTileSize->height) / $sh) * $sh;
        $b = floor(($this->mViewBox->bottom / $this->mTileSize->height) / $sh) * $sh;
        $l = floor(($this->mViewBox->left / $this->mTileSize->width) / $sw) * $sw;
        $r = ceil(($this->mViewBox->right / $this->mTileSize->width) / $sw) * $sw;
        
        $this->mLayerBox = new Box(
                new Point($r * $this->mTileSize->width, $t * $this->mTileSize->height),
                new Point($l * $this->mTileSize->width, $b * $this->mTileSize->height)
                        );
        $sections = array();
        $j = 0;
        for ($y = $b; $y < $t; $y += $sh) {
            $i = 0;
            for ($x = $l; $x < $r; $x += $sw) {
                $box = new Box(
                                new Point($x + $sw, $y + $sh),
                                new Point($x, $y)
                    );
                $sections[] = array(
                    'bottom' => $j* $this->mSectionSize->height,
                    'left' => $i * $this->mSectionSize->width,
                    'box' => $box
                );
                $i++;
            }
            $j++;
        }
        $this->mSections = $sections;
    }
    
    public
    function getSections() {
        return $this->mSections;
    }
    
    public
    function getSectionSize() {
        return $this->mSectionSize;
    }
    
    public
    function getSectionWidth() {
        return $this->mSectionSize->width;
    }
    
    public
    function getSectionHeight() {
        return $this->mSectionSize->height;
    }
    
    public
    function getTileSize() {
        return $this->mTileSize;
    }

    public
    function getViewWidth() {
        return $this->mViewBox->width;
    }
    public
    function getViewHeight() {
        return $this->mViewBox->height;
    }

    public
    function getViewLeft() {
        return $this->mViewBox->left;
    }
    public
    function getViewBottom() {
        return $this->mViewBox->bottom;
    }
    
    public
    function getOffsetBottom() {
        return $this->mLayerBox->bottom - $this->mViewBox->bottom;
    }
    public
    function getOffsetLeft() {
        return $this->mLayerBox->left - $this->mViewBox->left;
    }
    
    public
    function getLayerWidth() {
        return $this->mLayerBox->width;
    }
    public
    function getLayerHeight() {
        return $this->mLayerBox->height;
    }
    
    public
    function getLayerBox() {
        return $this->mLayerBox;
    }

    public
    function getViewBox() {
        return $this->mLayerBox;
    }

}

