<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AdminBundle\Entity\Aboutus;
use AdminBundle\Form\AboutusType;

/**
 * Aboutus controller.
 *
 */
class AboutusController extends Controller
{
    /**
     * Lists all Aboutus entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $aboutuses = $em->getRepository('AdminBundle:Aboutus')->findAll();

        return $this->render('aboutus/index.html.twig', array(
            'aboutuses' => $aboutuses,
        ));
    }

    /**
     * Creates a new Aboutus entity.
     *
     */
    public function newAction(Request $request)
    {
        $aboutus = new Aboutus();
        $form = $this->createForm('AdminBundle\Form\AboutusType', $aboutus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($aboutus);
            $em->flush();

            return $this->redirectToRoute('aboutus_show', array('id' => $aboutus->getId()));
        }

        return $this->render('aboutus/new.html.twig', array(
            'aboutus' => $aboutus,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Aboutus entity.
     *
     */
    public function showAction(Aboutus $aboutus)
    {
        $deleteForm = $this->createDeleteForm($aboutus);

        return $this->render('aboutus/show.html.twig', array(
            'aboutus' => $aboutus,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Aboutus entity.
     *
     */
    public function editAction(Request $request, Aboutus $aboutus)
    {
        $deleteForm = $this->createDeleteForm($aboutus);
        $editForm = $this->createForm('AdminBundle\Form\AboutusType', $aboutus);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($aboutus);
            $em->flush();

            return $this->redirectToRoute('aboutus_edit', array('id' => $aboutus->getId()));
        }

        return $this->render('aboutus/edit.html.twig', array(
            'aboutus' => $aboutus,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Aboutus entity.
     *
     */
    public function deleteAction(Request $request, Aboutus $aboutus)
    {
        $form = $this->createDeleteForm($aboutus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($aboutus);
            $em->flush();
        }

        return $this->redirectToRoute('aboutus_index');
    }

    /**
     * Creates a form to delete a Aboutus entity.
     *
     * @param Aboutus $aboutus The Aboutus entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Aboutus $aboutus)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('aboutus_delete', array('id' => $aboutus->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
