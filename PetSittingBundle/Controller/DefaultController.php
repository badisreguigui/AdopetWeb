<?php

namespace PetSittingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PetSittingBundle:Default:index.html.twig');
    }

    public function petsitAction()
    {
        return $this->render('PetSittingBundle::petsitting.html.twig');
    }

    public function LayoutAdminAction()
    {
        return $this->render(':layout:LayoutAdmin.html.twig');
    }

    public function LayoutAction()
    {
        return $this->render(':layout:Layout.html.twig');
    }
}
