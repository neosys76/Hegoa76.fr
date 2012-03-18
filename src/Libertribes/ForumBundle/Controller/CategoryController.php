<?php

namespace Libertribes\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Libertribes\ForumBundle\Entity\Category;
use Libertribes\ForumBundle\Form\CategoryType;

/**
 * Category controller.
 *
 */
class CategoryController extends Controller
{
    /**
     * Lists all Category entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $categories = $em->getRepository('LibertribesForumBundle:Category')->findAll();

        return $this->render('LibertribesForumBundle:Category:index.html.twig', array(
            'categories' => $categories
        ));
    }

}
