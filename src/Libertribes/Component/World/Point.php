<?php

namespace Libertribes\Component\World;

class Point {
    const POSTGRE_SQL_PATTERN = '/^\(([-.0-9]+),([-.0-9]+)\)$/i';

    private $mX = 0;
    private $mY = 0;

    public function __construct($x = 0, $y = 0) {
        $this->mX = 0 + $x;
        $this->mY = 0 + $y;
    }

    public function __get($name) {
        switch ($name) {
            case 'x': return $this->mX;
            case 'y': return $this->mY;
        }
    }

    public static
    function createFromPostgreSQL($value) {
        if (preg_match(self::POSTGRE_SQL_PATTERN, $value, $matches) != 1) {
            return null;
        }
        return new Point($matches[1], $matches[2]);
    }

    public
    function toQueryString() {
        return $this->mX . ',' . $this->mY;
    }

    public function toPostgreSQL() {
        return '(' . $this->mX . ', ' . $this->mY . ')';
    }

    public function toString() {
        return $this->toPostgreSQL();
    }

    public
    function __toString() {
        return $this->toString();
    }

}