<?php

namespace Libertribes\Bundle\WorldBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Libertribes\Component\World\Cartographer;
use Libertribes\Component\World\Box;

class InteractiveMapController extends Controller {

    public function indexAction() {
        $manager = $this->get('libertribes_world.panels');
        $panels = $manager->findAll();
        return $this->render('LibertribesWorldBundle:InteractiveMap:index.html.twig', array(
                    'section_directory' => $manager->getSectionDirectory(),
                    'panels' => $panels
                ));
    }

}
