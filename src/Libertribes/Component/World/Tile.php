<?php

namespace Libertribes\Component\World;

class Tile {

    /**
     * @var string 
     */
    public $land = null;

    /**
     * @var string
     */
    public $north = null;

    /**
     * @var string
     */
    public $south = null;

    /**
     * @var string
     */
    public $east = null;

    /**
     * @var string
     */
    public $west = null;

    /**
     *
     * @param string $l.
     */
    public
    function __construct($l) {
        $this->land = $l;
    }

}
