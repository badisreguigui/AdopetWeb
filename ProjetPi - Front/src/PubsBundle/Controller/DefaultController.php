<?php

namespace PubsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PubsBundle:Default:index.html.twig');
    }

    public function PubsAction()
    {
        return $this->render('PubsBundle::pubs.html.twig');
    }
}
