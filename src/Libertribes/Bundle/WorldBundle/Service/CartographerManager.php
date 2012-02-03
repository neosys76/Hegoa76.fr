<?php

namespace Libertribes\Bundle\WorldBundle\Service;

use Libertribes\Component\World\TilePanel;
use Libertribes\Component\World\Cartographer;
use Libertribes\Component\World\World;

/**
 * Description of CartographerManager
 *
 * @author JauneLaCouleur
 */
class CartographerManager {

    private $mPanelManager = null;
    private $mWorld = null;
    private $mCartographers = array();
    private $mDirectory = null;

    public
    function __construct($directory, World $world, TilePanelManager $panels) {
        $this->mPanelManager = $panels;
        $this->mWorld = $world;
        $this->mDirectory = $directory;
    }

    public
    function getDirectory() {
        return $this->mDirectory;
    }

    /**
     *
     * @param string $name
     * @return Cartographer 
     */
    public
    function findOneByTilePanelName($name) {
        if (isset($this->mCartographers[$name])) {
            return $this->mCartographers[$name];
        }
        $panel = $this->mPanelManager->findOneByName($name);
        if (is_null($panel)) {
            return null;
        }
        $c = new Cartographer($this->mDirectory, $this->mWorld, $panel);
        return $this->mCartographers[$name] = $c;
    }

    /**
     *
     * @return array
     */
    public
    function findAll() {
        $result = array();
        $panels = $this->mPanelManager->findAll();
        foreach ($panels as $panel) {
            $c = $this->findOneByTilePanel($panel);
            if (!is_null($c)) {
                $result[] = $c;
            }
        }
        return $result;
    }

    /**
     *
     * @param TilePanel $panel
     * @return Cartographer 
     */
    public
    function findOneByTilePanel(TilePanel $panel) {
        return $this->findOneByTilePanelName($panel->getName());
    }

}

