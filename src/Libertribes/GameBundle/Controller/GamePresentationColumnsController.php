<?php

namespace Libertribes\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class GamePresentationColumnsController extends Controller
{
    
    public function indexAction()
    {

        return $this->render('LibertribesGameBundle:GamePresentationColumns:index.html.twig');
    }
	
    public function historyAction()
    {

		return $this->render('LibertribesGameBundle:GamePresentationColumns:history.html.twig');
			
    }

    public function rulesAction()
    {

		return $this->render('LibertribesGameBundle:GamePresentationColumns:rules.html.twig');
			
    }
	
}
