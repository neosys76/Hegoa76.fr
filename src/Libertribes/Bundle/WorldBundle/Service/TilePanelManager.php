<?php

namespace Libertribes\Bundle\WorldBundle\Service;

use Libertribes\Component\World\TilePanel;
use Libertribes\Component\World\BoxSize;

/**
 * Description of TilePanelManager
 *
 * @author JauneLaCouleur
 */
class TilePanelManager {

    /** @var array */
    private $mPanels = array();

    /** @var string */
    private $mSectionDirectory = '';

    /**
     *
     * @param string $sections_directory
     * @param int $sections_width
     * @param int $sections_height
     * @param array $panels 
     */
    public
    function __construct($sections_directory, $sections_width, $sections_height, $panels) {
        $this->mSectionDirectory = $sections_directory;
        foreach ($panels as $panel) {
            $tw = $panel['tiles']['width'];
            $th = $panel['tiles']['height'];
            $this->mPanels[$panel['name']] = new TilePanel(
                            $panel['name'],
                            $sections_directory . '/' . $panel['name'],
                            new BoxSize(
                                    floor($sections_width / $tw) * $tw,
                                    floor($sections_height / $th) * $th
                            ),
                            $panel['tiles']['directory'],
                            new BoxSize($tw, $th)
            );
        }
    }

    public
    function getSectionDirectory() {
        return $this->mSectionDirectory;
    }

    /**
     *
     * @param string $name
     * @return TilePanel 
     */
    public
    function findOneByName($name) {
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

