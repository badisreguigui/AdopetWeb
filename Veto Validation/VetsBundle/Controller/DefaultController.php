<?php

namespace VetsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('VetsBundle:Default:index.html.twig');
    }
    public function RedirectAction()
    {
        return $this->render('::base.html.twig');
    }
    public function indexAdminAction()
    {
        return $this->render(':Layout:layoutAdmin.html.twig');
    }
    public function indexFrontAction()
    {
        return $this->render(':Layout:Layout.html.twig');
    }
    public function VetsAction()
    {
        return $this->render('VetsBundle::newVeto.html.twig');
    }
}
