<?php

namespace Libertribes\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Libertribes\GameBundle\Entity\Avatar;
use Libertribes\GameBundle\Form\AvatarType;

/**
 * Avatar controller.
 *
 */
class AvatarController extends Controller
{
    /**
     * Lists all Avatar entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('LibertribesGameBundle:Avatar')->findAll();

        return $this->render('LibertribesGameBundle:Avatar:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Avatar entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('LibertribesGameBundle:Avatar')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Avatar entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LibertribesGameBundle:Avatar:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to create a new Avatar entity.
     *
     */
    public function newAction()
    {
        $entity = new Avatar();
        $form   = $this->createForm(new AvatarType(), $entity);

        return $this->render('LibertribesGameBundle:Avatar:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Avatar entity.
     *
     */
    public function createAction()
    {
        $entity  = new Avatar();
        $request = $this->getRequest();
        $form    = $this->createForm(new AvatarType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('avatar_show', array('id' => $entity->getId())));
            
        }

        return $this->render('LibertribesGameBundle:Avatar:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Avatar entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('LibertribesGameBundle:Avatar')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Avatar entity.');
        }

        $editForm = $this->createForm(new AvatarType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LibertribesGameBundle:Avatar:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Avatar entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('LibertribesGameBundle:Avatar')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Avatar entity.');
        }

        $editForm   = $this->createForm(new AvatarType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('avatar_edit', array('id' => $id)));
        }

        return $this->render('LibertribesGameBundle:Avatar:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Avatar entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('LibertribesGameBundle:Avatar')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Avatar entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('avatar'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
