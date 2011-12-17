<?php

namespace Libertribes\Component\World\World;

use Libertribes\CoreBundle\Entity\Land;
use Doctrine\ORM\EntityManager;
use Libertribes\Image;
use Libertribes\Color;
use Libertribes\World\World;

class Generator {

    private $em = null;
    private $world = null;

    /**
     *
     * @param EntityManager $em
     * @param World $world 
     */
    public
    function __construct(EntityManager $em, World $world) {
        $this->em = $em;
        $this->world = $world;
    }

    public
    function generate() {
        $em = $this->em;
        $em->getConnection()->beginTransaction();
        try {
            $this->generateLands();
            $em->getConnection()->commit();
        } catch (\Exception $e) {
            $em->getConnection()->rollback();
            $em->close();
            throw $e;
        }
    }

    private
    function generateLand($i, $j) {
        
        $w = $this->world;
        $em = $this->em;
        $image = $w->lands;
        
        $l = new Land();
        $l->setLongitude($i);
        $l->setLatitude($j);

        $t = $w->getLandType($image->getColorAt($i, $j));
        if (!$t) {
            throw new \Exception();
        }
        
        $l->setType($t->id);
        
        $em->persist($l);
        
    }
    
    private
    function generateLands() {
        $w = $this->world;
        $image = $w->lands;
        $em = $this->em;
        $c = 0;
        for ($i = 0; $i < $image->width; $i++) {
            for ($j = 0; $j < $image->height; $j++) {
                $this->generateLand($i, $j);
                if (($c % 1000) == 0) {
                    $em->flush();
                    $em->clear();
                    echo '.';
                }
                $c++;
            }
        }
    }

}