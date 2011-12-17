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
            ));
        }
    }
    
    /**
     *
     * @param string $name
     * @return TilePanel 
     */
    public
    function getPanel($name){
        if (!isset($this->mPanels[$name])) {
            return null;
        }
        return $this->mPanels[$name];
    }
    
    /**
     *
     * @param string $name
     * @return TilePanel 
     */
    public
    function getPanels() {
        return $this->mPanels;
    }
}


