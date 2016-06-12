<?php

namespace WishlistBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WishlistBundle:Default:index.html.twig');
    }
}
