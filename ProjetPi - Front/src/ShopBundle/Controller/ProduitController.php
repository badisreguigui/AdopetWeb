<?php

namespace ShopBundle\Controller;

use ShopBundle\Entity\Produit;
use ShopBundle\Entity\Panier;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ProduitController extends Controller
{
    public function ProduitsAction()
    {
        $produitss = new Produit();
        $em = $this->getDoctrine()->getManager();
        $produitss = $em->getRepository(Produit::class)->findAll();
        $paniers = $em->getRepository(Panier::class)->findByIduser($this->getUser()->getId());
        $produits = $this->getDoctrine()->getRepository(Produit::class)->findAll();
        if ($paniers != null)
        {

                        $prixTotal = 0;
            foreach ($paniers as $panier) {
                $prixTotal += $panier->getPrix()*$panier->getQuantite();
            }
            $resultCount = count($paniers);

            return $this->render('ShopBundle::Produits.html.twig', array('produits' => $produits,'paniers' => $paniers, 'prixTotal' => $prixTotal,'resultCount' => $resultCount,'produitss'=>$produitss));
            //return new JsonResponse( array('produits' => $produits,'paniers' => $paniers, 'prixTotal' => $prixTotal,'resultCount' => $resultCount,'produitss'=>$produitss)); //la7dha barka net2akked
        }
        return $this->render('ShopBundle::Produits.html.twig', ['produitss' => $produitss]);
    }
    public function ProduitDetailAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $id=$request->get('id');
        $produit=new Produit();
        $produit = $em->getRepository(Produit::class)->find($id);
        return $this->render('ShopBundle::detailproduit.html.twig', ['produit' => $produit]);
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
            return new JsonResponse( array('paniers' => $paniers, 'prixTotal' => $prixTotal,'resultCount' => $resultCount)); //la7dha barka net2akked //sayyeb
        }
        return new JsonResponse( array());
    }


}
