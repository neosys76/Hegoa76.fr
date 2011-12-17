<?php

namespace Libertribes\CommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('LibertribesCommerceBundle:Default:index.html.twig', array('name' => $name));
    }
}
