<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AdminBundle\Entity\PrivacyPolicy;
use AdminBundle\Form\PrivacyPolicyType;

/**
 * PrivacyPolicy controller.
 *
 */
class PrivacyPolicyController extends Controller
{
    /**
     * Lists all PrivacyPolicy entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $privacyPolicies = $em->getRepository('AdminBundle:PrivacyPolicy')->findAll();

        return $this->render('privacypolicy/index.html.twig', array(
            'privacyPolicies' => $privacyPolicies,
        ));
    }

    /**
     * Creates a new PrivacyPolicy entity.
     *
     */
    public function newAction(Request $request)
    {
        $privacyPolicy = new PrivacyPolicy();
        $form = $this->createForm('AdminBundle\Form\PrivacyPolicyType', $privacyPolicy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($privacyPolicy);
            $em->flush();

            return $this->redirectToRoute('privacypolicy_show', array('id' => $privacyPolicy->getId()));
        }

        return $this->render('privacypolicy/new.html.twig', array(
            'privacyPolicy' => $privacyPolicy,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a PrivacyPolicy entity.
     *
     */
    public function showAction(PrivacyPolicy $privacyPolicy)
    {
        $deleteForm = $this->createDeleteForm($privacyPolicy);

        return $this->render('privacypolicy/show.html.twig', array(
            'privacyPolicy' => $privacyPolicy,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing PrivacyPolicy entity.
     *
     */
    public function editAction(Request $request, PrivacyPolicy $privacyPolicy)
    {
        $deleteForm = $this->createDeleteForm($privacyPolicy);
        $editForm = $this->createForm('AdminBundle\Form\PrivacyPolicyType', $privacyPolicy);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($privacyPolicy);
            $em->flush();

            return $this->redirectToRoute('privacypolicy_edit', array('id' => $privacyPolicy->getId()));
        }

        return $this->render('privacypolicy/edit.html.twig', array(
            'privacyPolicy' => $privacyPolicy,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a PrivacyPolicy entity.
     *
     */
    public function deleteAction(Request $request, PrivacyPolicy $privacyPolicy)
    {
        $form = $this->createDeleteForm($privacyPolicy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($privacyPolicy);
            $em->flush();
        }

        return $this->redirectToRoute('privacypolicy_index');
    }

    /**
     * Creates a form to delete a PrivacyPolicy entity.
     *
     * @param PrivacyPolicy $privacyPolicy The PrivacyPolicy entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PrivacyPolicy $privacyPolicy)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('privacypolicy_delete', array('id' => $privacyPolicy->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
