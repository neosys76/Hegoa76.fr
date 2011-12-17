<?php

namespace Libertribes\WorldsCreationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class HomeController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('LibertribesWorldsCreationBundle:Home:index.html.twig', array('name' => $name));
    }
}
