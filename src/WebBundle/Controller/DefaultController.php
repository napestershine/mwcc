<?php

namespace WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * Home Page.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('WebBundle:Default:index.html.twig');
    }

    /**
     * About Us Page.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function aboutAction()
    {

        $em = $this->getDoctrine()->getManager();

        $about = $em->getRepository('AdminBundle:Aboutus')->findAll();

        return $this->render('WebBundle:Default:aboutus.html.twig', array('about'=>$about));
    }
}
