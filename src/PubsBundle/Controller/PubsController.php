<?php

namespace PubsBundle\Controller;

use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use PubsBundle\Entity\insultes;
use PubsBundle\Entity\Publications;
use PubsBundle\Entity\requette;
use PubsBundle\Form\PublicationsType;
use PubsBundle\PubsBundle;
use PubsBundle\Repository\insultesRepository;
use ShopBundle\Entity\User;
use PubsBundle\Entity\commentaires;
use ShopBundle\ShopBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use UserBundle\UserBundle;


class PubsController extends Controller
{
    public function indexAction()
    {
        return $this->render('PubsBundle:Default:index.html.twig');
    }

    public function PubsAction()
    {
        $mapping = $this->getDoctrine()->getManager();
        $list=$mapping->getRepository(Publications::class)->getpub();

        $listeid=$mapping->getRepository(Publications::class)->getidd();
        $nbrMax= 0;
        $idbest = 0;
        foreach ($listeid as $a){
            $nbr=$mapping->getRepository(Publications::class)->getmaxpub($a['id']);
            if ($nbr>$nbrMax) {
                $idbest = $a['id'];
                $nbrMax=$nbr;
            }
        }
        $user=$mapping->getRepository(User::class)->find($idbest);

        return $this->render('PubsBundle:Pubs:pubs.html.twig',array('pub'=>$list,'user'=>$user));
    }
    public function AddAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('PubsBundle:Publications')->findAll();
        $p = new Publications();
        $msg = '';
        if ($request->isMethod('POST')) {
            $p->setDescription($request->get('desc'));
            $p->setType($request->get('type'));
            $p->setDate(date('d-M-y'));
            $p->setTime(sprintf("%s%s", sprintf("%s%s", date("H") - 1, ":"), date("i:s"))
            );
            $p->setIduser($this->getUser()->getId());

            $p->setImage($request->get('image'));
            $p->setSignall(',');
            $p->setPhotoName('aa');

            $pieces = explode(" ", $p->getDescription()); //donc lenna 9assamna el descrition en mots mfarr9in bel les espaces
            $em = $this->getDoctrine()->getManager();
            foreach ($pieces as $piece) {
                $test = $em->getRepository(insultes::class)->findInsultes($piece); //lenna on va verifier ken kol mot mawjoud fel table insultes
                if ($test != null) {
                    $boolean = true;
                    break;
                }
                $boolean = false;
            }
            if (!$boolean) {
                $em->persist($p);
                $em->flush();
                return $this->redirectToRoute('pubs_');
                // win t7ebb temchi el page une ffois t'ajouti comment? lislt la meme page
            } else {
                return $this->redirectToRoute('pubs_'); //ahawka mayajoutich
                $msg="erreur d'ajout "; //la7dha bark
            } //ok normalement c bn njarrbou

        }
        return $this->render('PubsBundle:Pubs:pubs.html.twig', array('pub' => $list, 'msg' => $msg));
        return $this->redirectToRoute('pubs_'); //aahaya

    }


    public function onepubAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $id=$request->get('id');
        $Publications=$em->getRepository(Publications::class)->getonepub($id);
        $user=$this->getUser()->getId();
        $em->flush();
        return $this->render('PubsBundle:Pubs:onepub.html.twig',array('pubs'=>$Publications,'userr'=>$user));
    }
    public function modifpubAction(Request $request,$id)
    {
        $p = $this->getDoctrine()->getRepository(Publications::class)->find($id);
        if($request->isMethod('POST'))
        {
            $em = $this->getDoctrine()->getManager();

            $p->setDescription($request->get('desc'));
            $p->setType($request->get('type'));
            $p->setDate(date('d-M-y'));
            $p->setTime(sprintf("%s%s",sprintf("%s%s", date("H")-1, ":"),date("i:s"))
            );
            $p->setIduser($this->getUser()->getId());

            $p->setImage($request->get('image'));
            $p->setSignall('aaa');
            $p->setPhotoName('aa');
            $em->persist($p);
            $em->flush();
            return $this->redirectToRoute('pubs_');


        }
        return $this->render('PubsBundle:Pubs:modif.html.twig',array("pubs"=>$p));



    }
    public function suppAction($id)
    {
        $mapping = $this->getDoctrine()->getManager();
        $p =  $mapping->getRepository(Publications::class)->find($id);
        $mapping->remove($p);
        $mapping->flush();
        return $this->redirectToRoute('pubs_');
    }
    public function signalAction(Request $request)
    {
        $publication=$this->getDoctrine()->getRepository(publications::class)->find($request->get('idpub'));
//echo $request->get('idpub');
//echo ','.$this->getUser()->getId().',';
        if(strpos($publication->getSignall() , ','.$this->getUser()->getId().',')!=0 )
        {
            echo "vous avez déja signalé";
        }
        else
        {
            echo "vous venez de signaler";

            $publication=$this->getDoctrine()->getRepository(requette::class)->findUpdateSignall($request->get('idpub'),$this->getUser()->getId());
            $nbr=$this->getDoctrine()->getRepository(requette::class)->findNbr($request->get('idpub'));
            $publicationn=$this->getDoctrine()->getRepository(publications::class)->find($request->get('idpub'));

            var_dump($nbr);
            var_dump($publicationn);
            if($nbr==4)
             {
                 $mapping = $this->getDoctrine()->getManager();
                 $mapping->remove($publicationn);
                 $mapping->flush();

             }

        }
      return  $this->redirectToRoute('pubs_');

    }

    public function indexxAction()
    {
        $nourriture=$this->getDoctrine()->getRepository(requette::class)->countpub("Nourriture");
        $dressage=$this->getDoctrine()->getRepository(requette::class)->countpub("Dressage");
        $soins=$this->getDoctrine()->getRepository(requette::class)->countpub("Soins");
        $autres=$this->getDoctrine()->getRepository(requette::class)->countpub("Autres");

        $pieChart = new PieChart();
        $pieChart->getData()->setArrayToDataTable(
            [['Task', 'Hours per Day'],
                ['Nourriture',     count($nourriture)],
                ['Dressage',      count($dressage)],
                ['Soins',  count($soins)],
                ['Autres', count($autres)]
            ]
        );
        $pieChart->getOptions()->setTitle('Les types des publications');
        $pieChart->getOptions()->setHeight(500);
        $pieChart->getOptions()->setWidth(900);
        $pieChart->getOptions()->getTitleTextStyle()->setBold(true);
        $pieChart->getOptions()->getTitleTextStyle()->setColor('#009900');
        $pieChart->getOptions()->getTitleTextStyle()->setItalic(true);
        $pieChart->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $pieChart->getOptions()->getTitleTextStyle()->setFontSize(20);

        return $this->render('PubsBundle:Pubs:stat.html.twig', array('piechart' => $pieChart));
    }



}
