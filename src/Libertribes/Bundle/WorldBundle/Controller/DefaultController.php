<?php

namespace Libertribes\Bundle\WorldBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Libertribes\Component\World\Cartographer;
use Libertribes\Component\World\Box;

class DefaultController extends Controller {

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

        $controls[] = array(
            'label' => 'north',
            'link' => $r->generate('LibertribesWorldBundle_homepage', array('panel_name' => $panel_name, 'box' => $box->translate(0, $move)->toQueryString()))
        );
        $controls[] = array(
            'label' => 'south',
            'link' => $r->generate('LibertribesWorldBundle_homepage', array('panel_name' => $panel_name, 'box' => $box->translate(0, -$move)->toQueryString()))
        );
        $controls[] = array(
            'label' => 'west',
            'link' => $r->generate('LibertribesWorldBundle_homepage', array('panel_name' => $panel_name, 'box' => $box->translate($move, 0)->toQueryString()))
        );
        $controls[] = array(
            'label' => 'east',
            'link' => $r->generate('LibertribesWorldBundle_homepage', array('panel_name' => $panel_name, 'box' => $box->translate(-$move, 0)->toQueryString()))
        );
        
        $map = $cartographer->createView($box);
        return $this->render('LibertribesWorldBundle:Default:index.html.twig', array(
                    'box' => $box,
                    'name' => $panel_name,
                    'sections_directory' => $cartographer->getSectionsExternalDirectory(),
                    'map' => $map,
                    'controls' => $controls
                ));
    }

}
