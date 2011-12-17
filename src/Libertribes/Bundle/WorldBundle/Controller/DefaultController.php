<?php

namespace Libertribes\Bundle\WorldBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('LibertribesWorldBundle:Default:index.html.twig', array('name' => $name));
    }
}
