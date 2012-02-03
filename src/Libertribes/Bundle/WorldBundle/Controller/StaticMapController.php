<?php

namespace Libertribes\Bundle\WorldBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Libertribes\Component\World\View;
use Libertribes\Component\World\Box;

class StaticMapController extends Controller {

    public function indexAction($panel_name, $box) {
        $box = Box::createFromQueryString($box);
        if (is_null($box)) {
            throw new \InvalidArgumentException();
        }
        $panel = $this->get('libertribes_world.panels')->findOneByName($panel_name);
        if (is_null($panel)) {
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
        return $this->render('LibertribesWorldBundle:StaticMap:index.html.twig', array(
                    'box' => $box,
                    'name' => $panel_name,
                    'sections_directory' => $panel->getSectionDirectory(),
                    'map' => new View($panel, $box),
                    'controls' => $controls
                ));
    }

}
