<?php

namespace Libertribes\Bundle\WorldBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Libertribes\Component\World\Cartographer;
use Libertribes\Component\World\Box;

class InteractiveMapController extends Controller {

    public function indexAction() {
        $sections_directory = $this->get('libertribes_world.cartographers')->getSectionsExternalDirectory();
        $panels = $this->get('libertribes_world.panels')->findAll();
        
        
        return $this->render('LibertribesWorldBundle:InteractiveMap:index.html.twig', array(
                    'sections_directory' => $sections_directory,
                    'sections_width' => 512,
                    'sections_height' => 512,
                    'panels' => $panels
                ));
    }

}
