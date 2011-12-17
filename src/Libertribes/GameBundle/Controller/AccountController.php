<?php

namespace Libertribes\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Libertribes\GameBundle\Entity\Account;
use Libertribes\GameBundle\Form\AccountType;

/**
 * Account controller.
 *
 */
class AccountController extends Controller
{
    /**
     * Lists all Account entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('LibertribesGameBundle:Account')->findAll();

        return $this->render('LibertribesGameBundle:Account:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Account entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('LibertribesGameBundle:Account')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Account entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LibertribesGameBundle:Account:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to create a new Account entity.
     *
     */
    public function newAction()
    {
        $entity = new Account();
        $form   = $this->createForm(new AccountType(), $entity);

        return $this->render('LibertribesGameBundle:Account:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Account entity.
     *
     */
    public function createAction()
    {
        $entity  = new Account();
        $request = $this->getRequest();
        $form    = $this->createForm(new AccountType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('account_show', array('id' => $entity->getId())));
            
        }

        return $this->render('LibertribesGameBundle:Account:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Account entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('LibertribesGameBundle:Account')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Account entity.');
        }

        $editForm = $this->createForm(new AccountType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LibertribesGameBundle:Account:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Account entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('LibertribesGameBundle:Account')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Account entity.');
        }

        $editForm   = $this->createForm(new AccountType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('account_edit', array('id' => $id)));
        }

        return $this->render('LibertribesGameBundle:Account:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Account entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('LibertribesGameBundle:Account')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Account entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('account'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
