<?php

namespace Libertribes\Bundle\WorldBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Libertribes\Component\World\Cartographer;
use Libertribes\Component\World\Box;

class StaticMapController extends Controller {

    public function indexAction($panel_name, $box) {
        $box = Box::createFromQueryString($box);
        if (is_null($box)) {
            throw new \InvalidArgumentException();
        }
        $cartographers = $this->get('libertribes_world.cartographers');
        $cartographer = $cartographers->findOneByTilePanelName($panel_name);
        if (is_null($cartographer)) {
            throw new \InvalidArgumentException();
        }
        $r = $this->get('router');

        $move = 12;
        
        $controls = array();

        $route = 'LibertribesWorldBundle_StaticMap_index';
        
        $controls[] = array(
            'label' => 'north',
            'link' => $r->generate($route, array('panel_name' => $panel_name, 'box' => $box->translate(0, $move)->toQueryString()))
        );
        $controls[] = array(
            'label' => 'south',
            'link' => $r->generate($route, array('panel_name' => $panel_name, 'box' => $box->translate(0, -$move)->toQueryString()))
        );
        $controls[] = array(
            'label' => 'west',
            'link' => $r->generate($route, array('panel_name' => $panel_name, 'box' => $box->translate($move, 0)->toQueryString()))
        );
        $controls[] = array(
            'label' => 'east',
            'link' => $r->generate($route, array('panel_name' => $panel_name, 'box' => $box->translate(-$move, 0)->toQueryString()))
        );
        
        $map = $cartographer->createView($box);
        return $this->render('LibertribesWorldBundle:StaticMap:index.html.twig', array(
                    'box' => $box,
                    'name' => $panel_name,
                    'sections_directory' => $cartographer->getSectionsExternalDirectory(),
                    'map' => $map,
                    'controls' => $controls
                ));
    }

}
