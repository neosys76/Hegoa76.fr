<?php

namespace Libertribes\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class GameAccessController extends Controller
{
    
    public function indexAction()
    {
		$session = $this->get('session');
		$username = $session->get('username');
		if(!$username){$username="";}
        return $this->render('LibertribesGameBundle:GameAccess:index.html.twig', array('username' => $username));
    }
	
    public function gateAction()
    {
		$session = $this->get('session');
		$username = $session->get('username');
		if($username){
			return $this->render('LibertribesGameBundle:GameAccess:access.html.twig', array('username' => $username));
		}
		else {
			return $this->render('LibertribesGameBundle:GameAccess:gate.html.twig');}
    }

	
}
