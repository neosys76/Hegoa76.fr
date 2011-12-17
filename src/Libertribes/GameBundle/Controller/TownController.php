<?php

namespace Libertribes\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Libertribes\GameBundle\Entity\Town;
use Libertribes\GameBundle\Form\TownType;

/**
 * Town controller.
 *
 */
class TownController extends Controller
{
    /**
     * Lists all Town entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('LibertribesGameBundle:Town')->findAll();

        return $this->render('LibertribesGameBundle:Town:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Town entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('LibertribesGameBundle:Town')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Town entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LibertribesGameBundle:Town:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to create a new Town entity.
     *
     */
    public function newAction()
    {
        $entity = new Town();
        $form   = $this->createForm(new TownType(), $entity);

        return $this->render('LibertribesGameBundle:Town:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Town entity.
     *
     */
    public function createAction()
    {
        $entity  = new Town();
        $request = $this->getRequest();
        $form    = $this->createForm(new TownType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('town_show', array('id' => $entity->getId())));
            
        }

        return $this->render('LibertribesGameBundle:Town:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Town entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('LibertribesGameBundle:Town')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Town entity.');
        }

        $editForm = $this->createForm(new TownType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LibertribesGameBundle:Town:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Town entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('LibertribesGameBundle:Town')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Town entity.');
        }

        $editForm   = $this->createForm(new TownType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('town_edit', array('id' => $id)));
        }

        return $this->render('LibertribesGameBundle:Town:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Town entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('LibertribesGameBundle:Town')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Town entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('town'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
