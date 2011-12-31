<?php

namespace Libertribes\Bundle\WorldBundle\Service;

use Libertribes\Component\World\TilePanel;


/**
 * Description of TilePanelManager
 *
 * @author JauneLaCouleur
 */
class TilePanelManager {
    
    private $mPanels = array();
    
    public
    function __construct($panels){
        foreach ($panels as $panel) {
            $this->mPanels[$panel['name']] = TilePanel::createFromArray(array(
                'name' => $panel['name'],
                'directory' => $panel['tiles']['directory'],
                'width' => $panel['tiles']['width'],
                'height' => $panel['tiles']['height'],
                'overflow' => $panel['tiles']['overflow'],
            ));
        }
    }
    
    /**
     *
     * @param string $name
     * @return TilePanel 
     */
    public
    function findOneByName($name){
        if (!isset($this->mPanels[$name])) {
            return null;
        }
        return $this->mPanels[$name];
    }
    
    /**
     *
     * @return array 
     */
    public
    function findAll() {
        return $this->mPanels;
    }
}


