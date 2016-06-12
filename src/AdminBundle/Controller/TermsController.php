<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AdminBundle\Entity\Terms;
use AdminBundle\Form\TermsType;

/**
 * Terms controller.
 *
 */
class TermsController extends Controller
{
    /**
     * Lists all Terms entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $terms = $em->getRepository('AdminBundle:Terms')->findAll();

        return $this->render('terms/index.html.twig', array(
            'terms' => $terms,
        ));
    }

    /**
     * Creates a new Terms entity.
     *
     */
    public function newAction(Request $request)
    {
        $term = new Terms();
        $form = $this->createForm('AdminBundle\Form\TermsType', $term);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($term);
            $em->flush();

            return $this->redirectToRoute('terms_show', array('id' => $term->getId()));
        }

        return $this->render('terms/new.html.twig', array(
            'term' => $term,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Terms entity.
     *
     */
    public function showAction(Terms $term)
    {
        $deleteForm = $this->createDeleteForm($term);

        return $this->render('terms/show.html.twig', array(
            'term' => $term,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Terms entity.
     *
     */
    public function editAction(Request $request, Terms $term)
    {
        $deleteForm = $this->createDeleteForm($term);
        $editForm = $this->createForm('AdminBundle\Form\TermsType', $term);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($term);
            $em->flush();

            return $this->redirectToRoute('terms_edit', array('id' => $term->getId()));
        }

        return $this->render('terms/edit.html.twig', array(
            'term' => $term,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Terms entity.
     *
     */
    public function deleteAction(Request $request, Terms $term)
    {
        $form = $this->createDeleteForm($term);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($term);
            $em->flush();
        }

        return $this->redirectToRoute('terms_index');
    }

    /**
     * Creates a form to delete a Terms entity.
     *
     * @param Terms $term The Terms entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Terms $term)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('terms_delete', array('id' => $term->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
