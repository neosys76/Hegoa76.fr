<?php

namespace Libertribes\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class PersonalPageController extends Controller
{
    
    public function indexAction()
    {
		$session = $this->get('session');
		$username = $session->get('username');
		if(!$username){$username="";}
        return $this->render('LibertribesGameBundle:PersonalPage:index.html.twig', array('username' => $username));
    }
	
	
}
