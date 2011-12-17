<?php

namespace Libertribes\GameBundle\Entity;

/**
 * Libertribes\GameBundle\Entity\Commons
 */
class Commons
{

    private $GameNavigation = array(
	"Accueil"=>"{{ path('gameAccessGate') }}",
	"Villes"=>"{{ path('town') }}",
	"Avatars"=>"{{ path('avatar') }}",
	"Ma page"=>"{{ path('personalPage') }}",
	"Index du jeu"=>"{{ path('gameIndex') }}",
	"Histoire"=>"{{ path('History') }}",
	"Règles"=>"{{ path('Rules') }}"
	);


    public function getGameNavigation()
    {
        return $this->GameNavigation;
    }


}