<?php

namespace ShopBundle\Controller;

use ShopBundle\Entity\Commande;
use ShopBundle\Entity\Panier;
use ShopBundle\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


class PanierController extends Controller
{
    public function AddProductAction(Request $request) //bech nebdew b hedhi naamel copie wala mch lezem? nn, mnin t3aytelha fel html chkouni? hedhi hhh
    {//eheeeeeeeeeeeeeeeee

        $em = $this->getDoctrine()->getManager();
        $id=$request->get('id');
        $produits=new Produit();
        $produit = $em->getRepository(Produit::class)->find($id);
        $l=$em->getRepository(Panier::class)->findByIdProduit($produit->getIdProduit());
        if($l==null) {
            $prod = new Panier();
            $prod->setQuantite(1);
            $prod->setIdProduit($produit);
            $prod->setPrix($produit->getPrix());
            $prod->setIdUser($this->getUser()->getId());
            $em = $this->getDoctrine()->getManager();
            $em->persist($prod);

        }
        else
            foreach($l as $li)
            {
                $li->setQuantite($li->getQuantite()+1);

            }
        $em->flush();

            return $this->redirectToRoute('shop_store');

    }

    public function AddProductAjaxAction($id) //hhh t7essni m3ammer 3al java :p  hatena dhhakt int id
    {

        $em = $this->getDoctrine()->getManager();
        //$id=$request->get('id');
        $produits=new Produit();
        $produit = $em->getRepository(Produit::class)->find($id);
        $l=$em->getRepository(Panier::class)->findByIdProduit($id);
        if($l==null) { //lweh l msammi? maw sammi 7keyet wadh7a :p  hahahahah
            $prod = new Panier();
            $prod->setQuantite(1);
            $prod->setIdProduit($produit);
            $prod->setPrix($produit->getPrix());
            $prod->setIdUser($this->getUser()->getId());
            $em = $this->getDoctrine()->getManager();
            $em->persist($prod);
            $msg = 1;
        }
        else
            foreach($l as $li)
            {
                $li->setQuantite($li->getQuantite()+1);
                $msg = $li->getQuantite();

            }
        $em->flush();

        return new JsonResponse(['msg' => $msg]);

    }


    public function AfficherPanierAction()
    {

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

            return $this->render('ShopBundle::cart.html.twig', array('produits' => $produits,'paniers' => $paniers, 'prixTotal' => $prixTotal,'resultCount' => $resultCount));
//dho3t win json?
        }
        return $this->render('ShopBundle::Produits.html.twig');
    }

    public function UpdatePanierAction($id, Request $request, $body){
        $em = $this->getDoctrine()->getManager();
        $panier = $em->getRepository(Panier::class)->find($id);
        /*if($request->isMethod('POST')){

            $panier->setPrixTotal($panier->getPrixTotal()* $request->get('quantite'));
            if($request->get('quantite')<0){
                $em->remove($panier);
                $em->flush();
            }
            else{
                $em->persist($panier);
                $em->flush();
            }
        }*/
        $nouveauPrix = $panier->getPrix()* $body;
        $panier->setPrix($nouveauPrix+$panier->getPrix());
        if($body <0){
            $em->remove($panier);
            $em->flush();
        }
        else{
            $em->persist($panier);
            $em->flush();
        }

        //return $this->redirectToRoute('boutique_homepage');
        return new JsonResponse(array("nouveauPrix" => $nouveauPrix ));
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $modele = $em->getRepository(Panier::class)->find($id);
        $em->remove($modele);
        $em->flush();
        return $this->redirectToRoute('shop_cart_show');

    }

    public function AddOrderAction(Request $request)
    {
        $prixTotal=$request->get('prixTotal');
        $order=new Commande();
        $order->setPrice($prixTotal);
        $order->setIduser($this->getUser()->getId());
        $order->setDate(new \DateTime("now"));
        $em=$this->getDoctrine()->getManager();
        $em->persist($order);
        $em->flush();
        return $this->redirectToRoute('shop_cart_show');
    }





}
