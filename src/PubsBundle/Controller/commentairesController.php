<?php

namespace PubsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class commentairesController extends Controller
{
    public function CommAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $idpub=$request->get('idpub');
        var_dump($idpub);
        $commentaires=$em->getRepository(Commentaires::class)->findByIdpub($idpub);
        $em->flush();
        return $this->render('PubsBundle:Pubs:onepub.html.twig',array('coms'=>$commentaires));
    }
}
