<?php

namespace Libertribes\Component\World;

use Libertribes\Component\World\Box;
use Libertribes\Component\World\BoxSize;

class Map {

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
    private $mSections = null;

    public
    function __construct(Box $view, BoxSize $section_size, BoxSize $tile_size) {
        $this->mViewBox = $view;
        $this->mSectionSize = $section_size;
        $this->mTileSize = $tile_size;
        
        $sw = $this->mSectionSize->width / $this->mTileSize->width;
        $sh = $this->mSectionSize->height / $this->mTileSize->height;

        $t = ceil($this->mViewBox->top / $sh) * $sh;
        $b = floor($this->mViewBox->bottom / $sh) * $sh;
        $l = floor($this->mViewBox->left / $sw) * $sw;
        $r = ceil($this->mViewBox->right / $sw) * $sw;

        $this->mLayerBox = new Box(new Point($r, $t), new Point($l, $b));
    }

    public
    function setSections($sections) {
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
        return $this->mViewBox->width * $this->mTileSize->width;
    }
    public
    function getViewHeight() {
        return $this->mViewBox->height * $this->mTileSize->height;
    }
    
    public
    function getOffsetBottom() {
        return ($this->mLayerBox->bottom - $this->mViewBox->bottom) * $this->mTileSize->height;
    }
    public
    function getOffsetLeft() {
        return ($this->mLayerBox->left - $this->mViewBox->left) * $this->mTileSize->width;
    }
    
    public
    function getLayerWidth() {
        return $this->mLayerBox->width * $this->mTileSize->width;
    }
    public
    function getLayerHeight() {
        return $this->mLayerBox->height * $this->mTileSize->height;
    }
    
    public
    function getViewLeft() {
        return $this->mViewBox->left * $this->mTileSize->width;
    }
    public
    function getViewBottom() {
        return $this->mViewBox->bottom * $this->mTileSize->height;
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

