<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AdminBundle\Entity\DMCA;
use AdminBundle\Form\DMCAType;

/**
 * DMCA controller.
 *
 */
class DMCAController extends Controller
{
    /**
     * Lists all DMCA entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $dMCAs = $em->getRepository('AdminBundle:DMCA')->findAll();

        return $this->render('dmca/index.html.twig', array(
            'dMCAs' => $dMCAs,
        ));
    }

    /**
     * Creates a new DMCA entity.
     *
     */
    public function newAction(Request $request)
    {
        $dMCA = new DMCA();
        $form = $this->createForm('AdminBundle\Form\DMCAType', $dMCA);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($dMCA);
            $em->flush();

            return $this->redirectToRoute('dmca_show', array('id' => $dMCA->getId()));
        }

        return $this->render('dmca/new.html.twig', array(
            'dMCA' => $dMCA,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a DMCA entity.
     *
     */
    public function showAction(DMCA $dMCA)
    {
        $deleteForm = $this->createDeleteForm($dMCA);

        return $this->render('dmca/show.html.twig', array(
            'dMCA' => $dMCA,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing DMCA entity.
     *
     */
    public function editAction(Request $request, DMCA $dMCA)
    {
        $deleteForm = $this->createDeleteForm($dMCA);
        $editForm = $this->createForm('AdminBundle\Form\DMCAType', $dMCA);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($dMCA);
            $em->flush();

            return $this->redirectToRoute('dmca_edit', array('id' => $dMCA->getId()));
        }

        return $this->render('dmca/edit.html.twig', array(
            'dMCA' => $dMCA,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a DMCA entity.
     *
     */
    public function deleteAction(Request $request, DMCA $dMCA)
    {
        $form = $this->createDeleteForm($dMCA);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($dMCA);
            $em->flush();
        }

        return $this->redirectToRoute('dmca_index');
    }

    /**
     * Creates a form to delete a DMCA entity.
     *
     * @param DMCA $dMCA The DMCA entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DMCA $dMCA)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('dmca_delete', array('id' => $dMCA->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
