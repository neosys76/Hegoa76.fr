<?php

namespace Libertribes\Bundle\WorldBundle\Service;

use Libertribes\Component\World\TilePanel;
use Libertribes\Component\World\Cartographer;
use Libertribes\Component\World\World;
use Libertribes\Component\World\BoxSize;

/**
 * Description of CartographerManager
 *
 * @author JauneLaCouleur
 */
class CartographerManager {
    
    private $mPanelManager = null;
    private $mWorld = null;
    private $mCartographers = array();
    
    /**
     *
     * @var int 
     */
    private $mSectionsInternalDirectory = null;

    /**
     *
     * @var int 
     */
    private $mSectionsExternalDirectory = null;
    
    /**
     *
     * @var BoxSize 
     */
    private $mSectionSize = null;
    
    public
    function __construct(World $world, TilePanelManager $panels){
        $this->mPanelManager = $panels;
        $this->mWorld = $world;
    }

    /**
     *
     * @param int $w
     * @param int $h 
     */
    public
    function setSectionSize($w, $h) {
        $this->mSectionSize = new BoxSize($w, $h);
    }
    
    /**
     *
     * @param string $i
     * @param string $e 
     */
    public
    function setSectionDirectory($i, $e = null) {
        $this->mSectionsInternalDirectory = $i;
        if (is_null($e)) {
            $this->mSectionsExternalDirectory = $i;
        } else {
            $this->mSectionsExternalDirectory = $e;
        }
    }
    
    public
    function getSectionsInternalDirectory() {
        return $this->mSectionsInternalDirectory;
    }
    
    public
    function getSectionsExternalDirectory() {
        return $this->mSectionsExternalDirectory;
    }
    
    
    /**
     *
     * @param string $name
     * @return Cartographer 
     */
    public
    function findOneByTilePanelName($name){
        if (isset($this->mCartographers[$name])) {
            return $this->mCartographers[$name];
        }
        $panel = $this->mPanelManager->findOneByName($name);
        if (is_null($panel)) {
            return null;
        }
        $c = new Cartographer($this->mWorld, $panel, $this->mSectionSize, $this->mSectionsInternalDirectory, $this->mSectionsExternalDirectory);
        return $this->mCartographers[$name] = $c;
    }
    
    /**
     *
     * @param TilePanel $panel
     * @return Cartographer 
     */
    public
    function findOneByTilePanel(TilePanel $panel){
        return $this->findOneByTilePanelName($panel->name);
    }

}


