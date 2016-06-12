<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AdminBundle\Entity\Banner;
use AdminBundle\Form\BannerType;

/**
 * Banner controller.
 *
 */
class BannerController extends Controller
{
    /**
     * Lists all Banner entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $banners = $em->getRepository('AdminBundle:Banner')->findAll();

        return $this->render('banner/index.html.twig', array(
            'banners' => $banners,
        ));
    }

    /**
     * Creates a new Banner entity.
     *
     */
    public function newAction(Request $request)
    {
        $banner = new Banner();
        $form = $this->createForm('AdminBundle\Form\BannerType', $banner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($banner);
            $em->flush();

            return $this->redirectToRoute('banner_show', array('id' => $banner->getId()));
        }

        return $this->render('banner/new.html.twig', array(
            'banner' => $banner,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Banner entity.
     *
     */
    public function showAction(Banner $banner)
    {
        $deleteForm = $this->createDeleteForm($banner);

        return $this->render('banner/show.html.twig', array(
            'banner' => $banner,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Banner entity.
     *
     */
    public function editAction(Request $request, Banner $banner)
    {
        $deleteForm = $this->createDeleteForm($banner);
        $editForm = $this->createForm('AdminBundle\Form\BannerType', $banner);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($banner);
            $em->flush();

            return $this->redirectToRoute('banner_edit', array('id' => $banner->getId()));
        }

        return $this->render('banner/edit.html.twig', array(
            'banner' => $banner,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Banner entity.
     *
     */
    public function deleteAction(Request $request, Banner $banner)
    {
        $form = $this->createDeleteForm($banner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($banner);
            $em->flush();
        }

        return $this->redirectToRoute('banner_index');
    }

    /**
     * Creates a form to delete a Banner entity.
     *
     * @param Banner $banner The Banner entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Banner $banner)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('banner_delete', array('id' => $banner->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
