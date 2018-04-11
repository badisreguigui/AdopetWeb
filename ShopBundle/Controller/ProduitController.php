<?php

namespace ShopBundle\Controller;

use ShopBundle\Entity\Produit;
use ShopBundle\Entity\Boutique;
use ShopBundle\Entity\Categorie;
use ShopBundle\Entity\Test;
use ShopBundle\Entity\Rate;
use ShopBundle\Form\GarderieType;
use ShopBundle\Entity\Panier;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ProduitController extends Controller
{
    public function ProduitsAction(Request $request)
    {
        $produitss = new Produit();
        $em = $this->getDoctrine()->getManager();
        $produitss = $em->getRepository(Produit::class)->findAll();
        $paniers = $em->getRepository(Test::class)->findProductParameterDQL($this->getUser()->getId());
        $produits = $this->getDoctrine()->getRepository(Produit::class)->findAll();
        $categories= $this->getDoctrine()->getRepository(Categorie::class)->findAll();
        $boutiques= $this->getDoctrine()->getRepository(Boutique::class)->findAll();
        $rate = $em->getRepository(Test::class)->affiche();
        if ($paniers != null) {

            $prixTotal = 0;
            foreach ($paniers as $panier) {
                $prixTotal += $panier->getPrix() * $panier->getQuantite();
            }
            $resultCount = count($paniers);

            return $this->render('ShopBundle::Produits.html.twig', array('produits' => $produits, 'paniers' => $paniers, 'prixTotal' => $prixTotal, 'resultCount' => $resultCount, 'produitss' => $produitss, 'rate' => $rate,'categories'=>$categories,'boutiques'=>$boutiques));
        }
        return $this->render('ShopBundle::Produits.html.twig', array('produitss' => $produitss, 'rate' => $rate,'categories'=>$categories,'boutiques'=>$boutiques));

    }
    public function ProduitDetailAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $id=$request->get('id');
        $produit=new Produit();
        $produit = $em->getRepository(Produit::class)->find($id);
        $form=$this->createForm(GarderieType::class,$produit);
        $rating = new Rate();
        if ($form->handleRequest($request)->isValid()){
            $y=$produit->getRating();
            $rating->setIdpr($id);
            $rating->setIduser($this->getUser()->getId());
            $rating->setRating($y);
            $em->persist($rating);
            $em->flush();
            return $this->redirectToRoute('shop_store');
        }
        return $this->render('ShopBundle::detailproduit.html.twig', array('produit' => $produit,'f'=>$form->createView()));
    }

    public function AfficherCartAction(){
        $em = $this->getDoctrine()->getManager();
        $paniers = $em->getRepository(Panier::class)->findByIduser($this->getUser()->getId());
        $produits = $this->getDoctrine()->getRepository(Produit::class)->findAll();
        if ($paniers != null)
        {
            $prixTotal = 0;
            foreach ($paniers as $panier) {
                $prixTotal += $panier->getPrix()*$panier->getQuantite();
            }
            $resultCount = count($paniers);
            //return $msg ="panier";
            return new JsonResponse( array('paniers' => $paniers, 'prixTotal' => $prixTotal,'resultCount' => $resultCount));
        }
        return new JsonResponse( array());
    }

    public function AddPromAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $boutiques= $this->getDoctrine()->getRepository(Boutique::class)->findAll();
        $produit = new Produit();
        if($request->isMethod('POST')&& $request->get('add')){
            $bout=$em->getRepository(Boutique::class)->find($request->get('boutique'));
            $prod=$em->getRepository(Produit::class)->findByIdboutiqueproduit($request->get('boutique'));
            foreach ($prod as $p) {
                $p->setPromotion(1);
                if($bout->getTotalachat()<100)
                {
                    $p->setTaux(50);
                }
                if($bout->getTotalachat()>100)
                {
                    $p->setTaux(30);
                }
                if($bout->getTotalachat()>200)
                {
                    $p->setTaux(20);
                }

            }
            $em->flush();
            return $this->redirectToRoute('shop_store');
        }
        if($request->isMethod('POST')&& $request->get('delete')){
            $bout=$em->getRepository(Boutique::class)->find($request->get('boutique'));
            $prod=$em->getRepository(Produit::class)->findByIdboutiqueproduit($request->get('boutique'));
            foreach ($prod as $p) {
                $p->setPromotion(0);
            }
            $em->flush();
            return $this->redirectToRoute('shop_store');
        }

        return $this->render('ShopBundle::addProm.html.twig',array('boutiques'=>$boutiques));
    }

    public function filterrAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $l=$em->getRepository(Test::class)->filter($request->get('categ'),$request->get('boutique'));
        var_dump($l);
    }


}
