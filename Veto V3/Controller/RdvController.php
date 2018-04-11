<?php

namespace VetsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use VetsBundle\Entity\Rdv;
use VetsBundle\Entity\TestVet;

class RdvController extends Controller
{
    public function listRdvAction()
    {
        $em = $this->getDoctrine()->getManager();
        $Rdv = $em->getRepository(Rdv::class)->findAll();


        return $this->render('VetsBundle:Rdv:list.html.twig', array(
            'rdvs' => $Rdv
        ));

    }

    public function ajouterRendezVousAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $heure=$request->request->get('heure');

        $daterdv=new \DateTime($request->get('date_rdv') );
        $rdvVeto=$em->getRepository(TestVet::class)->findRdv($request->get('id'));
        $now=new \DateTime('now');
        $Rdv = new Rdv();
        if ($request->isMethod('post')) {
            $Rdv->setIdVeto($request->get('id'));
            foreach($rdvVeto as $rdvet) {
                if ($daterdv == $rdvet['dateRdv'] && $heure == $rdvet['heure']) {

                    var_dump('erreur');
                    die;
                } else {

                    $Rdv->setHeure($heure);
                    $Rdv->setDateRdv(new \DateTime($request->request->get('date_rdv')));

                    /*$basic  = new \Nexmo\Client\Credentials\Basic('1f5e01ad', 'rbK50tYZKCkW5LXf');
                    $client = new \Nexmo\Client($basic);
                    $message = $client->message()->send([
                        'to' => '0021658928428',
                        'from' => 'AdoPet',
                        'text' => 'You have just booked an appoinment,Welcome'
                    ]);*/


                }

            }
            $em->persist($Rdv);
            $em->flush();
            return $this->redirectToRoute('rien');

        }
        return $this->render('VetsBundle:Rdv:ajouterRdv.html.twig', array('rdvVeto'=>$rdvVeto));
    }

    public function rienAction()
    {


        return $this->render('VetsBundle:Rdv:rien.html.twig', array());


    }
}